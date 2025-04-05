<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/logotipo.ico') }}" type="image/x-icon">
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    @yield('css-estilos')
    @yield('css-vista')
    @yield('css-estilo')
    @yield('css-calcu')

    <style>
        /* Barra de navegación mejorada */
        nav.navbar {
        background: linear-gradient(135deg, rgb(66, 148, 63), rgb(49, 128, 49));
        padding: 20px 0;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.9s ease, background-color 0.3s ease;
        border-bottom: 2px solid #16a085;
        position: fixed;
        width: 100%;
        top: -80px; /* Se oculta inicialmente */
        z-index: 1000;
    }

    /* Muestra la barra al pasar el cursor cerca del borde superior */
    body:hover nav.navbar {
        transform: translateY(80px);
    }

        .navbar-nav {
            display: flex;
            justify-content: center; /* Centra los elementos */
            gap: 40px;
            flex-wrap: wrap;
            align-items: center;
            width: 100%;
        }

        .navbar-nav .nav-item {
            animation: fadeIn 0.5s ease-in-out;
        }

        .navbar-nav .nav-item .nav-link {
            color: #fff !important;
            font-weight: bold;
            padding: 12px 24px;
            text-align: center;
            border-radius: 5px;
            font-size: 1.1em;
            position: relative;
            display: block;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #fff !important;
            background: rgba(0, 0, 0, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .navbar-nav .nav-item .nav-link.active {
            border-bottom: 3px solid #16a085;
            background: rgba(0, 0, 0, 0.3);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Posicionar el botón de cerrar sesión en la esquina inferior izquierda */
        .logout-container {
            position: fixed;
            bottom: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease, transform 0.3s ease;
            color: white;
        }

        .logout-container:hover {
            background-color: #007BFF;
            transform: scale(1.05);
        }

        .logout-icon {
            margin-right: 10px;
            width: 30px;
            height: 30px;
        }

        .logout-text {
            font-weight: bold;
            font-size: 14px;
            color: white;
        }

        .chatbot-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s, background-color 0.3s;
        }

        .chatbot-icon:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .chatbot-icon img {
            width: 35px;
            height: 35px;
        }

        /* Barra de navegación fija en la parte superior */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('{{ asset('img/FONDO4.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding-top: 100px; /* espacio para la barra de navegación */
        }

        .navbar-toggler-icon {
            color: #fff;
        }

        /* Estilo para la bienvenida */
        .welcome-message {
            color: white;
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            margin-top: 100px; /* ajusta según sea necesario */
            animation: slideUp 1s ease-in-out;
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
        /* Estilo del botón de cerrar sesión */
    #rutaSalir button {
        background-color: #d9534f; /* Rojo suave */
        color: white;
        border: none;
        padding: 10px 15px;
        font-size: 1em;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    #rutaSalir button:hover {
        background-color: #c9302c; /* Rojo más oscuro */
        transform: scale(1.05);
    }

    /* Estilos personalizados para Alertify.js */
    .ajs-header {
        background-color: #5cb85c !important; /* Verde de éxito */
        color: white !important;
        font-weight: bold;
    }

    .ajs-dialog {
        border-radius: 10px !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2) !important;
    }

    .ajs-footer .ajs-buttons .ajs-button {
        border-radius: 5px !important;
        padding: 8px 15px !important;
    }

    .ajs-ok {
        background-color: #5cb85c !important;
        color: white !important;
    }

    .ajs-cancel {
        background-color: #d9534f !important;
        color: white !important;
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('rutaHome') }}">
                        <i class="fas fa-home" style="font-size: 1.2em;"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rutaCalcu') }}">
                        <i class="fas fa-calculator" style="font-size: 1.2em;"></i> Calculadora
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rutaVinculaciones') }}">
                        <i class="fas fa-users" style="font-size: 1.2em;"></i> Asociaciones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rutaContacto') }}">
                        <i class="fas fa-envelope" style="font-size: 1.2em;"></i> Contacto
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('infoUsuario') }}" class="nav-link">
                        <i class="fas fa-user-circle" style="font-size: 1.2em;"></i> Perfil
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="content">
        @yield('contenidoHome')
    </div>

    <div class="content">
        @yield('contenidoCalcu')
    </div>

    <div class="content">
        @yield('contenidoVinculacion')
    </div>

    <div class="content">
        @yield('contenidoContacto')
    </div>

    <div class="content">
        @yield('contenidoVista')
    </div>

    <div class="content">
        @yield('contenidoConsejos')
    </div>

    <div class="content">
        @yield('contenidoChatbot')
    </div>

    <div class="content">
        @yield('EditarUsuarios')
    </div>

    <div class="content">
        @yield('UsuariosInfo')
    </div>

    <div class="logout-container">
        <form id="rutaSalir" action="{{ route('rutaSalir') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">
                <img src="{{ asset('img/check-out.png') }}" alt="Cerrar sesión" class="logout-icon" />
                <span class="logout-text">Cerrar sesión</span>
            </button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const logoutForm = document.getElementById("rutaSalir");
        logoutForm.addEventListener("submit", function (e) {
            e.preventDefault();
            alertify.confirm(
                "Confirmación de Cierre de Sesión",
                "¿Estás seguro de que deseas cerrar sesión?",
                function () {
                    logoutForm.submit();
                },
                function () {
                    alertify.error("Acción cancelada");
                }
            ).set({ labels: { ok: "Sí, salir", cancel: "Cancelar" } });
        });
    });
    </script>

    <div class="chatbot-icon" onclick="openChat()">
        <img src="https://cdn-icons-png.flaticon.com/512/4712/4712037.png" alt="Chatbot">
    </div>

    <script>
        function openChat() {
            window.location.href = "{{ route('rutaChatBot') }}";
        }

        document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.querySelector("nav.navbar");
        let timeout;

        document.addEventListener("mousemove", function (event) {
            if (event.clientY < 100) {
                navbar.style.transform = "translateY(80px)";
                clearTimeout(timeout);
            } else {
                timeout = setTimeout(() => {
                    navbar.style.transform = "translateY(-80px)";
                }, 1500);
            }
        });
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>
</html>
