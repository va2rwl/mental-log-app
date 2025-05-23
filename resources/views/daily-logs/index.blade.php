@extends('layouts.app')
@section('title', '記録一覧')

@section('content')
    <h2 class="mb-6 text-2xl font-bold">記録一覧</h2>

    {{-- ダッシュボードへ戻る --}}
    <div class="mb-6">
        <a href="{{ route('dashboard') }}"
            class="inline-block rounded bg-gray-200 px-4 py-2 text-sm text-gray-800 hover:bg-gray-300">
            ← ダッシュボードへ戻る
        </a>
    </div>


    @if ($dailyLogs->isEmpty())
        <p class="text-gray-600">まだ記録がありません。</p>
    @else
        <div class="space-y-4">
            @foreach ($dailyLogs as $log)
                <div class="flex items-center justify-between rounded-lg bg-white p-4 shadow">
                    <div>
                        <p class="text-lg font-semibold">
                            {{ $log->log_date->format('Y年m月d日') }}
                        </p>
                        <p class="text-sm text-gray-600">気分スコア：{{ $log->mood }}</p>
                    </div>
                    <div class="flex gap-6">
                        <div>
                            <a href="{{ route('daily-logs.edit', $log) }}"
                                class="text-sm text-indigo-600 hover:underline">編集</a>
                        </div>
                        <form action="{{ route('daily-logs.destroy', $log) }}" method="POST"
                            onsubmit="return confirm('この記録を削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-500 hover:underline">削除</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ページネーション --}}
        <div class="mt-6">
            {{ $dailyLogs->links() }}
        </div>

        <a href="{{ route('daily-logs.export') }}"
            class="inline-block rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600">
            CSVでダウンロード
        </a>
    @endif
@endsection
