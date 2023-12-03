<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a la Biblioteca</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: Figtree, sans-serif;
            line-height: 1.5;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: rgba(100, 0, 0, 0); /* Fondo inicialmente transparente */
            color: #fff; /* Texto blanco en la barra de navegación */
            position: absolute;
            top: 0;
            left: 15rem;
            width: 100%;
            z-index: 2;
            transition: background-color 0.5s ease; /* Transición suave para el cambio de fondo */
        }

        .navbar-title {
            font-size: 2rem;
            font-weight: 600;
            margin-top: 0.5rem;
            margin-right: 1rem;
            color: #fff; /* Texto blanco en la barra de navegación */
        }

        .bg-img {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .container {
            text-align: left;
            position: relative;
            z-index: 1;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 0 1rem;
        }

        .title {
            font-size: 4rem;
            font-weight: 600;
            color: #fff; /* Texto blanco en el contenido principal */
            margin-bottom: 0.5rem;
        }

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40vh; /* Ajuste para ocupar toda la altura de la pantalla */
        }

        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            text-decoration: none;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
            background-color: rgba(100, 0, 0, 0.7); /* Color rojo tenue y oscuro para el fondo del botón */
            color: #fff; /* Texto blanco en el botón */
        }

        .btn-primary {
            color: #fff; /* Texto blanco en el botón primario */
        }

        .btn-secondary {
            color: #fff; /* Texto blanco en el botón secundario */
        }

        .btn:hover {
            background-color: rgba(120, 0, 0, 0.7); /* Color rojo tenue y oscuro cuando el botón está en hover */
        }

        .btn-top-right {
            position: absolute;
            top: 1rem;
            right: 25rem;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-title">BIBLIOTECA</div>
        <a href="{{ route('login') }}" class="btn btn-secondary btn-top-right">INICIAR SESIÓN</a>
    </div>
    <img src="{{ asset('img/fondo_2.jpg') }}" alt="Fondo" class="bg-img">
    <div class="container">
        <div class="title">Bienvenidos,</div>
        <div class="title">Biblioteca TECSUP</div>
    </div>
    <div class="buttons">
        <a href="{{ route('login') }}" class="btn btn-primary">INGRESAR</a>
    </div>

    <script>
        // Cambia la opacidad de la barra de navegación cuando se desplaza hacia abajo
        window.addEventListener("scroll", function() {
            var navbar = document.querySelector(".navbar");
            navbar.style.backgroundColor = window.scrollY > 50 ? "rgba(100, 0, 0, 0.8)" : "rgba(100, 0, 0, 0)";
        });
    </script>
</body>
</html>
