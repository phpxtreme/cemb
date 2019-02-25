<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Embarques</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/0.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    @yield('stylesheet')
</head>
<body>
    @yield('header')
    @yield('content')
    @yield('footer')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('javascript')
</body>
</html>