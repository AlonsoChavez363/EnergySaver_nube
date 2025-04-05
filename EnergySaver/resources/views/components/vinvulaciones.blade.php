<div class="container mt-4">
    <div class="container info-section">
        <h1>{{ $encabezado }}</h1>
        <div class="content">
            @if($mostrarImagen && $imagen)
                <img src="{{ $imagen }}" alt="{{ $encabezado }}" class="product-image">
            @endif
            <p>{{$descripcion}}</p>
            <p>{{ $slot }}</p>
            <ul>
                <li>{{$carac1}}</li>
                <li>{{$carac2}}</li>
                <li>{{$carac3}}</li>
            </ul>
            @if($txtboton)
                <a href="https://fermanenergy.com/" class="btn btn-primary">{{ $txtboton }}</a>
            @endif
        </div>
    </div>
</div>



