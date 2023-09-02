<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Record;
use App\Models\User;
use Carbon\Carbon;
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

        [$categories, $records] = $this->createCategoryAndRecord($user->id);

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);

        foreach($records as $record) {
            $response->assertSeeText($record->category->name);
            $response->assertSeeText($record->minute);
            $response->assertSeeText($record->note);
        }
    }

    public function test_今日の総学習時間が表示されている(): void
    {
        $user = User::factory()->create();

        [$categories, $records] = $this->createCategoryAndRecord($user->id);
        $day = Carbon::now()->day() === 1 ? Carbon::tomorrow() : Carbon::yesterday();
        $yesterday_record = Record::factory()->create([
            'user_id' => $user->id,
            'created_at' => $day
        ]);

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);

        $total_minute = $records->sum('minute');

        $response->assertSeeText(floor($total_minute / 60) . "時間");
        $response->assertSeeText($total_minute % 60 . "分");
    }

    public function test_今月の総学習時間が表示されている(): void
    {
        $user = User::factory()->create();

        [$categories, $records] = $this->createCategoryAndRecord($user->id);
        $day = Carbon::now()->day() === 1 ? Carbon::tomorrow() : Carbon::yesterday();
        $yesterday_record = Record::factory()->create([
            'user_id' => $user->id,
            'created_at' => $day
        ]);

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);

        $total_minute = $records->sum('minute') + $yesterday_record->minute;

        $response->assertSeeText(floor($total_minute / 60) . "時間");
        $response->assertSeeText($total_minute % 60 . "分");
    }

    /**
     * categoriesとrecordsにデータを追加する
     * @param int|string|null $user_id
     */
    private function createCategoryAndRecord($user_id)
    {
        $categories = Category::factory()->count(3)->create();
        $records = Record::factory()->count(5)->create([
            'user_id' => $user_id
        ]);

        return [$categories, $records];
    }
}
