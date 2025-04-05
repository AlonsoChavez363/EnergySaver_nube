@extends('layouts.plantillaAdmin')

@section('titulo', 'Registro de Administrador')

@section('contenidoUsuariosAdminForm')
    @if (session('exito'))
        <script>
            Swal.fire({
                title: "Usuario Registrado Con Éxito!",
                text: '{{ session('exito') }}',
                icon: "success"
            });
        </script>
    @endif
    @section('css-AdminUsuariosForm')
    <link rel="stylesheet" href="{{ asset('css/AdminUsuariosForm.css') }}">
@endsection
    <div class="form-container bg-light p-4 rounded shadow">
        <h1 class="text-center text-dark mb-4">Registro de Administrador</h1>
        <form action="{{ route('EnviarRegistro') }}" method="POST">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            <small class="fst-italic text-danger">{{ $errors->first('nombre') }}</small>
        
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            <small class="fst-italic text-danger">{{ $errors->first('apellidos') }}</small>
        
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            <small class="fst-italic text-danger">{{ $errors->first('fecha_nacimiento') }}</small>
        
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="{{ old('correo') }}">
            <small class="fst-italic text-danger">{{ $errors->first('correo') }}</small>
        
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
            <small class="fst-italic text-danger">{{ $errors->first('password') }}</small>
        
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="password_confirmation">
            <small class="fst-italic text-danger">{{ $errors->first('confirm_password') }}</small>
        
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
        
            <!-- Campo oculto para establecer el tipo de usuario como "normal" -->
            <input type="hidden" name="tipo" value="admin">
        
            <button type="submit">Registrar Administrador</button>
        </form>
        
        <a href="{{ route('rutaAdmisVisualizacion') }}" class="btn btn-primary mt-3 w-100">Ver Administradores</a>
    </div>
@endsection
