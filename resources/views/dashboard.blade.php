@extends('layouts.app')
@section('title', 'ダッシュボード')

@section('content')
    <h2 class="mb-6 text-2xl font-bold">こんにちは、{{ Auth::user()->name }}さん</h2>

    {{-- 今日の記録があるか判定 --}}
    @if ($todayLog)
        <div class="rounded-xl bg-white p-6 shadow">
            <h3 class="text-log mb-2 font-semibold text-indigo-600">今日の記録</h3>
            <p>気分スコア：<span class="font-bold">{{ $todayLog->mood }}</span>/100</p>
            <p class="mt-1 text-sm text-gray-500">{{ $todayLog->log_date->format('Y年m月d日') }}</p>
            <a href="{{ route('daily-logs.edit', $todayLog) }}"
                class="mt-4 inline-block rounded bg-indigo-500 px-4 py-4 text-sm font-semibold text-white hover:bg-indigo-600">
                編集する
            </a>
        </div>
    @else
        <div class="rounded-xl bg-white p-6 shadow">
            <p class="text-lg text-gray-700">今日はまだ記録がありません</p>
            <a href="{{ route('daily_logs.create') }}"
                class="mt-4 inline-block rounded bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-600">
                今日の記録をつける
            </a>
        </div>
    @endif
@endsection
