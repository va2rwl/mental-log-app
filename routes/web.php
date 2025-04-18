<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DailyLogController;
use App\Http\Controllers\ReminderController;

// ログイン後のトップページ（ダッシュボード）
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ログインが必要なルート
Route::middleware(['auth'])->group(function () {

    // ユーザープロフィール（設定）
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 行動記録（CRUD）
    Route::resource('daily-logs', DailyLogController::class);

    // リマインダー設定（後で詳細実装）
    Route::get('/reminder', [ReminderController::class, 'edit'])->name('reminder.edit');
    Route::post('/reminder', [ReminderController::class, 'update'])->name('reminder.update');
});

// 認証関連ルート（BreezeやFortifyがここで読み込まれる）
require __DIR__.'/auth.php';
// 認証関連のルートは、Laravel BreezeやFortifyが提供するものを使用します。