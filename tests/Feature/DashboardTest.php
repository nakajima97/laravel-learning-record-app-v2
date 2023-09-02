<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Record;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_非ログイン状態ではダッシュボードを開けない(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }

    public function test_ログイン状態ではダッシュボードを開くことができる(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_今日の学習記録一覧が表示されている(): void
    {
        $user = User::factory()->create();

        Category::factory()->count(3)->create();
        Record::factory()->count(5)->create();

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
    }
}
