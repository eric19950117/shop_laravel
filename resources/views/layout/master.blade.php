<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    {{-- TODO: 會變動的資料使用@yield()去取代，並指定要放入的資料變數名稱--}}
    <title>@yield('title') - Shop Laravel</title>
    <script src="/assets/js/jquery-2.2.4.min.js" defer></script>
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
</head>

<body>
    <header>
        <a href="#">註冊</a>
        <a href="#">登入</a>
    </header>

    <div class="contaniner">
        @yield('content')
    </div>

    <footer>
        <a href="#">聯絡我們</a>
    </footer>

</body>

</html>
