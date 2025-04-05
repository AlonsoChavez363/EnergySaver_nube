@extends('layouts.plantilla2')

@section('titulo', 'Grafica de Consumo')
@section('UsuariosInfo')
    <title>Gestión de Usuarios</title>
    <style>
        /* Estilo para centrar la sección y darle fondo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .profile-container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 95%;
            max-width: 900px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 1.1em;
        }

        th {
            background: #27ae60;
            color: white;
            font-weight: bold;
        }

        tr {
            transition: background 0.3s ease-in-out;
        }

        tr:hover {
            background: #ecf0f1;
        }

        /* Estilos para los botones */
        .edit-btn, .save-btn {
            cursor: pointer;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            font-size: 1em;
            transition: 0.3s ease-in-out;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        }

        .edit-btn {
            background-color: #f39c12;
            color: white;
        }

        .edit-btn:hover {
            background-color: #e67e22;
            transform: scale(1.05);
        }

        .save-btn {
            background-color: #2ecc71;
            color: white;
            display: none;
        }

        .save-btn:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }

        /* Estilos para los campos de entrada */
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            font-size: 1em;
            transition: 0.3s;
        }

        input:focus {
            border-color: #27ae60;
            outline: none;
            box-shadow: 0 0 8px rgba(39, 174, 96, 0.4);
        }

    </style>

    <div class="profile-container">
        <h2>Perfil de Usuario</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" value="Alonso" disabled></td>
                    <td><input type="text" value="Chávez" disabled></td>
                    <td><input type="date" value="2004-04-27" disabled></td>
                    <td><input type="email" value="chavezalonso599@gmail.com" disabled></td>
                    <td>
                        <button class="edit-btn" onclick="editarFila(this)">Editar</button>
                        <button class="save-btn" onclick="guardarFila(this)">Guardar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function editarFila(boton) {
            let fila = boton.closest("tr");
            let inputs = fila.querySelectorAll("input");
            inputs.forEach(input => input.removeAttribute("disabled"));
            fila.querySelector(".edit-btn").style.display = "none";
            fila.querySelector(".save-btn").style.display = "inline-block";
        }

        function guardarFila(boton) {
            let fila = boton.closest("tr");
            let inputs = fila.querySelectorAll("input");
            inputs.forEach(input => input.setAttribute("disabled", "true"));
            fila.querySelector(".edit-btn").style.display = "inline-block";
            fila.querySelector(".save-btn").style.display = "none";
            alert("Información actualizada correctamente");
        }
    </script>
@endsection
