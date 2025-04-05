@extends('layouts.plantilla2')

@section('titulo', 'Home')

@section('css-estilos')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        body {
            background-color: rgb(171, 172, 171); /* Fondo suave verde claro */
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            color: #34495e; /* Color de texto suave y elegante */
            background-color: rgb(255, 255, 255); /* Fondo blanco para el contenido */
            padding: 40px 30px;
            border-radius: 15px;
            max-width: 600px;
            margin: 80px auto;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); /* Sombra suave */
            animation: fadeIn 1.5s ease-out;
        }

        h1 {
            font-size: 3.2em;
            color: #388e3c; /* Verde fresco para resaltar */
            margin-bottom: 25px;
            font-weight: bold;
            animation: fadeIn 1s ease-out;
        }

        p {
            font-size: 1.2em;
            margin-top: 20px;
            line-height: 1.5;
            color: #2c3e50;
            animation: slideUp 1s ease-out;
        }

        ul {
            list-style-type: none;
            padding: 0;
            animation: slideUp 1s ease-out;
        }

        li {
            font-size: 1.1em;
            margin-bottom: 15px;
            color: #2ecc71;
            animation: bounce 1.5s ease-in-out infinite;
            font-weight: 500;
        }

        li:nth-child(even) {
            color: #16a085;
        }

        li:nth-child(odd) {
            color: #1abc9c;
        }

        /* Iconos más pequeños y bonitos */
        .icon {
            font-size: 2em;
            color: #ff9f43;
            margin-right: 12px;
            animation: pulse 2s infinite alternate;
        }

        .button {
            display: inline-block;
            background-color: #388e3c;
            color: white;
            font-size: 1.2em;
            padding: 12px 28px;
            border-radius: 50px;
            text-decoration: none;
            margin-top: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #2e7d32;
            transform: scale(1.1);
        }

        .button:active {
            transform: scale(0.95);
        }

        /* Imagen dentro de la bienvenida */
        .image-container {
            margin-top: 30px;
            animation: fadeIn 1.5s ease-out;
        }

        .image-container img {
            max-width: 60%;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .image-container img:hover {
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-12px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.2);
            }
        }

        /* Estilo para los iconos de redes sociales */
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            font-size: 2em;
            color: #fff;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #388e3c;
        }
    </style>
@endsection

@section('contenidoHome')
    <div class="container">
        <h1>Bienvenido a Energy Saver</h1>

        <p>¡Nos alegra verte aquí! Juntos podemos reducir tu consumo eléctrico y mejorar la eficiencia energética de tu hogar.</p>

        <p>¿Qué puedes hacer en Energy Saver?</p>
        <ul>
            <li><i class="fas fa-bolt icon"></i> Descubre consejos prácticos para ahorrar energía.</li>
            <li><i class="fas fa-phone-alt icon"></i> Contáctanos para recibir asesoramiento personalizado.</li>
            <li><i class="fas fa-solar-panel icon"></i> Aprende sobre energías renovables y opciones sostenibles.</li>
        </ul>

        <p>¡Empieza hoy mismo tu camino hacia un hogar más eficiente y sostenible!</p>

        <a href="#" class="button">Comienza ahora</a>

        <!-- Redes sociales (ejemplo de iconos) -->
        <div class="social-icons">
            <a href="#" class="fab fa-facebook"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-google"></a>
        </div>
    </div>
@endsection
