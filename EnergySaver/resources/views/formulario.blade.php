@extends('layouts.plantilla1')

@section('titulo', 'Registro')

@section('formulario')
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

        /* Contenedor del formulario */
        .form-container {
            background-color: rgba(67, 158, 49, 0.9);  /* Fondo blanco con opacidad */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            box-sizing: border-box;
            overflow: hidden;
        }

        h1 {
            color:rgb(0, 0, 0);
            text-align: center;
            margin-bottom: 15px;
        }

        label {
            font-size: 1em;
            margin-bottom: 5px;
            color:rgb(0, 0, 0);
            display: block;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 15px;
        }

        .form-row .field {
            flex: 1;
            min-width: 45%;
        }

        input[type="text"], input[type="email"], input[type="date"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 0.9em;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #388e3c;
            color: #fff;
        }

        button[type="button"] {
            background-color: #f1f1f1;
            color: #388e3c;
        }

        .fst-italic {
            font-style: italic;
        }

        .text-danger {
            color: red;
        }

        p {
            margin-top: 10px;
            font-size: 0.9em;
            text-align: center;
        }

        p a {
            color:rgb(0, 0, 0);
            text-decoration: none;
        }

        small {
            font-size: 0.9em;
        }

        /* Responsividad */
        @media (max-width: 600px) {
            .form-container {
                padding: 10px;
                max-width: 100%;
            }

            .form-row {
                flex-direction: column;
            }

            .form-row .field {
                min-width: 100%;
            }
        }
    </style>

    <div class="form-container">
        <h1>Registro</h1>

        <form action="{{ route('EnviarRegistro') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="field">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    <small class="fst-italic text-danger">{{ $errors->first('nombre') }}</small>
                </div>
                <div class="field">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
                    <small class="fst-italic text-danger">{{ $errors->first('apellidos') }}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="field">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                    <small class="fst-italic text-danger">{{ $errors->first('fecha_nacimiento') }}</small>
                </div>
                <div class="field">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
                    <small class="fst-italic text-danger">{{ $errors->first('correo') }}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="field">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password">
                    <small class="fst-italic text-danger">{{ $errors->first('password') }}</small>
                </div>
                <div class="field">
                    <label for="password_confirmation">Confirmar Contraseña:</label>
                    <input type="password" id="confirm_password" name="password_confirmation">
                    <small class="fst-italic text-danger">{{ $errors->first('confirm_password') }}</small>
                </div>
            </div>

            <label for="genero">Género:</label>
            <select id="genero" name="genero">
                <option value="" disabled selected>Selecciona tu género</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ old('genero') == $genero->id ? 'selected' : '' }}>
                        {{ ucfirst($genero->nombre) }}
                    </option>
                @endforeach
            </select>
            <small class="fst-italic text-danger">{{ $errors->first('genero') }}</small>

            <input type="hidden" name="tipo" value="user">

            <button type="submit">Registrar</button>
            <button type="button" class="btn" onclick="window.location.href='{{ route('rutaInicio') }}'">Regresar a Inicio</button>
        </form>

        <p>¿Ya tienes una cuenta? <a href="{{ route('rutaLogin') }}">Inicia sesión aquí</a></p>
    </div>

</body>
@endsection
