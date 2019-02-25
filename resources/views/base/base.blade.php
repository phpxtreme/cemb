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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('stylesheet')
</head>
<body class="container">
    <header>
        <nav class="navbar navbar-expand-sm bg-gradient-dark navbar-dark py-2">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
                <img class="logo" src="{{ asset('images/1.png') }}" alt="Inicio">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contratos</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Facturas</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        {{ Auth::user()->first_name.' '. Auth::user()->last_name }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item logout" href="{{ route('logout') }}">
                            <i class="fa fa-power-off"></i>
                            Salir
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <main class="container border-right border-left border-dark p-4">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @yield('content')
    </main>
    <footer class="py-2 bg-gradient-dark text-center">
        <a href="#" class="back-to-top text-white"></a>
    </footer>
    <script type="text/javascript" src="{{ asset('js/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('javascript')
</body>
</html>