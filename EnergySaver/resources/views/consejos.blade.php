@extends('layouts.plantilla2')

@section('titulo', 'Consejos y Recomendaciones')
@section('css-estilo')
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="stylesheet" href="{{asset('css/grafica.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
@endsection

@section('contenidoConsejos')
<div class="recomendaciones-container">
    <h1>Consejos y Recomendaciones</h1>
    <div class="row" id="recomendacionesList">
        <!-- Las recomendaciones se cargarán aquí -->
    </div>
    <div class="button-container transparent-container mt-4">
        <button class="btn btn-primary" onclick="location.href='{{route('rutaVisual')}}'">Volver a la Gráfica</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener el nivel de consumo desde localStorage
        var consumptionLevel = localStorage.getItem('consumptionLevel'); // Nivel de consumo: bajo, moderado, alto
        console.log("Nivel de consumo:", consumptionLevel); // Depuración
        var recomendacionesList = document.getElementById('recomendacionesList');

        // Listado de recomendaciones basado en el nivel de consumo
        var recomendaciones = {
            bajo: [
                "Utilice iluminación LED de alta eficiencia para todas sus necesidades de iluminación.",
                "Aproveche la luz natural tanto como sea posible para reducir el uso de electricidad.",
                "Desenchufe los dispositivos electrónicos cuando no estén en uso para evitar el consumo en modo standby.",
                "Instale temporizadores o sensores de movimiento para las luces en áreas comunes.",
                "Realice mantenimiento regular a sus electrodomésticos para asegurar su eficiencia.",
                "Ajuste el termostato a una temperatura eficiente tanto en verano como en invierno.",
                "Utilice ventiladores de techo en lugar de aire acondicionado siempre que sea posible.",
                "Aísle su hogar adecuadamente para mantener la temperatura interior sin recurrir a la calefacción o refrigeración excesiva.",
                "Lave la ropa en ciclos cortos y con agua fría para ahorrar energía.",
                "Seque la ropa al aire libre en lugar de utilizar la secadora."
            ],
            moderado: [
                "Realice auditorías energéticas profesionales para identificar oportunidades de ahorro de energía.",
                "Instale termostatos programables para optimizar el uso de calefacción y aire acondicionado.",
                "Utilice electrodomésticos de alta eficiencia energética en todas las áreas de su hogar.",
                "Aisle adecuadamente su hogar para reducir las pérdidas de calor y frío.",
                "Reemplace ventanas antiguas por modelos de doble acristalamiento para mejorar el aislamiento.",
                "Utilice sistemas de iluminación inteligente para reducir el consumo energético.",
                "Instale paneles solares para generar energía renovable y reducir la dependencia de la red eléctrica.",
                "Optimice el uso de la calefacción y aire acondicionado mediante el uso de termostatos programables.",
                "Use ventiladores de techo para mejorar la circulación del aire y reducir la necesidad de aire acondicionado.",
                "Realice mantenimiento regular a su sistema de calefacción y aire acondicionado."
            ],
            alto: [
                "Considere la instalación de sistemas de energía renovable como paneles solares o turbinas eólicas.",
                "Reemplace los sistemas de calefacción y refrigeración antiguos por bombas de calor de alta eficiencia.",
                "Utilice sistemas de domótica para controlar y reducir el consumo energético en su hogar.",
                "Realice auditorías energéticas periódicas con un profesional para identificar áreas de mejora.",
                "Invierta en electrodomésticos de última generación con alta eficiencia energética.",
                "Instale aislantes térmicos avanzados en paredes, techos y pisos para mejorar el aislamiento.",
                "Cámbiese a tarifas de electricidad que premian el consumo en horas valle.",
                "Promueva el uso de transporte eléctrico y estaciones de carga en su hogar.",
                "Participe en programas de ahorro energético ofrecidos por su proveedor de energía.",
                "Optimice el uso de la calefacción y aire acondicionado mediante el uso de termostatos inteligentes."
            ]
        };

        // Verificar el nivel de consumo y generar recomendaciones
        if (consumptionLevel && recomendaciones[consumptionLevel]) {
            recomendaciones[consumptionLevel].forEach(function (consejo) {
                var card = document.createElement('div');
                card.className = 'col-md-4 mb-3';
                card.innerHTML = `
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">${consejo}</p>
                        </div>
                    </div>
                `;
                recomendacionesList.appendChild(card);
            });
        } else {
            // Si no hay nivel de consumo definido
            var card = document.createElement('div');
            card.className = 'col-md-12';
            card.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">No se ha definido un nivel de consumo. Por favor, calcule su nivel de consumo en la calculadora.</p>
                    </div>
                </div>
            `;
            recomendacionesList.appendChild(card);
        }
    });
</script>


@endsection
