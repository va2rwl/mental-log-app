        <header class="fixed right-0 top-0 w-full bg-white p-4 shadow">
            <div class="header-container mx-auto flex max-w-4xl items-center justify-between">
                <h1 class="text-xl font-bold text-indigo-600">
                    <a href="{{ route('dashboard') }}">こころログ</a>
                </h1>

                @auth
                    <nav class="flex gap-4 text-sm">
                        <a href="{{ route('daily-logs.index') }}" class="text-gray-700 hover:underline">記録一覧</a>
                        <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:underline">設定</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-500 hover:underline">ログアウト</button>
                        </form>
                    </nav>
                @endauth
            </div>
        </header>
