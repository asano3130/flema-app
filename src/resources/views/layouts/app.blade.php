<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COACHTECH</title>

    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <header class="header">

        <div class="header-inner">

            <div class="logo">
                COACHTECH
            </div>

            <!-- 検索 -->

            <form action="/" method="GET" class="search-form">

                <input
                    type="text"
                    name="keyword"
                    placeholder="なにをお探しですか？"
                    value="{{ request('keyword') }}"
                    class="search-input">

            </form>

            <!-- ナビ -->

            <nav class="nav">

                @auth

                <form action="/logout" method="POST">
                    @csrf
                    <button class="logout-btn">
                        ログアウト
                    </button>
                </form>

                <a href="/mypage" class="nav-link">
                    マイページ
                </a>

                @endauth

                <a href="/sell" class="sell-btn">
                    出品
                </a>

            </nav>

        </div>

    </header>

    <main class="main">

        @yield('content')

    </main>

</body>

</html>