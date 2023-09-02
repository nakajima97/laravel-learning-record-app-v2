<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

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
}
