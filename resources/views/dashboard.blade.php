@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('content')
    {{-- あいさつ --}}
    <h2 class="mb-6 text-2xl font-bold">こんにちは、{{ Auth::user()->name }}さん</h2>

    {{-- 今日の記録の有無 --}}
    @if ($todayLog)
        <div class="mb-6 rounded-xl bg-white p-6 shadow-md">
            <div>
                <h3 class="mb-2 text-lg font-semibold text-indigo-600">今日の記録</h3>
                <p class="text-sm text-gray-500">{{ $todayLog->log_date->format('Y年m月d日') }}</p>
                <p class="mb-1">気分スコア：<span class="font-bold">{{ $todayLog->mood }}</span> / 100</p>
            </div>
            <div class="mt-4 flex justify-end">
                <a href="{{ route('daily-logs.edit', $todayLog) }}"
                    class="mt-4 inline-block rounded bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-600">
                    編集する
                </a>
            </div>
        </div>
    @else
        <div class="mb-6 rounded-xl bg-white p-6 shadow-md">
            <p class="text-lg text-gray-700">今日はまだ記録がありません。</p>
            <a href="{{ route('daily-logs.create') }}"
                class="mt-4 inline-block rounded bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-600">
                今日の記録をつける
            </a>
        </div>
    @endif

    {{-- 最近の記録一覧 --}}
    @if ($recentLogs->isNotEmpty())
        <div class="mt-10">
            <h3 class="mb-4 text-xl font-semibold text-gray-700">最近の記録</h3>
            <ul class="space-y-3">
                @foreach ($recentLogs as $log)
                    <li class="flex items-center justify-between rounded-lg bg-white p-4 shadow">
                        <div>
                            <p class="text-gray-800">
                                {{ $log->log_date->format('Y年m月d日') }}：
                                気分 <span class="font-bold">{{ $log->mood }}</span>
                            </p>
                        </div>
                        <div class="btn flex gap-6">
                            <div>
                                <a href="{{ route('daily-logs.edit', $log) }}"
                                    class="text-sm text-indigo-600 hover:underline">編集</a>
                            </div>
                            {{-- 削除ボタン --}}
                            <form action="{{ route('daily-logs.destroy', $log) }}" method="POST"
                                onsubmit="return confirm('この記録を削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:underline">削除</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="mt-10">
            <h3 class="mb-4 text-xl font-semibold text-gray-700">最近の記録は0件です</h3>
        </div>
    @endif
@endsection
