<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    // データベースをリフレッシュするトレイトを使用。マイグレーションを実行して、テスト用のデータベースを作成、本のデータは保護される
    use RefreshDatabase;

    public function test_authenticated_user_can_access_dashboard(): void
    {
        // ユーザーを作成
        $user = User::factory()->create();

        // ログインしてアクセスしてみる
        $response = $this->actingAs($user)->get('/dashboard');

        // ステータスコードが200（成功）か確認
        $response->assertStatus(200);

        // 表示内容に「こんにちは」が含まれているか確認
        $response->assertSee('こんにちは');
    }
}
