@extends('app')
@section('title', '今日の記録')
@section('content')
    <h2 class="mb-6 text-2xl font-bold">今日の記録をつける</h2>

    <form action="{{ route('daily-logs.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- 日付 --}}
        <div>
            <label for="log_date" class="mb-1 block font-semibold">記録日</label>
            <input type="date" name="log_date" id="log_date" value="{{ old('log_date', now()->toDateString()) }}"
                class="w-full rounded border border-gray-300 p-2">
        </div>


        {{-- 気分 --}}
        <div>
            <label for="mood" class="mb-1 block font-semibold">今日の気分</label>
            <input type="range" name="mood" id="mood" min="0" max="100" value="{{ old('mood', 50) }}"
                class="w-full">
            <div class="text-right text-sm text-gray-600">現在: <span id="mood-value">50</span></div>
        </div>


        {{-- 睡眠 --}}
        <div class="flex gap-4">
            <div class="flex-1">
                <label for="sleep_start" class="mb-1 block font-semibold">入眠時間</label>
                <input type="time" name="sleep_start" id="sleep_start" class="w-full rounded border border-gray-300 p-2">
            </div>
            <div class="flex-1">
                <label for="sleep_end" class="mb-1 block font-semibold">起床時間</label>
                <input type="time" name="sleep_end" id="sleep_end" class="w-full rounded border border-gray-300 p-2">
            </div>
        </div>

        {{-- 食事 --}}
        {{-- label内にinputを書くことで可読性up,idとnameを別に書かなくて良い、wrapの幅が小さくなる --}}
        <div>
            <span class="mb-1 block font-semibold">食事</span>
            <div class="flex flex-wrap gap-4">
                @foreach (['morning' => '朝', 'lunch' => '昼', 'dinner' => '夜', 'snack' => '間食'] as $key => $label)
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="meal_{{ $key }}" value="1" class="accent-indigo-500">
                        {{ $label }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- 活動 --}}
        <div>
            <label for="activity" class="mb-1 block font-semibold">活動記録</label>
            <textarea name="activity" id="activity" rows="2" class="w-full rounded border border-gray-300 p-2">{{ old('activity') }}</textarea>
        </div>

        {{-- 服薬 --}}
        <div>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="medication" value="1" class="accent-indigo-500">
                服薬した
            </label>
        </div>

        {{-- ジャーナル --}}
        <div>
            <label for="journal" class="mb-1 block font-semibold">メモ（ジャーナル）</label>
            <textarea name="journal" id="journal" rows="4" class="w-full rounded border border-gray-300 p-2">{{ old('journal') }}</textarea>
        </div>

        {{-- 登録ボタン --}}
        <div>
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
