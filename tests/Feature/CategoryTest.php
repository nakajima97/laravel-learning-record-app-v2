<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryOrder;

use function PHPUnit\Framework\assertEquals;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_ログインしていないときはカテゴリー一覧にアクセスできない(): void
    {
        $response = $this->get('/categories');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_カテゴリー一覧に自分が登録したカテゴリーだけが表示される(): void
    {
        $user = User::factory()->create();
        $other_user = User::factory()->create();

        $categories = Category::factory()->count(3)->create([
            'user_id' => $user->id
        ]);

        $other_users_category = Category::factory()->create([
            'user_id' => $other_user->id
        ]);

        $response = $this->actingAs($user)
            ->get('/categories');

        $response->assertStatus(200);

        foreach ($categories as $category) {
            $response->assertSeeText($category->name);
        }

        $response->assertDontSeeText($other_users_category->name);
    }

    public function test_カテゴリーの登録が可能(): void
    {
        $user = User::factory()->create();

        $input = [
            'name' => 'テストカテゴリー',
            'user_id' => $user->id
        ];

        $response = $this->actingAs($user)
            ->post('/categories', $input);

        $response->assertStatus(302);
        $this->assertDatabaseHas('categories', $input);
    }

    public function test_カテゴリーを追加した際に末尾に追加される(): void
    {
        $user = User::factory()->create();

        $input1 = [
            'name' => 'テストカテゴリー1',
            'user_id' => $user->id
        ];

        $response1 = $this->actingAs($user)
            ->post('/categories', $input1);

        $response1->assertStatus(302);

        $input2 = [
            'name' => 'テストカテゴリー2',
            'user_id' => $user->id
        ];

        $response2 = $this->actingAs($user)
            ->post('/categories', $input2);

        $response2->assertStatus(302);

        $test_category_1 = Category::where('name', 'テストカテゴリー1')->first();
        $test_category_2 = Category::where('name', 'テストカテゴリー2')->first();
        $category_order = CategoryOrder::where('user_id', $user->id)->first();

        assertEquals([$test_category_1->id, $test_category_2->id], $category_order->category_order);
    }

    public function test_カテゴリーのアーカイブが可能(): void
    {
        $user = User::factory()->create();

        // アーカイブするためのカテゴリーを作成
        $category = Category::factory()->create();
        // 追加したときはアーカイブされていないことを検証
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'is_archive' => false]);

        $response = $this->actingAs($user)
            ->post('/categories/archive/' . $category->id);

        $response->assertStatus(302);
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'is_archive' => true]);
    }

    public function test_カテゴリー名の変更が可能(): void
    {
        $user = User::factory()->create();

        $category = Category::factory()->create([
            'user_id' => $user->id
        ]);

        $input = [
            'name' => '変更後のカテゴリー名'
        ];

        $response = $this->actingAs($user)
            ->put('/categories/' . $category->id, $input);

        $response->assertStatus(302);
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => '変更後のカテゴリー名']);
    }
}
