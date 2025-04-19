<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DailyLogController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ダッシュボード
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ログイン後のみアクセス可能なルート
Route::middleware('auth')->group(function () {

    // プロフィール（設定）
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // 行動記録（CRUD）- resource を使って簡潔に
    Route::resource('daily-logs', DailyLogController::class);
});

// エクスポート用
Route::get('/daily-logs/export/csv', [DailyLogController::class, 'exportCsv'])
    ->name('daily-logs.export')
    ->middleware('auth');

require __DIR__ . '/auth.php';
