
<div class="row">
    @foreach ($productos as $producto)
    <div class="col-md-{{$colmedio}} justify-content-center mb-3">
        <a href="#" class="text-decoration-none">
            <div class="card w-100 filter" data-dispo="{{$producto->estadoProductoWeb}}" data-grupo="{{$producto->idGrupo}}" data-marca="{{$producto->idMarca}}" style="width: 16rem">
                <a href="{{ route('producto', [$producto->slugProducto]) }}">
                    <img src="{{ $producto->publicImages()[0] }}" class="card-img-top productimg" alt="...">
                </a>
                <div class="card-body">
                    <div class="row" style="height:4rem">
                        <a href="{{ route('producto', [$producto->slugProducto]) }}" class="text-decoration-none text-dark fw-bold text-center fs-card-text">
                            <h7 class="card-title letters truncar-tres-lineas">{{ $producto->nombreProducto }}</h7>
                        </a>
                    </div>
                    <div class="row">
                        <p class="card-text text-center {{ $producto->estadoColor() }} fs-card-text">
                            <strong class="card-estado">{{ $producto->estadoProductoWeb }}</strong>
                        </p>
                        <p class="card-marca d-none">{{ $producto->idMarca }}</p>
                        <p class="card-categoria d-none">{{ $producto->GrupoProducto->idCategoria }}</p>
                        <p class="card-tipo d-none">{{ $producto->GrupoProducto->idTipoProducto }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-start">
                            <p class="mb-0 fs-card-text truncar-one-lineas">
                                <strong style="color:{{ $empres->colorDos }}">Precio:</strong>
                                <span class="precio-card">{{ $producto->precioTotalSol($preciosService) < 1 ? 'Consultar' : 'S/.'.$producto->precioTotalSol($preciosService) }}</span>
                                <span class="fw-lighter">{{ $producto->precioTotalDolar($preciosService) < 1 ? '' : '($'.$producto->precioTotalDolar($preciosService).')' }}</span>
                            </p>
                            <p class="mt-0 fs-card-text"><strong style="color:{{ $empres->colorDos }}">Garantia:</strong> {{ $producto->garantia }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
