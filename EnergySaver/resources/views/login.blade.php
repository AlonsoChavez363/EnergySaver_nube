@extends('layouts.plantilla1')

@section('titulo', 'Inicio De Sesion')

@section('login')


<body style="margin: 0; font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; color: #fff;">

    <style>
        /* Fondo con imagen */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('{{ asset('img/FONDO4.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        /* Animación de entrada del formulario */
        .login-form {
            background-color: rgba(67, 158, 49, 0.9);
            padding: 25px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: scale(0.8);
            animation: slideUp 0.6s ease-out forwards, fadeIn 1s ease-out forwards;
        }

        /* Animación de desvanecimiento y subida */
        @keyframes slideUp {
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        h1 {
            color:rgb(0, 0, 0);
            text-align: center;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-out forwards;
        }

        label {
            font-size: 1em;
            margin-bottom: 5px;
            color:rgb(0, 0, 0);
            display: block;
            animation: fadeIn 1s ease-out forwards;
        }

        .input-container {
            position: relative;
            width: 100%;
            margin-bottom: 15px;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px 35px 10px 15px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1em;
            box-sizing: border-box;
            opacity: 0;
            animation: slideUp 0.5s ease-out 0.2s forwards;
        }

        .input-container i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color:rgb(0, 0, 0);
        }

        .remember-me {
            margin-bottom: 15px;
        }

        .remember-me input {
            margin-right: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #388e3c;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            opacity: 0;
            animation: slideUp 0.5s ease-out 0.4s forwards;
        }

        button:hover {
            background-color:rgb(0, 0, 0);
        }

        .login-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3); /* Fondo oscuro */
            top: 0;
            left: 0;
            z-index: -1;
        }

        small {
            font-size: 0.9em;
        }

        .fst-italic {
            font-style: italic;
        }

        .text-danger {
            color: red;
        }

        /* Responsividad */
        @media (max-width: 600px) {
            .login-form {
                padding: 15px;
                max-width: 100%;
            }

            h1 {
                font-size: 1.5em;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-form">
            <h1>Inicio de Sesión</h1>
            @session('exito')
            <script>
              Swal.fire({
                title: "Usuario Registrado Con Exito!",
                text: '{{ $value }}',
                icon: "success"
              });
            </script>
            @endsession
            <form action="/entrar" method="POST">
                @csrf
                <div class="input-container">
                    <label for="correo">Correo</label>
                    <i class="fa fa-envelope"></i> <!-- Icono para correo -->
                    <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
                </div>
                <small class="fst-italic text-danger">{{ $errors->first('correo') }}</small>

                <div class="input-container">
                    <label for="contraseña">Contraseña</label>
                    <i class="fa fa-lock"></i> <!-- Icono para contraseña -->
                    <input type="password" id="contraseña" name="contraseña" value="{{ old('contraseña') }}">
                </div>
                <small class="fst-italic text-danger">{{ $errors->first('contraseña') }}</small>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recuérdame</label>
                </div>

                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>

</body>
@endsection
