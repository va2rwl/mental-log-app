<?php
use App\Http\Controllers\DailyLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::resource('logs',DailyLogController::class);
});