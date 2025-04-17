<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title','こころログ')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="bg-white shadow p-4 flex flex-col sm:flex-row sm:justify-between items-center gap-2">
            <h1 class="text-xl font-bold">
                <a href="{{ route('dashboard') }}">こころログ</a>
            </h1>

            @auth
            <div class="flex gap-4">
                <a
                    href="{{ route('profile.edit') }}"
                    class="text-blue-600 hover:underline"
                    >設定</a
                >
                　
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">
                        ログアウト
                    </button>
                </form>
            </div>
            @endauth
        </header>

        <main class="p-8">@yield('content')</main>

        <footer
            class="bg-white text-center text-sm text-gray-500 py-4 border-t"
        >
            &copy; {{ date("Y") }} こころログ
        </footer>
    </body>
</html>
