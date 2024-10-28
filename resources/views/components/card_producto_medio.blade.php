<div class="card_producto_medio">
    <script src="{{ route('js.pagination-scripts') }}"></script>
    <div class="container" >
        @php $totalProducts=count($storage); @endphp
        @php 
        $cantPag = "";
        $residuoTotal = $totalProducts % 16;
        $mostrarPag="";
      @endphp
      
      @if($residuoTotal == 0)
        @php $cantPag = intdiv($totalProducts, $cantCards); @endphp
      @else
        @php $cantPag = intdiv($totalProducts, $cantCards) + 1; @endphp
      @endif
      
      @if($totalProducts <= $cantCards)
        @php $mostrarPag="d-none"; @endphp
      @endif
          <div class="row d-none d-sm-flex">
              <div class="col-md-3 ">
                  <h6 class=" pt-4 fw-light" id="recountMedio">{{$totalProducts}} productos encontrados</h6>
              </div>
              <div class="col-md-9 d-flex justify-content-end {{$mostrarPag}}">
                      <ul class="pagination custom-pagination " id="pagination">
                        <li class="page-item">
                              <a class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Previous" onclick="minusPage()">
                            <span aria-hidden="true"><i class="bi bi-caret-left-fill"></i></span>
                          </a>
                        </li>
                        @for($i=1;$i<=$cantPag;$i++)
                        <li class="page-item  pag-btn" id='btnPag-{{$i}}'>
                          <a class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" onclick="changeNumber({{$i}})">{{$i}}</a>
                        </li>
                        @endfor
                        <li class="page-item">
                          <a class="page-link bg-empresa-tres text-empresa-uno" style="cursor:pointer" aria-label="Next" onclick="plusPage()">
                            <span aria-hidden="true"><i class="bi bi-caret-right-fill"></i></span>
                          </a>
                        </li>
                      </ul>
              </div>
          </div>
          @php $index = 0; @endphp
          @for($i=1;$i<=$cantPag;$i++)
            <div id="page-{{$i}}" class="page-content">
                <div class="row">
                @for($j=0;$j < $cantCards ;$j++)
                    @if($index < $totalProducts)
                    @php $grupoStorage = $storage[$index]->GrupoProducto; @endphp
                        <div class="col-{{$colsmall}} col-md-{{$colmedio}} justify-content-center mb-3" id="card-{{$i}}">
                            <a href="#" class="text-decoration-none">
                                <div class="card w-100 filter" data-dispo="{{$storage[$index]->estadoProductoWeb}}" data-grupo="{{$storage[$index]->idGrupo}}" data-marca="{{$storage[$index]->idMarca}}" style="width: 16rem">
                                    <a href="{{route('producto', [$storage[$index]->slugProducto])}}">
                                        <img src="{{$storage[$index]->publicImages()[0]}}" class="card-img-top productimg" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <div class="row " style="height:4rem">
                                            <a href="{{route('producto', [$storage[$index]->slugProducto])}}" class="text-decoration-none text-dark fw-bold text-center fs-card-text" ><h7 class="card-title letters truncar-tres-lineas">{{$storage[$index]->nombreProducto}}</h7></a>
                                        </div>
                                        <div class="row">
                                            <p class="card-text text-center {{$storage[$index]->estadoColor()}} fs-card-text">
                                                <strong class="card-estado">{{$storage[$index]->estadoProductoWeb}}</strong>
                                            </p>
                                            <p class="card-marca d-none">{{$storage[$index]->idMarca}}</p>
                                            <p class="card-categoria d-none">{{$grupoStorage->idCategoria}}</p>
                                            <p class="card-tipo d-none">{{$grupoStorage->idTipoProducto}}</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-start ">
                                              <p class="mb-0 fs-card-text truncar-one-lineas">
                                                  <strong style="color:{{$empres->colorDos}}">Precio:</strong>
                                                  <span class="precio-card">{{$storage[$index]->precioTotalSol() < 1 ? 'Consultar' : 'S/.'.$storage[$index]->precioTotalSol()}} </span>
                                                  <span class="fw-lighter">{{$storage[$index]->precioTotalDolar() < 1 ? '' : '($'.$storage[$index]->precioTotalDolar().')'}}</span>
                                              </p>
                                              <p class="mt-0 fs-card-text"><strong style="color:{{$empres->colorDos}}">Garantia:</strong> {{$storage[$index]->garantia}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @php $index++; @endphp
                    @else
                        @php break; @endphp
                    @endif
                @endfor
                </div>
            </div>
          @endfor
    </div>
      
</div>