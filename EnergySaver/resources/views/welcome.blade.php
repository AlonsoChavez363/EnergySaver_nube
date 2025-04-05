<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('img/logotipo.ico?v=2') }}" type="image/x-icon">
    <title>Energy Saver</title>
    <style>
        /* General styles for body */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #4CAF50, #1E7F4C); /* Green gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            animation: bgAnimation 10s infinite alternate; /* Background animation */
        }

        /* Main container */
        .main-container {
            background: white;
            border-radius: 30px;
            padding: 40px;
            text-align: center;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 90%;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
            animation: fadeIn 1s ease-in-out;
        }

        /* Hover effect on main container */
        .main-container:hover {
            transform: translateY(-10px);
        }

        /* Title styles */
        h1 {
            font-size: 2.5em;
            color: #1e4d29;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 15px rgba(255, 255, 255, 0.6);
            animation: textGlow 1.5s ease-in-out infinite alternate;
        }

        /* Logo styles */
        .logo-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
            animation: bounce 1.5s ease-in-out infinite;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }

        /* Info text styles */
        .info-text {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            letter-spacing: 0.5px;
            animation: fadeInText 1s ease-in-out;
        }

        /* Button container */
        .buttons-container {
            display: flex;
            gap: 25px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInButtons 1s ease-in-out;
            margin-top: 30px;
        }

        /* Button styles */
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            animation: buttonPulse 2s infinite alternate;
        }

        .btn:hover {
            background-color: #388e3c;
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        .btn:active {
            background-color: #45a049;
            transform: scale(1);
        }

        /* Animations for background, fade in, text and buttons */
        @keyframes bgAnimation {
            0% {
                background: linear-gradient(135deg, #4CAF50, #1E7F4C);
            }
            50% {
                background: linear-gradient(135deg, #1E7F4C, #4CAF50);
            }
            100% {
                background: linear-gradient(135deg, #4CAF50, #1E7F4C);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInText {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes fadeInButtons {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes textGlow {
            0% {
                text-shadow: 2px 2px 10px rgba(255, 255, 255, 0.3);
            }
            50% {
                text-shadow: 2px 2px 30px rgba(255, 255, 255, 0.6);
            }
            100% {
                text-shadow: 2px 2px 10px rgba(255, 255, 255, 0.3);
            }
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        @keyframes buttonPulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
            }
            50% {
                transform: scale(1.1);
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.6);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.4);
            }
        }

        /* Additional content section */
        .additional-info {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            animation: fadeInText 1s ease-in-out;
            max-width: 600px;
            margin: 50px auto;
        }

        .additional-info h2 {
            font-size: 2.2em;
            color: #1E7F4C;
            margin-bottom: 20px;
            text-align: center;
        }

        .benefit-list {
            list-style: none;
            padding: 0;
            color: #444;
            margin-bottom: 30px;
            padding-left: 20px; /* Better padding for the list */
        }

        .benefit-list li {
            font-size: 18px;
            margin: 10px 0;
            position: relative;
            padding-left: 30px;
        }

        .benefit-list li:before {
            content: "✔";
            position: absolute;
            left: 10px;
            color: #4CAF50;
        }

        .testimonials {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
        }

        .testimonial {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .testimonial:hover {
            transform: translateY(-10px);
        }

        .testimonial p {
            font-style: italic;
            font-size: 16px;
            color: #555;
        }

        .testimonial h3 {
            color: #1E7F4C;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="main-container">
        <h1>Energy Saver</h1>
        <img src="{{ asset('img/logotipo.jpeg') }}" alt="Logotipo" class="logo-img">
        <p class="info-text">Somos una página web diseñada para ayudar a ahorrar energía en el hogar. Ofrecemos soluciones inteligentes que optimizan el consumo y reducen el desperdicio de energía. ¡Es hora de tomar el control de tu consumo energético!</p>
        
        <div class="buttons-container">
            <a href="{{ route('rutaFormulario') }}" class="btn">Registrar</a>
            <a href="{{ route('rutaLogin') }}" class="btn">Iniciar Sesión</a>
            <a href="{{ route('rutaCalculadora') }}" class="btn">Calculadora</a>
        </div>
    </div>

    <!-- Additional content section -->
    <div class="additional-info">
        <h2>¿Por qué ahorrar energía?</h2>
        <ul class="benefit-list">
            <li>Reducirás tu factura de electricidad.</li>
            <li>Contribuirás a la protección del medio ambiente.</li>
            <li>Mejorarás la eficiencia energética de tu hogar.</li>
            <li>Ayudarás a disminuir las emisiones de carbono.</li>
        </ul>
        <h2>Lo que nuestros usuarios dicen:</h2>
        <div class="testimonials">
            <div class="testimonial">
                <h3>Juan Pérez</h3>
                <p>"Gracias a Energy Saver, logré ahorrar hasta un 30% en mi factura de electricidad. ¡Recomiendo completamente esta plataforma!"</p>
            </div>
            <div class="testimonial">
                <h3>Ana Gómez</h3>
                <p>"Una herramienta increíble. Ahora sé exactamente qué dispositivos están consumiendo más energía. ¡Es muy útil!"</p>
            </div>
        </div>
    </div>
</body>
</html>
