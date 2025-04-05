@extends('layouts.plantilla2')

@section('Titulo', 'ChatBot')

@section('css-estilos')
    <style>
         /* Fondo animado de hojas cayendo */
    @keyframes fallLeaves {
        0% { transform: translateY(-100vh) rotate(0deg); opacity: 1; }
        100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
    }

    .leaf {
        position: fixed;
        top: -50px;
        width: 20px;
        height: 20px;
        background: url('https://i.imgur.com/LGbcTqx.png') no-repeat center;
        background-size: contain;
        opacity: 0.8;
        animation: fallLeaves 6s linear infinite;
    }

    /* Generar múltiples hojas */
    .leaf:nth-child(1) { left: 5%; animation-duration: 7s; }
    .leaf:nth-child(2) { left: 20%; animation-duration: 5s; }
    .leaf:nth-child(3) { left: 40%; animation-duration: 6s; }
    .leaf:nth-child(4) { left: 60%; animation-duration: 8s; }
    .leaf:nth-child(5) { left: 80%; animation-duration: 6s; }

    /* Estilos generales */
    .container {
        margin-top: 30px;
        padding: 15px;
    }

    /* Card del chatbot */
    .chat-card {
        background-color: #eafbea;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        border: 2px solid #4caf50;
    }

    .chat-card:hover {
        transform: translateY(-5px);
    }

    /* Título del chatbot */
    .chat-title {
        font-size: 1.8em;
        color: #2e7d32;
        text-align: center;
        font-weight: bold;
        margin-bottom: 25px;
    }

    /* Contenedor de mensajes */
    #chatbot-container {
        height: 350px;
        overflow-y: auto;
        background-color: #f0fff0;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
        font-size: 0.9em;
        color: #2e7d32;
        box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.1);
        border: 1px solid #66bb6a;
    }

    /* Mensajes */
    .chat-message {
        margin-bottom: 15px;
    }

    .chat-message strong {
        color: #388e3c;
    }

    /* Input y botón de envío */
    .btn-send {
        background-color: #4caf50;
        border: none;
        padding: 10px 20px;
        color: white;
        font-size: 1em;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-send:hover {
        background-color: #388e3c;
        transform: scale(1.05);
    }

    .input-group input {
        border-radius: 30px;
        border: 2px solid #81c784;
        padding: 10px;
    }

    .input-group input:focus {
        border-color: #4caf50;
        outline: none;
    }

    /* Botones de opciones */
    .opciones-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 15px;
    }

    .opciones-container button {
        background-color: #c8e6c9;
        border: 1px solid #81c784;
        padding: 8px 15px;
        margin: 5px;
        border-radius: 20px;
        font-size: 0.9em;
        color: #2e7d32;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .opciones-container button:hover {
        background-color: #a5d6a7;
        transform: scale(1.05);
    }

    /* Estilo del formulario */
    .formulario-container {
        margin-top: 20px;
        padding: 20px;
        background-color: #e8f5e9;
        border-radius: 15px;
        box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.1);
        border: 2px solid #66bb6a;
    }

    .formulario-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 10px;
        border: 1px solid #a5d6a7;
        font-size: 0.9em;
    }

    .formulario-container input:focus {
        border-color: #4caf50;
        outline: none;
    }

    .formulario-container button {
        background-color: #4caf50;
        border: none;
        padding: 10px 20px;
        color: white;
        font-size: 1em;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .formulario-container button:hover {
        background-color: #388e3c;
    }

    /* Responsividad */
    @media (max-width: 768px) {
        .chat-card {
            padding: 20px;
        }

        #chatbot-container {
            height: 250px;
        }
    }
    </style>
@endsection

@section('contenidoChatbot')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card chat-card shadow-lg">
                    <h3 class="chat-title">ChatBot EnergySaver</h3>

                    <!-- Contenedor de chat -->
                    <div id="chatbot-container" class="border rounded p-3 mb-3">
                        <p class="chat-message"><strong>ChatBot:</strong> Envíame un mensaje para comenzar.</p>
                    </div>

                    <!-- Input de mensaje -->
                    <div class="input-group">
                        <input type="text" id="mensaje-usuario" class="form-control" placeholder="Escribe un mensaje..." autofocus>
                        <button id="enviar-mensaje" class="btn-send">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputMensaje = document.getElementById('mensaje-usuario');
            const botonEnviar = document.getElementById('enviar-mensaje');
            const chatContainer = document.getElementById('chatbot-container');

            function agregarMensaje(remitente, mensaje) {
                const nuevoMensaje = document.createElement('p');
                nuevoMensaje.classList.add('chat-message');
                nuevoMensaje.innerHTML = `<strong>${remitente}:</strong> ${mensaje}`;
                chatContainer.appendChild(nuevoMensaje);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

            function enviarMensaje(mensajeUsuario = null) {
                const mensaje = mensajeUsuario || inputMensaje.value.trim();
                if (!mensaje) return;

                if (!mensajeUsuario) {
                    agregarMensaje('Tú', mensaje);
                    inputMensaje.value = '';
                }

                fetch('{{ route('chatbot.procesar') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ mensaje: mensaje }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        agregarMensaje('ChatBot', data.message);
                        setTimeout(() => { chatContainer.scrollTop = chatContainer.scrollHeight; }, 300); // Enfoque en la respuesta
                    }

                    setTimeout(() => {
                        if (data.options) {
                            mostrarOpciones(data.options);
                        }
                        if (data.form) {
                            mostrarFormulario(data.form);
                        }
                    }, 500); // Retraso antes de mostrar menú
                })
                .catch(error => {
                    console.error('Error:', error);
                    agregarMensaje('ChatBot', 'Hubo un error al procesar tu mensaje. Intenta de nuevo.');
                });
            }

            function mostrarOpciones(opciones) {
                const opcionesContainer = document.createElement('div');
                opcionesContainer.className = 'opciones-container';

                opciones.forEach(opcion => {
                    const boton = document.createElement('button');
                    boton.textContent = opcion.label;
                    boton.className = 'btn btn-secondary m-1';
                    boton.addEventListener('click', () => {
                        agregarMensaje('Tú', opcion.label);
                        enviarMensaje(opcion.value);
                    });
                    opcionesContainer.appendChild(boton);
                });

                chatContainer.appendChild(opcionesContainer);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

            function mostrarFormulario(formulario) {
                const formularioContainer = document.createElement('div');
                formularioContainer.className = 'formulario-container';

                formulario.forEach(campo => {
                    const inputGroup = document.createElement('div');
                    inputGroup.className = 'mb-3';

                    const label = document.createElement('label');
                    label.textContent = campo.label;
                    label.className = 'form-label';

                    const input = document.createElement('input');
                    input.type = campo.type;
                    input.name = campo.name;
                    input.className = 'form-control';

                    inputGroup.appendChild(label);
                    inputGroup.appendChild(input);
                    formularioContainer.appendChild(inputGroup);
                });

                const botonEnviar = document.createElement('button');
                botonEnviar.textContent = 'Enviar';
                botonEnviar.className = 'btn btn-primary';
                botonEnviar.addEventListener('click', function () {
                    const datosFormulario = {};
                    formulario.forEach(campo => {
                        datosFormulario[campo.name] = formularioContainer.querySelector(`[name="${campo.name}"]`).value;
                    });

                    fetch('{{ route('chatbot.procesar') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            mensaje: 'guardar_tarjeta',
                            ...datosFormulario,
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            agregarMensaje('ChatBot', data.message);
                            setTimeout(() => { chatContainer.scrollTop = chatContainer.scrollHeight; }, 300);
                        }
                        setTimeout(() => {
                            if (data.options) {
                                mostrarOpciones(data.options);
                            }
                        }, 500);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        agregarMensaje('ChatBot', 'Hubo un error al procesar los datos. Intenta de nuevo.');
                    });
                });

                formularioContainer.appendChild(botonEnviar);
                chatContainer.appendChild(formularioContainer);
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

            botonEnviar.addEventListener('click', () => enviarMensaje());
            inputMensaje.addEventListener('keypress', event => {
                if (event.key === 'Enter') enviarMensaje();
            });
            
        });
        
    </script>
@endsection
