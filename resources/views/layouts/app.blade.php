<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplicación')</title>
    <!-- Enlace a la hoja de estilos principal -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Incluir la barra de navegación -->
    @include('partials.navbar')

    <!-- Contenedor principal para el contenido de cada página -->
    <div class="main-container">
        @yield('content')
    </div>
</body>
</html>