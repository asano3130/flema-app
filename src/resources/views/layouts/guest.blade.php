<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>

<body>

    <header class="header">
        <div class="header-inner">
            <h1 class="logo">COACHTECH</h1>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

</body>

</html>