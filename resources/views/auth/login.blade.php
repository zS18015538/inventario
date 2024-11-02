<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Estilos globales */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor del formulario */
        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        /* Título */
        .container h2 {
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
            font-size: 24px;
        }

        /* Mensajes de error */
        .error {
            background-color: #ffe6e6;
            border: 1px solid #ffcccc;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .error ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error li {
            color: #cc0000;
            font-size: 14px;
        }

        /* Estilos de los campos del formulario */
        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555555;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #66afe9;
            outline: none;
            box-shadow: 0 0 5px rgba(102, 175, 233, 0.5);
        }

        /* Botón de envío */
        button {
            width: 100%;
            padding: 10px 0;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Responsividad */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            .container h2 {
                font-size: 20px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div>
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" value="{{ old('correo') }}" required>
            </div>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div>
                <button type="submit">Ingresar</button>
            </div>
        </form>
    </div>
</body>
</html>