@extends('layouts.plantilla2')

@section('titulo', 'Contacto')

@section('css-estilos')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome para los iconos -->

    <style>
        /* Estilo general para la página de contacto */
        .contacto-container {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out; /* Animación de entrada */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Animación de entrada */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Título de la sección de contacto */
        .contacto-titulo {
            font-size: 1.8em;
            background-color:rgb(22, 148, 22); /* Verde suave */
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            transition: background-color 0.3s ease; /* Animación suave al pasar el ratón */
        }

        .contacto-titulo:hover {
            background-color: #21867a;
        }

        /* Estilos para las tarjetas de contacto */
        .contacto-tarjeta {
            background-color: #fff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease; /* Animación al pasar el ratón */
            width: 100%; /* Para asegurar que no se estiren */
        }

        .contacto-tarjeta:hover {
            transform: translateY(-5px); /* Efecto de elevación al pasar el ratón */
        }

        .contacto-tarjeta h5 {
            font-size: 1.2em;
            color:rgb(46, 157, 42);
            margin-bottom: 10px;
            font-weight: bold;
        }

        .contacto-tarjeta p {
            font-size: 0.9em;
            color: #555;
        }

        /* Estilos para el formulario de contacto */
        .contacto-formulario {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%; /* Para asegurar que no se estiren */
        }

        .contacto-formulario .form-group {
            margin-bottom: 15px;
        }

        .contacto-formulario label {
            font-size: 0.9em;
            font-weight: bold;
            color: #333;
        }

        .contacto-formulario input, .contacto-formulario textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9em;
            margin-top: 5px;
            transition: border-color 0.3s ease;
        }

        .contacto-formulario input:focus, .contacto-formulario textarea:focus {
            border-color:rgb(52, 157, 42);
            outline: none;
        }

        .contacto-formulario textarea {
            height: 80px;
        }

        .contacto-formulario button {
            background-color:rgb(42, 157, 42);
            border: none;
            color: white;
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .contacto-formulario button:hover {
            background-color: #21867a;
        }

        /* Estilos para las redes sociales */
        .contacto-redes {
            text-align: center;
            margin-top: 20px;
        }

        .contacto-redes a {
            margin: 0 10px;
            font-size: 1.5em;
            color: #2a9d8f;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .contacto-redes a:hover {
            color: #21867a;
            transform: scale(1.2); /* Animación de escala al pasar el ratón */
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            .contacto-container {
                flex-direction: column;
                padding: 15px;
            }

            .contacto-titulo {
                font-size: 1.6em;
            }

            .contacto-formulario button {
                padding: 8px;
            }

            .contacto-redes a {
                font-size: 1.2em;
            }

            .contacto-tarjeta {
                width: 100%;
            }
        }
    </style>
@endsection

@section('contenidoContacto')
    <div class="contacto-container">
        <div class="contacto-columna" style="width: 48%; padding-right: 2%;">
            <h1 class="contacto-titulo">Contacto</h1>

            <div class="contacto-tarjeta">
                <h5>Teléfono <i class="fas fa-phone-alt"></i></h5>
                <p>4411519805</p>
                <p>Horario: 8 am a 6 pm</p>
            </div>

            <div class="contacto-tarjeta">
                <h5>Correo Electrónico <i class="fas fa-envelope"></i></h5>
                <p>EnergySaver@gmail.com</p>
            </div>
        </div>

        <div class="contacto-columna" style="width: 48%; padding-left: 2%;">
            <div class="contacto-formulario">
                <h5 class="text-center">Formulario de Contacto</h5>
                <form action="" method="POST" id="contactForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{('Nombre')}}</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Introduce tu nombre" value="{{ old('nombre') }}">
                        <small class="fst-italic text-danger">{{ $errors->first('nombre') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" placeholder="Introduce tu correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje</label>
                        <textarea class="form-control" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
                    </div>
                    <button type="submit">Enviar <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>

            <!-- Sección de redes sociales -->
            <div class="contacto-redes">
                <p>Síguenos:</p>
                <a href="https://facebook.com" target="_blank" class="fab fa-facebook-f"></a>
                <a href="https://twitter.com" target="_blank" class="fab fa-twitter"></a>
                <a href="https://instagram.com" target="_blank" class="fab fa-instagram"></a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío del formulario
            
            var formData = new FormData(this);

            fetch('enviar_contacto.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                if (data === "Mensaje enviado correctamente") {
                    document.getElementById('contactForm').reset();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
