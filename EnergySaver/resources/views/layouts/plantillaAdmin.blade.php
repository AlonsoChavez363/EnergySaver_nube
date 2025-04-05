<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/themes/default.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>

    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])
    @yield('css-admi')
    @yield('css-AdminUsuariosForm')
</head>


<body style="margin: 0; font-family: Arial, sans-serif; background: url('{{ asset('img/FA4.jpg') }}') no-repeat center center fixed; background-size: cover;">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white position-fixed" style="top: 0; left: 0; width: 280px; height: 100vh; padding: 20px;">
            <a href="{{ route('rutaAdmin') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="{{ asset('img/security.png') }}" alt="Logotipo" width="40" height="40" class="me-2">
                <span class="fs-4">Panel De Control</span>
            </a>
            <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('rutaAdminVisualUsuarios') }}" class="nav-link text-white" aria-current="page">
                    <img src="{{ asset('img/user.png') }}" alt="Usuarios" width="40" height="40" class="me-2">
                    Usuarios
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="{{ asset('img/electric-appliance.png') }}" alt="Electrodomésticos" width="40" height="40" class="me-2">
                    Electrodomésticos
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="{{ asset('img/communicate.png') }}" alt="Mensajes" width="40" height="40" class="me-2">
                    Mensajes
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <img src="{{ asset('img/calendar.png') }}" alt="Agenda" width="40" height="40" class="me-2">
                    Agenda
                </a>
            </li>
            <li>
                <a href="{{ route('rutaAdminForm') }}" class="nav-link text-white">
                    <img src="{{ asset('img/admin.png') }}" alt="Administradores" width="40" height="40" class="me-2">
                    Administradores
                </a>
            </li>
            <li class="nav-item">
                <form id="logout" action="{{ route('rutaSalir') }}" method="POST" style="display: flex; align-items: center; gap: 10px;">
                    @csrf
                    <button type="submit" class="logout-button">
                        <img src="{{ asset('img/logout.png') }}" alt="Cerrar sesión" width="40" height="40" class="logout-icon"/>
                    </button>
                    <span class="logout-text">Cerrar sesión</span>
                </form>
            </li>
            
            
            
        </ul>
        
        

        <!-- Contenedor del contenido principal -->
        <div class="main-content" style="flex-grow: 1; margin-left: 300px; padding: 20px;">
            @yield('contenidoUsuariosAdminForm')
            @yield('contenidoAdmisActivos')
        </div>
    </div>

    <script>
        document.getElementById('logout').addEventListener('submit', function(event) {
            event.preventDefault(); // Detener el envío del formulario
            alertify.confirm(
                "Confirmar Cierre de Sesión",
                "¿Estás seguro de que deseas cerrar sesión?",
                () => {
                    this.submit(); // Enviar el formulario si el usuario confirma
                },
                () => {
                    alertify.error("Acción cancelada"); // Mostrar un mensaje si el usuario cancela
                }
            ).set('labels', { ok: 'Sí', cancel: 'No' }); // Personalizar los botones de la alerta
        });
    </script>
    
    
</body>
</html>
