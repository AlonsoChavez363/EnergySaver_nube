<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logotipo.ico?v=2') }}" type="image/x-icon">
    <title>Calculadora</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #4CAF50, #1E7F4C);
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            color: #ffffff;
            text-align: center;
        }

        /* Header - Título */
        header {
            width: 100%;
            background-color: #388e3c;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

        /* Barra de navegación */
        nav {
            width: 100%;
            padding: 15px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        .nav-link {
            margin: 0 15px;
            text-decoration: none;
            color: white;
            font-size: 1.2em;
            font-weight: bold;
            padding: 10px 18px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: #388e3c;
            color: #ffffff;
        }

        /* Contenedor principal */
        .main-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 800px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        /* Título de la calculadora */
        .main-container h2 {
            font-size: 1.6em;
            color: #388e3c;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Estilo para los inputs y select */
        .dropdown-input-container {
            background-color: #ffffff;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-input-container label {
            display: block;
            font-size: 1.1em;
            margin-bottom: 6px;
            color: #388e3c;
        }

        .dropdown-input-container select, .dropdown-input-container input {
            width: 100%;
            padding: 8px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            margin-top: 5px;
            color: #388e3c;
        }

        .dropdown-input-container input:readonly {
            background-color: #e5e5e5;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #388e3c;
            color: white;
        }

        /* Animación para un desvanecimiento suave */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .main-container {
            animation: fadeIn 1s ease-in-out;
        }

    </style>
</head>
<body>
    <header>
        Energy Saver
    </header>
    <nav>
        <a href="{{route('rutaInicio')}}" class="nav-link">Inicio</a>
        <a href="{{route('rutaCalculadora')}}" class="nav-link">Calculadora</a>
    </nav>

    <div class="main-container">
        <h2>Selecciona los detalles del electrodoméstico</h2>

        <!-- Contenedor para la selección de Marca -->
        <div class="dropdown-input-container">
            <label for="brandOptions">Marca:</label>
            <select id="brandOptions" name="brandOptions" onchange="fetchElectrodomesticos(this.value)">
                <option value="" disabled selected>Elige una Marca</option>
            </select>
        </div>

        <!-- Contenedor para la selección de Electrodoméstico -->
        <div class="dropdown-input-container">
            <label for="applianceOptions">Electrodoméstico:</label>
            <select id="applianceOptions" name="applianceOptions" onchange="fetchPotencia(this.value)">
                <option value="" disabled selected>Elige un Electrodoméstico</option>
            </select>
        </div>

        <!-- Contenedor para la potencia -->
        <div class="dropdown-input-container">
            <label for="numberInput">Potencia (kWh):</label>
            <input type="number" id="numberInput" readonly>
        </div>

        <!-- Tabla para listar electrodomésticos -->
        <div>
            <h2>Lista de Electrodomésticos</h2>
            <table id="applianceTable">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Electrodoméstico</th>
                        <th>Potencia (kWh)</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se agregarán las filas dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Llenar marcas al cargar la página
        document.addEventListener("DOMContentLoaded", function () {
            fetch('/marcas')
                .then(response => response.json())
                .then(data => {
                    const brandOptions = document.getElementById("brandOptions");
                    data.forEach(marca => {
                        const option = document.createElement("option");
                        option.value = marca.nombre; // Se usa el nombre de la marca como valor
                        option.textContent = marca.nombre; // Se muestra el nombre de la marca
                        brandOptions.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al cargar las marcas:', error));
        });

        // Obtener electrodomésticos según la marca seleccionada
        function fetchElectrodomesticos(marcaNombre) {
            fetch(`/electrodomesticos/${marcaNombre}`)
                .then(response => response.json())
                .then(data => {
                    const applianceOptions = document.getElementById("applianceOptions");
                    applianceOptions.innerHTML = '<option value="" disabled selected>Elige un Electrodoméstico</option>';
                    data.forEach(electrodomestico => {
                        const option = document.createElement("option");
                        option.value = electrodomestico.nombre; // Asumiendo que los electrodomésticos tienen un nombre
                        option.textContent = electrodomestico.nombre;
                        applianceOptions.appendChild(option);
                    });
                })
                .catch(error => console.error('Error al cargar los electrodomésticos:', error));
        }

        // Obtener potencia según el tipo de electrodoméstico y marca
        function fetchPotencia(tipoNombre) {
            const marcaNombre = document.getElementById("brandOptions").value;
            fetch(`/potencia/${tipoNombre}/${marcaNombre}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("numberInput").value = data.potencia || '';
                })
                .catch(error => console.error('Error al cargar la potencia:', error));
        }
    </script>
</body>
</html>
