<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- 헤더 영역 -->
    <header class="main-header">
        @yield('header')
    </header>

    <!-- 메인 콘텐츠 영역 -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
