<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=PT+Serif:ital,wght@0,400;0,700;1,400&family=Sofadi+One&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body>
<header class="header">
    <div class="header__inner">
        <a href="/products" class="header__logo">mogitate</a>
    </div>
</header>
<main>
    @yield('content')
</main>
@livewireScripts
</body>
</html>