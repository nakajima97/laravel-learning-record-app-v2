<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RecordTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_ログインしていないときはレコード作成画面にアクセスできない(): void
    {
        $response = $this->get('/records/create');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_ログインしているときはレコード作成画面にログインできる(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/records/create');

        $response->assertStatus(200);
    }

    public function test_レコード作成が可能(): void
    {
        $user = User::factory()->create();

        $category = Category::factory()->create([
            'user_id' => $user->id
        ]);

        $input = [
            'category_id' => $category->id,
            'minute' => 30,
            'note' => 'test'
        ];

        $response = $this->actingAs($user)
            ->post('records', $input);

        $this->assertDatabaseHas('records', $input);
    }
}
