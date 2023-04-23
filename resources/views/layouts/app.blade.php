<!doctype html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="color-scheme" content="dark">

    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/utilities.js') }}"></script>
    @vite(['resources/js/app.js'])

    @yield('extra-fonts')
    @yield('extra-css')
    @yield('extra-js')
</head>
<body>

@yield('content')

</body>
</html>
