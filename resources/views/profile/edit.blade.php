@extends('layouts.app')

@section('title', 'プロフィール設定')

@section('content')
    <h2 class="mb-6 text-2xl font-bold">プロフィール設定</h2>

    @if (session('status') === 'profile-updated')
        <div class="mb-4 text-green-600">プロフィールを更新しました！</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('PATCH')

        {{-- 名前 --}}
        <div>
            <label for="name" class="mb-1 block font-semibold">名前</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full rounded border border-gray-300 p-2" required>
        </div>

        {{-- メールアドレス --}}
        <div>
            <label for="email" class="mb-1 block font-semibold">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full rounded border border-gray-300 p-2" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="rounded bg-indigo-500 px-6 py-2 text-white hover:bg-indigo-600">
                保存する
            </button>
        </div>
    </form>

    {{-- アカウント削除フォーム --}}
    <div class="pt-10">
        <h3 class="mb-4 text-lg font-semibold text-red-600">アカウント削除</h3>
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('本当に削除しますか？')">
            @csrf
            @method('DELETE')
            <div class="flex justify-between">
                <input type="password" name="password" placeholder="パスワード"
                    class="mb-2 block w-full max-w-sm rounded border p-2" required>

                <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">
                    アカウントを削除する
                </button>
            </div>
        </form>
    </div>
@endsection
