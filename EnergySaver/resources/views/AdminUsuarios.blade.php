@extends('layouts.plantillaAdmin')

@section('titulo', 'Visualizacion De Usuarios')
    @section('css-UsuariosAdmin')
        @section('contenidoUsuariosR')
        <div class="container mt-5 col-md-8">
            @foreach ($consultaUsuarios as $usu)
                <div class="card text-justify font-monospace mb-3">
                    <div class="card-header fs-5 text-primary">
                        {{ $usu->Nombre }} {{ $usu->Apellidos }}
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold">Correo: {{ $usu->Correo }}</h5>
                        <h5 class="fw-bold">Fecha de Nacimiento: {{ $usu->Fecha_nacimiento }}</h5>
                        <h5 class="fw-bold">Contraseña: {{ $usu->Contraseña }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        
    
@endsection