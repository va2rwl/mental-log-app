@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('content')
    {{-- あいさつ --}}
    <h2 class="mb-6 text-2xl font-bold">こんにちは、{{ Auth::user()->name }}さん</h2>

    {{-- 今日の記録の有無 --}}
    @if ($todayLog)
        <div class="bg-white shadow-md rounded-xl p-6 mb-6">
            <h3 class="text-lg font-semibold text-indigo-600 mb-2">今日の記録</h3>
            <p class="mb-1">気分スコア：<span class="font-bold">{{ $todayLog->mood }}</span> / 100</p>
            <p class="text-sm text-gray-500">{{ $todayLog->log_date->format('Y年m月d日') }}</p>

            <a href="{{ route('daily-logs.edit', $todayLog) }}"
               class="mt-4 inline-block bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-semibold px-4 py-2 rounded">
                編集する
            </a>
        </div>
    @else
        <div class="bg-white shadow-md rounded-xl p-6 mb-6">
            <p class="text-lg text-gray-700">今日はまだ記録がありません。</p>
            <a href="{{ route('daily-logs.create') }}"
               class="mt-4 inline-block bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-semibold px-4 py-2 rounded">
                今日の記録をつける
            </a>
        </div>
    @endif

    {{-- 最近の記録一覧 --}}
    @if ($recentLogs->isNotEmpty())
        <div class="mt-10">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">最近の記録</h3>
            <ul class="space-y-3">
                @foreach ($recentLogs as $log)
                    <li class="bg-white p-4 shadow rounded-lg flex justify-between items-center">
                        <div>
                            <p class="text-gray-800">
                                {{ $log->log_date->format('Y年m月d日') }}：
                                気分 <span class="font-bold">{{ $log->mood }}</span>
                            </p>
                        </div>
                        <a href="{{ route('daily-logs.edit', $log) }}"
                           class="text-sm text-indigo-500 hover:underline">編集</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
