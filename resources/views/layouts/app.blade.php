<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
    <style>
        #wrapper {
            display: flex;
        }

        #sidebar-wrapper {
            width: 250px;
            background: #9A616D;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.4s ease 0s;
        }

        #page-content-wrapper {
            flex: 1;
            padding-top: 50px;
            transition: all 0.4s ease 0s;
        }

        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            background-color: #9A616D;
            z-index: 1001;
        }

        .navbar-nav {
            text-align: center;
        }

        .navbar-nav > li {
            display: inline-block;
        }

        .navbar-brand {
            display: inline-block;
            padding-top: 0;
            padding-bottom: 0;
            line-height: 50px;
            color: #fff;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff;
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-red shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Loguearte') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarte') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-nav text-center">
                <div class="sidebar-brand">
                    <a href="#">
                        <!-- Puedes poner tu logotipo o algún otro contenido aquí -->
                    </a>
                </div>
                <ul class="navbar-nav">
                    <!-- Copia de las opciones del navbar principal al sidebar -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" style="color: #fff;">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fotos')}}" style="color: #fff;">Mis Libros</a>
                    </li>
                </ul>
                <div class="sidebar-button">
                    <button class="btn btn-outline-primary custom-btn" style="border: none; color: #fff; width: 100%; height: 60px;">Buscar Libro</button>
                </div>
                <div class="sidebar-button">
                    <button class="btn btn-outline-primary custom-btn" style="border: none; color: #fff; width: 100%; height: 60px;">Usuarios</button>
                </div>
            </div>
        </div>

        <!-- Contenido de la página -->
        <div id="page-content-wrapper">
            <!-- Aquí va el contenido principal de tu página -->
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
