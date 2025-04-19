@extends('layouts.app')

@section('title', 'こころログへようこそ')

@section('content')
    <div class="text-center mt-20">
        <h1 class="text-4xl font-bold text-indigo-600 mb-4">こころログ</h1>
        <p class="text-lg text-gray-700 mb-8">
            毎日の気分や生活習慣を記録して、こころの状態を見える化しよう。
        </p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}"
               class="bg-indigo-500 text-white px-6 py-2 rounded hover:bg-indigo-600">
                ログイン
            </a>
            <a href="{{ route('register') }}"
               class="bg-white border border-indigo-500 text-indigo-500 px-6 py-2 rounded hover:bg-indigo-100">
                新規登録
            </a>
        </div>
    </div>
@endsection
