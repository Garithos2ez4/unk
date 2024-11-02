<div class="row">
    <div class="col-6 col-md-3 d-none d-sm-block">
        <h6 class=" pt-4 fw-light" id="recountMedio">{{$productos->total()}} productos encontrados</h6>
    </div>
    <div class="col-12 col-md-9 d-flex justify-content-center justify-content-md-end align-items-center pt-2 {{$productos->lastPage() < 2 ? 'd-none' : ''}}">
            <ul class="pagination custom-pagination mt-2" id="pagination">
              <li class="page-item">
                    <a id="page-item-previus" href="{{$productos->previousPageUrl() == null ? 'javascript:void(0)' : $productos->previousPageUrl()}}" class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Previous">
                  <span aria-hidden="true"><i class="bi bi-caret-left-fill"></i></span>
                </a>
              </li>
              @for ($i = 1; $i <= $productos->lastPage(); $i++)
              <li data-pag="{{$i}}" class="page-item  pag-btn {{$productos->currentPage() == $i ? 'active': ''}} current-page">
                <a href="{{$productos->url($i)}}" class="page-link bg-empresa-tres text-empresa-uno ">{{$i}}</a>
              </li>
              @endfor
              
              <li class="page-item">
                <a id="page-item-next" href="{{$productos->nextPageUrl() == null ? 'javascript:void(0)' : $productos->nextPageUrl()}}" class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Next" >
                  <span aria-hidden="true"><i class="bi bi-caret-right-fill"></i></span>
                </a>
              </li>
            </ul>
    </div>
</div>
<div class="row">
    @foreach ($productos as $producto)
    <div class="col-{{$colsmall}} col-md-{{$colmedio}} justify-content-center mb-3">
            <div class="card w-100 filter border shadow" data-dispo="{{$producto->estadoProductoWeb}}" data-grupo="{{$producto->idGrupo}}" data-marca="{{$producto->idMarca}}" style="width: 16rem">
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
    </div>
    @endforeach
</div>
