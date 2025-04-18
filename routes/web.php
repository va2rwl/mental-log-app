<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DailyLogController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('plofile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('.destroy');
    });
    // 行動記録（CRUD）
    Route::resource('daily-logs', DailyLogController::class)->middleware('auth');
});



require __DIR__ . '/auth.php';
