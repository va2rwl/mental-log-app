<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DailyLogTest extends TestCase
{
    use RefreshDatabase;

    // public function test_user_can_store_daily-log(): void
    // {
    //     // ユーザー作成＆ログイン
    //     $user = User::factory()->create();

    //     // データをPOST
    //     $response = $this->actingAs($user)->post(route('daily-logs.store'), [
    //         'log_date' => now()->toDateString(),
    //         'mood' => 75,
    //         'sleep_start' => '23:00',
    //         'sleep_end' => '07:30',
    //         'meal_morning' => true,
    //         'meal_lunch' => false,
    //         'meal_dinner' => true,
    //         'meal_snack' => false,
    //         'activity' => 'カフェで作業',
    //         'medication' => true,
    //         'journal' => '集中できた',
    //     ]);

    //     // ダッシュボードにリダイレクトされるか
    //     $response->assertRedirect(route('dashboard'));

    //     // DBに記録があるか確認
    //     $this->assertDatabaseHas('daily-logs', [
    //         'user_id' => $user->id,
    //         'mood' => 75,
    //         'activity' => 'カフェで作業',
    //         'journal' => '集中できた',
    //     ]);
    // }

//     public function test_user_can_update_their_daily-log(): void
// {
//     $user = \App\Models\User::factory()->create();

//     // 最初にログを作成
//     $log = \App\Models\DailyLog::factory()->create([
//         'user_id' => $user->id,
//         'mood' => 50,
//         'activity' => '最初の記録',
//     ]);

//     // 新しい内容で更新リクエスト
//     $response = $this->actingAs($user)->put(route('daily-logs.update', $log), [
//         'log_date' => now()->toDateString(),
//         'mood' => 80,
//         'sleep_start' => '22:30',
//         'sleep_end' => '07:00',
//         'meal_morning' => true,
//         'meal_lunch' => true,
//         'meal_dinner' => false,
//         'meal_snack' => false,
//         'activity' => '編集後の記録',
//         'medication' => true,
//         'journal' => 'かなり調子がよかった',
//     ]);

//     // ダッシュボードへリダイレクトされることを確認
//     $response->assertRedirect(route('dashboard'));

//     // データベースに反映されているか確認
//     $this->assertDatabaseHas('daily-logs', [
//         'id' => $log->id,
//         'user_id' => $user->id,
//         'mood' => 80,
//         'activity' => '編集後の記録',
//         'journal' => 'かなり調子がよかった',
//     ]);
// }
public function test_user_can_delete_their_daily-log(): void
{
    $user = \App\Models\User::factory()->create();

    $log = \App\Models\DailyLog::factory()->create([
        'user_id' => $user->id,
        'mood' => 42,
        'activity' => '消すテスト',
    ]);

    $response = $this->actingAs($user)->delete(route('daily-logs.destroy', $log));

    $response->assertRedirect(route('daily-logs.index'));
    $this->assertDatabaseMissing('daily-logs', [
        'id' => $log->id,
    ]);
}
}
