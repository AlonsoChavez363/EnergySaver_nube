@extends('layouts.plantillaAdmin')
@section('titulo', 'Administradores Activos')
    @section('contenidoAdmisActivos')
    @section('css-admin')
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
@endsection
    <div class="container mt-5 col-md-8">
        @foreach ($consultaAdmis as $admin)
            <div class="card text-justify font-monospace mb-3">
                <div class="card-header fs-5 text-primary">
                    {{ $admin->nombre }} {{ $admin->apellidos }}
                </div>
                <div class="card-body">
                    <h5 class="fw-bold">Correo: {{ $admin->correo }}</h5>
                    
                </div>
                
            </div>
        @endforeach
    </div>
    
    
@endsection