<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Controlo Financeiro')</title>
</head>
<body>
    <main>
        @if (session('success'))
            <p><strong>{{ session('success') }}</strong></p>
        @endif

        @yield('content')
    </main>
</body>
</html>