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
            <a href="{{ route('daily-logs.create') }}"
                class="mt-4 inline-block rounded bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-600">
                今日の記録をつける
            </a>
        </div>
    @endif
@endsection
@if ($recentLogs->isNotEmpty())
    <div class="mt-10">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">最近の記録</h3>
        <ul class="space-y-3">
            @foreach ($recentLogs as $log)
                <li class="flex items-center justify-between rounded-lg bg-white p-4 shadow">
                    <div>
                        <p class="font-medium text-gray-800">
                            {{ $log->log_date->format('Y年m月d日') }}：気分スコア <span
                                class="font-bold">{{ $log->mood }}</span>
                        </p>
                    </div>
                    <a href="{{ route('daily-logs.edit', $log) }}" class="text-sm text-indigo-500 hover:underline">
                        編集
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
