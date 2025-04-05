@extends('layouts.plantilla2')

@section('titulo', 'Grafica de Consumo')
    @section('css-vista')
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <link rel="stylesheet" href="{{asset('css/grafica.css')}}">
        <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    @endsection

    @section('contenidoVista')
    <style>
        .transparent-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco con 80% de opacidad */
            padding: 20px;
            border-radius: 10px;
        }
        .chart-container {
            width: 70%;
            height: 400px; /* Ajusta la altura según sea necesario */
            display: inline-block;
        }
        .color-bar-container {
            width: 20%;
            height: 400px; /* Ajusta la altura según sea necesario */
            display: inline-block;
            position: relative;
            margin-left: 10px;
        }
        .color-bar {
            width: 20px;
            height: 100%;
            background: linear-gradient(to top, green, yellow, orange, red);
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .arrow {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid black;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    <!-- Título de la sección -->
    <div class="title-container transparent-container">
        <h1>Gráfica de Consumo Eléctrico</h1>
    </div>
    <br>

    <!-- Sección de gráficos -->
    <div class="chart-section">
        <div class="container transparent-container">
            <div id="consumptionChart" class="chart-container"></div>

            <!-- Barra de colores para el consumo -->
            <div class="color-bar-container">
                <div class="color-bar"></div>
                <div id="consumptionArrow" class="arrow"></div>
            </div>

            <!-- Mensajes de consumo -->
            <div class="message-container">
                <p id="mostConsumptionMessage"></p>
                <p id="totalConsumptionMessage"></p>
                <p id="weeklyConsumptionMessage"></p>
                <p id="monthlyConsumptionMessage"></p>
            </div>
        </div>
    </div>

    <!-- Botones de navegación -->
    <div class="button-container transparent-container">
        <button onclick="location.href='{{route('rutaCalcu')}}'">Volver a la Calculadora</button>
        <button onclick="location.href='{{route('rutaConsejos')}}'">Ver Consejos y Recomendaciones</button>
        <button onclick="location.href='historial.php'">Ver Historial de Cálculos</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Obtener datos del almacenamiento local
            var appliances = JSON.parse(localStorage.getItem('electrodomesticos')) || [];
    
            // Referencias a los elementos del DOM
            var consumptionChart = document.getElementById('consumptionChart');
            var mostConsumptionMessage = document.getElementById('mostConsumptionMessage');
            var totalConsumptionMessage = document.getElementById('totalConsumptionMessage');
            var weeklyConsumptionMessage = document.getElementById('weeklyConsumptionMessage');
            var monthlyConsumptionMessage = document.getElementById('monthlyConsumptionMessage');
    
            // Verificar si hay datos en `electrodomesticos`
            if (appliances.length === 0) {
                consumptionChart.innerHTML = "<p style='text-align: center; color: gray;'>No hay datos disponibles</p>";
                mostConsumptionMessage.style.display = 'none';
                totalConsumptionMessage.style.display = 'none';
                weeklyConsumptionMessage.style.display = 'none';
                monthlyConsumptionMessage.style.display = 'none';
                return;
            }
    
            // Mapear los datos de `localStorage` para la gráfica
            var labels = appliances.map(function (appliance) {
                return appliance.equipo || 'Electrodoméstico sin nombre';
            });
    
            var data = appliances.map(function (appliance) {
                return {
                    name: appliance.equipo || 'Sin nombre',
                    y: appliance.consumo / 1000 // Convertir Wh a kWh
                };
            });
    
            var costs = appliances.map(function (appliance) {
                return appliance.costo || 0;
            });
    
            // Calcular valores totales
            var totalConsumption = data.reduce((sum, d) => sum + d.y, 0);
            var weeklyConsumption = (totalConsumption / 30) * 7;
    
            // Encontrar el electrodoméstico con mayor consumo
            var maxConsumption = Math.max(...data.map(d => d.y));
            var maxIndex = data.findIndex(d => d.y === maxConsumption);
            var mostConsumingAppliance = labels[maxIndex];
    
            // Mostrar mensajes de consumo
            mostConsumptionMessage.textContent =
                `El electrodoméstico con más gasto en kWh es: ${mostConsumingAppliance}.`;
            totalConsumptionMessage.textContent =
                `Consumo total diario: ${(totalConsumption / 30).toFixed(2)} kWh.`;
            weeklyConsumptionMessage.textContent =
                `Consumo total semanal: ${weeklyConsumption.toFixed(2)} kWh.`;
    
            var consumptionLevel = '';
            if (totalConsumption <= 300) {
                monthlyConsumptionMessage.textContent = `Consumo total mensual: ${totalConsumption.toFixed(2)} kWh. El consumo es bajo.`;
                monthlyConsumptionMessage.className = 'consumo-bajo';
                consumptionLevel = 'bajo';
            } else if (totalConsumption <= 900) {
                monthlyConsumptionMessage.textContent = `Consumo total mensual: ${totalConsumption.toFixed(2)} kWh. El consumo es moderado.`;
                monthlyConsumptionMessage.className = 'consumo-moderado';
                consumptionLevel = 'moderado';
            } else {
                monthlyConsumptionMessage.textContent = `Consumo total mensual: ${totalConsumption.toFixed(2)} kWh. El consumo es alto.`;
                monthlyConsumptionMessage.className = 'consumo-alto';
                consumptionLevel = 'alto';
            }
    
            // Guardar nivel de consumo en localStorage
            localStorage.setItem('consumptionLevel', consumptionLevel);
    
            // Ajuste de la posición de la flecha en la barra de colores
            var arrow = document.getElementById('consumptionArrow');
            var arrowPosition = (totalConsumption / 900) * 100; // Suponiendo que 900 kWh es el máximo
            if (arrowPosition > 100) arrowPosition = 100;
            arrow.style.top = (100 - arrowPosition) + '%';
    
            // Configuración de Highcharts
            Highcharts.chart('consumptionChart', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0,
                        depth: 70
                    }
                },
                title: {
                    text: 'Consumo Eléctrico por Electrodoméstico'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: {point.percentage:.1f} %'
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Consumo',
                    data: data
                }]
            });
        });
    </script>
    
    
    

    
    
@endsection
