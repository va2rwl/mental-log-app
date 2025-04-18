@extends('layouts.app')
@section('title', '記録を編集')
@section('content')
    <h2 class="mb-6 text-2xl font-bold">今日の記録を編集する</h2>

    <form action="{{ route('daily-logs.update',$dailyLog) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        @include('daily_logs.form', ['dailyLog' => $dailyLog])
        {{-- 登録ボタン --}}
        <div class="flex justify-end">
            <button type="submit"
                class="rounded bg-indigo-500 px-6 py-2 font-semibold text-white hover:bg-indigo-600">保存する</button>
        </div>
    </form>

    <script>
        // スライダーの値をリアルタイム表示する
        const mood = document.getElementById('mood');
        const moodValue = document.getElementById('mood-value');
        mood.addEventListener('input', function() {
            moodValue.textContent = this.value;
        });
    </script>
@endsection
