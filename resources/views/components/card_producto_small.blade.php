<div class="card_producto_small">
    @php $totalProducts=count($selectedProducts); @endphp
    <div class="row text-center align">
        @foreach($selectedProducts as $producto)
            <div class="col-{{$colsmall}} col-md-{{$colmedio}} justify-content-center mb-3 card-producto">
                <a href="#" class="text-decoration-none">
                    <div class="card w-100 filter" data-dispo="{{$producto->estadoProductoWeb}}" data-grupo="{{$producto->idGrupo}}" data-marca="{{$producto->idMarca}}" style="width: 16rem">
                        <a href="{{route('producto', [$producto->slugProducto])}}">
                            <img src="{{$producto->publicImages()[0]}}" class="card-img-top productimg" alt="..." loading="lazy">
                        </a>
                        <div class="card-body">
                            <div class="row " style="height:4rem">
                                <a href="{{route('producto', [$producto->slugProducto])}}" class="text-decoration-none text-dark fw-bold  fs-card-text" ><h7 class="card-title letters truncar-tres-lineas">{{$producto->nombreProducto}}</h7></a>
                            </div>
                            <div class="row">
                                <p class="card-text text-center {{$producto->estadoColor()}} fs-card-text"><strong>{{$producto->estadoProductoWeb}}</strong></p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-start ">
                                  <p class="mb-0 fs-card-text"><strong style="color:{{$empres->colorDos}}">Precio:</strong> <span class="precio-label">{{$producto->precioTotalSol($preciosService) == 0 ? 'Consultar' : 'S/.'.$producto->precioTotalSol($preciosService)}}</span> 
                                  <span class="fw-lighter">{{$producto->precioTotalDolar($preciosService) < 1 ? '': '($'.$producto->precioTotalDolar($preciosService).')'}}</span></p>
                                  <p class="mt-0 fs-card-text"><strong style="color:{{$empres->colorDos}}">Garantia:</strong> {{$producto->garantia}}</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </a>
            </div>
        @endforeach
    </div>
       
</div>