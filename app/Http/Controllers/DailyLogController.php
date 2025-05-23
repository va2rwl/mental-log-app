<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyLog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DailyLogController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailyLogs = DailyLog::where('user_id', Auth::id())
            ->orderBy('log_date', 'desc')
            ->paginate(10); // ページネーションあり

        return view('daily-logs.index', compact('dailyLogs'));
    }

    /**
     *
     */
    public function create()
    {
        return view('daily-logs.create');
    }

    /**
     * create.blade.php　今日の気分入力から送られてきたデータを受け取る
     */
    public function store(Request $request)
    {
        // バリデーション。create.blade.phpのinputのname属性と一致させる
        $data = $request->validate([
            'log_date' => 'required|date',
            'mood' => 'required|integer|min:0|max:100',
            'sleep_start' => 'nullable|date_format:H:i',
            'sleep_end' => 'nullable|date_format:H:i',
            'meal_morning' => 'nullable|boolean',
            'meal_lunch' => 'nullable|boolean',
            'meal_dinner' => 'nullable|boolean',
            'meal_snack' => 'nullable|boolean',
            'activity' => 'nullable|string',
            'medication' => 'nullable|boolean',
            'journal' => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id(); // ユーザーIDを追加


        // チェックが入ってないcheckboxはnullになるので false に補正
        foreach (['meal_morning', 'meal_lunch', 'meal_dinner', 'meal_snack', 'medication'] as $field) {
            $data[$field] = $request->has($field);
        }

        if ($request->filled('sleep_start')) {
            $data['sleep_start'] = $request->sleep_start . ':00';
        }
        if ($request->filled('sleep_end')) {
            $data['sleep_end'] = $request->sleep_end . ':00';
        }

        DailyLog::create($data);

        return redirect()->route('dashboard')->with('success', '記録を保存しました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyLog $dailyLog)
    {
        return view('daily-logs.edit', compact('dailyLog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyLog $dailyLog)
    {
        $this->authorize('update', $dailyLog); // ログインユーザーの権限を確認

        $data = $request->validate([
            'log_date' => 'required|date',
            'mood' => 'required|integer|min:0|max:100',
            'sleep_start' => 'nullable|date_format:H:i',
            'sleep_end' => 'nullable|date_format:H:i',
            'meal_morning' => 'nullable|boolean',
            'meal_lunch' => 'nullable|boolean',
            'meal_dinner' => 'nullable|boolean',
            'meal_snack' => 'nullable|boolean',
            'activity' => 'nullable|string',
            'medication' => 'nullable|boolean',
            'journal' => 'nullable|string',
        ]);

        foreach (['meal_morning', 'meal_lunch', 'meal_dinner', 'meal_snack', 'medication'] as $field) {
            $data[$field] = $request->has($field);
        }

        if ($request->filled('sleep_start')) {
            $data['sleep_start'] = $request->sleep_start . ':00';
        }
        if ($request->filled('sleep_end')) {
            $data['sleep_end'] = $request->sleep_end . ':00';
        }
        $dailyLog->update($data);

        return redirect()->route('dashboard')->with('success', '記録を更新しました！');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyLog $dailyLog)
    {
        $this->authorize('delete', $dailyLog);
        $dailyLog->delete();

        return redirect()->route('daily-logs.index')->with('success', '記録を削除しました！');
    }



    public function exportCsv(): StreamedResponse
    {
        $fileName = 'daily-logs_' . now()->format('Ymd_His') . '.csv';

        $logs = DailyLog::where('user_id', Auth::id())
            ->orderBy('log_date', 'desc')
            ->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $columns = [
            'log_date',
            'mood',
            'sleep_start',
            'sleep_end',
            'meal_morning',
            'meal_lunch',
            'meal_dinner',
            'meal_snack',
            'activity',
            'medication',
            'journal',
        ];

        return response()->stream(function () use ($logs, $columns) {
            $stream = fopen('php://output', 'w');

            // ヘッダー行
            fputcsv($stream, $columns);

            // 各ログ
            foreach ($logs as $log) {
                fputcsv($stream, $log->only($columns));
            }

            fclose($stream);
        }, 200, $headers);
    }
}
