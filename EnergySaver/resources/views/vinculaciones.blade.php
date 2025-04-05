@extends('layouts.plantilla2')

@section('titulo', 'Vinculaciones')

@section('css-estilos')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        /* Estilos generales para la sección de vinculaciones */
        .vinculaciones-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .vinculacion-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 550px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            margin: 10px;
        }

        .vinculacion-box:hover {
            transform: translateY(-5px);
        }

        .vinculacion-box img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .vinculacion-box h2 {
            font-size: 1.4em;
            color: #333;
            margin-bottom: 10px;
        }

        .vinculacion-box p {
            font-size: 1em;
            color: #666;
            margin-bottom: 15px;
        }

        .vinculacion-box button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .vinculacion-box button:hover {
            background-color: #45a049;
        }
    </style>
@endsection

@section('contenidoVinculacion')
    <div class="vinculaciones-container">
        <!-- Componente Ferman Energy -->
        <div class="vinculacion-box">
            <img src="{{ asset('img/F1.webp') }}" alt="Paneles Solares">
            <h2>Paneles Solares</h2>
            <p>Reducir significativamente tus facturas de electricidad. Contribuir a la protección del medio ambiente. Aumentar la eficiencia energética de tu hogar o negocio.</p>
            <button onclick="window.location.href='https://fermanenergy.com/'">Más Información En Ferman Energy</button>
        </div>

        <!-- Componente Producto Futuro -->
        <div class="vinculacion-box">
            <h2>Producto Futuro</h2>
            <p>Aqui va la descripcion de Productos o Empresas futuras.</p>
            <button onclick="window.location.href='URL_DEL_ENLACE_PRODUCTO_FUTURO'">Más Información</button>
        </div>
    </div>
@endsection
