<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\DailyLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $todayLog = DailyLog::where('user_id', Auth::id())
            ->whereDate('log_date', $today)
            ->first();

        $recentLog = DailyLog::where('user_id', Auth::id())
            ->orderBy('log_date', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact('todayLog'));
    }
}
