<form action="{{ url()->current() }}" method="GET" id="form-filtro-products">
    <div class="container pe-0 ms-0 me-0 d-none d-sm-block">
        <div class="row ps-0">
            <label class="form-label ms-0 text-secondary">Ordenar por:</label>
            <select class="form-select border-empresa-uno mb-3 submit-filtros" name="filtro[orden]">
                <option value="" selected>Relevancia</option>
                <option value="desc">Mayor precio</option>
                <option value="asc">Menor Precio</option>
              </select>
        </div>
        <div class="row ps-2 pe-2 pb-3 pt-3 border-empresa-uno rounded" >
            <div class="col-12">
                <div class="row">
                    <h5 class="ms-0 ps-0">Filtros:</h5>
                </div>
                <div class="row ps-0" >
                        <h6 class="ms-0 ps-0">Disponibilidad:</h6>
                </div>
                <div class="row" style="z-index: 1000">
                    @if(count($filtros['disponibilidad']) > 0)
                        @foreach ($filtros['disponibilidad'] as $dispo)
                            <div class="col-12 ps-0 pe-1">
                                <div class="form-check text-truncate">
                                    <input class="form-check-input border-color-empresa-uno submit-filtros" type="checkbox"  value="{{$dispo}}" name="filtro[dispo][]" id="">
                                    <label class="form-check-label">
                                    <small>{{$dispo}}</small>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <small class="pb-2">No hay</small>
                    @endif
                </div>
                <div class="row" >
                    <h6 class="ms-0 ps-0">Marca:</h6>
                </div>
                <div class="row">
                    @if(count($filtros['marcas']) > 0)
                        @foreach ($filtros['marcas'] as $marca)
                        <div class="form-check col-6 col-md-12">
                            <input class="form-check-input check-marcas border-color-empresa-uno submit-filtros" type="checkbox" name="filtro[marcas][]" value="{{$marca->idMarca}}">
                            <label class="form-check-label">
                                <small>{{$marca->nombreMarca}}</small>
                            </label>
                            </div>
                        @endforeach
                    @else
                        <small>Sin Marcas</small>
                    @endif
                    
                </div>
                <div class="row pt-2" >
                    <h6 class="ms-0 ps-0">Tipo:</h6>
                </div>
                <div class="row">
                    @if(count($filtros['tipos']) > 0)
                        @foreach ($filtros['tipos'] as $tipo)
                            <div class="form-check col-6">
                                <input class="form-check-input check-categorias border-color-empresa-uno submit-filtros" type="checkbox" name="filtro[tipos][]" value="{{$tipo->idTipoProducto}}">
                                <label class="form-check-label lh-1" for="">
                                <small class="">{{$tipo->tipoProducto}}</small>
                                </label>
                            </div>
                        @endforeach
                    @else
                        <small>Sin tipos</small>
                    @endif
                </div>
                <div class="row pt-2" >
                    <h6 class="ms-0 ps-0">Categoria:</h6>
                </div>
                <div class="row">
                    @if(count($filtros['categorias']) > 0)
                        @foreach ($filtros['categorias'] as $categoria)
                            <div class="form-check col-6">
                                <input class="form-check-input check-categorias border-color-empresa-uno submit-filtros" type="checkbox" name="filtro[categorias][]" value="{{$categoria->idCategoria}}">
                                <label class="form-check-label lh-1" for="">
                                <small class="">{{$categoria->nombreCategoria}}</small>
                                </label>
                            </div>
                        @endforeach
                    @else
                        <small>Sin categorias</small>
                    @endif
                </div>
                <div class="row pt-2" >
                    <h6 class="ms-0 ps-0">Especificaciones:</h6>
                </div>
                <div class="row">
                    @if(count($filtros['caracteristicas']) > 0)
                        <div class="accordion accordion-flush ps-0 pe-0 border" id="accordionFlushSpects">
                            @php
                                $cont = 0;
                            @endphp
                            @foreach ($filtros['caracteristicas'] as $caracteristica)
                                @if($caracteristica['tipo'] == 'FILTRO')
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading-{{$cont}}">
                                        <button class="accordion-button ps-1 pe-1 collapsed pt-2 pb-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$cont}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <small class="fw-bold">{{$caracteristica['nombre']}}</small>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse-{{$cont}}" class="accordion-collapse collapse ps-2" aria-labelledby="flush-heading-{{$cont}}" data-bs-parent="#accordionFlushSpects">
                                        @foreach ($caracteristica['especificaciones'] as $spect)
                                        <div class="form-check col-12 pt-1 pb-1">
                                            <input class="form-check-input check-categorias border-color-empresa-uno submit-filtros" type="checkbox" name="filtro[caracteristicas][]" value="{{$spect->caracteristicaProducto}}">
                                            <label class="form-check-label lh-1" for="">
                                            <small class="">{{$spect->caracteristicaProducto}}</small>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            @php
                                $cont ++;
                            @endphp
                            @endforeach
                        </div>
                    @else
                        <small>Sin especificaciones</small>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-start pt-2 pb-0 bg-body d-flex d-sm-none" style="position: sticky;left:10px">
        <div class="col-8">
            <h6 class="pt-2 pb-2 fw-light"><span id="recount">{{$totalProducts}}</span> productos encontrados</h6>
        </div>
        <div class="col-4 text-end">
             <button type="button" class="btn text-end" data-bs-toggle="offcanvas" href="#offcanvasFiltros" aria-controls="offcanvasRight">
            Filtros <i class="bi bi-funnel-fill"></i>
          </button>
        </div>
    </div>
   <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasFiltros" aria-labelledby="offcanvasFiltrosLabel">
      <div class="offcanvas-header d-flex text-center bg-empresa-uno">
        <h5 class="offcanvas-title text-center text-empresa-tres" id="offcanvasFiltrosLabel">FILTROS</h5>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body ">
            <div class="row  border-bottom pt-2 pb-2">
                <button class="btn text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroOrder" aria-expanded="false" aria-controls="collapseExample">
                    Ordenar por
                </button>
                <div class="collapse text-end" id="collapseFiltroOrder">
                    <select class="submit-filtros link-select text-empresa-uno text-end" name="filtro[orden]">
                        <option value="" selected>Relevancia</option>
                        <option value="desc">Mayor precio</option>
                        <option value="asc">Menor precio</option>
                    </select>
                </div>
            </div>
            <div class="row  border-bottom pt-2 pb-2">
                    <button class="btn text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroDisp" aria-expanded="false" aria-controls="collapseExample">
                    Disponibilidad
                  </button>
                    <div class="collapse" id="collapseFiltroDisp">
                        <div class="row">
                            @foreach($filtros['disponibilidad'] as $pdispo)
                            <div class="col-12 text-truncate">
                                <div class="form-check">
                                    <input class="form-check-input border-color-empresa-uno submit-filtros" type="checkbox" value="{{$pdispo}}" name="filtro[dispo][]">
                                    <label class="form-check-label">
                                    <small class="text-uppercase">{{$pdispo}}</small>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
            <div class="row border-bottom pt-2 pb-2">
                    <button class="btn text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroMarcas" aria-expanded="false" aria-controls="collapseExample">
                    Marcas
                  </button>
                  <div class="collapse" id="collapseFiltroMarcas">
                      <div class="row">
                        @foreach($filtros['marcas'] as $marca)
                        <div class="col-6">
                            <div class="form-check">
                              <input class="form-check-input border-color-empresa-uno submit-filtros" type="checkbox" value="{{$marca['idMarca']}}" name="filtro[marcas][]">
                              <label class="form-check-label" for="flexCheckChecked">
                                <small>{{$marca['nombreMarca']}}</small>
                              </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row border-bottom pt-2 pb-2">
                <button class="btn text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroCat" aria-expanded="false" aria-controls="collapseExample">
                Categorias
                </button>
                <div class="collapse" id="collapseFiltroCat">
                    <div class="row">
                        @if($filtros['categorias'])
                            @foreach ($filtros['categorias'] as $categoria)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input border-color-empresa-uno submit-filtros" type="checkbox" value="{{$categoria['idCategoria']}}" name="filtro[categorias][]" >
                                        <label class="form-check-label">
                                        <small>{{$categoria['nombreCategoria']}}</small>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <small>No hay</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row border-bottom pt-2">
                <button class="btn pb-3 text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroEspecificaciones" aria-expanded="false" aria-controls="collapseExample">
                Especificaciones
                </button>
                <div class="collapse" id="collapseFiltroEspecificaciones">
                    <div class="row">
                        <div class="accordion accordion-flush ps-0 pe-0 border" id="accordionFlushSpects">
                            @php
                                $aux = 0;
                            @endphp
                            @foreach ($filtros['caracteristicas'] as $caracteristica)
                                @if($caracteristica['tipo'] == 'FILTRO')
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading-{{$aux}}">
                                        <button class="accordion-button collapsed pt-2 pb-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$aux}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <small class="fw-bold">{{$caracteristica['nombre']}}</small>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse-{{$aux}}" class="accordion-collapse collapse ps-2" aria-labelledby="flush-heading-{{$aux}}" data-bs-parent="#accordionFlushSpects">
                                        @foreach ($caracteristica['especificaciones'] as $spect)
                                        <div class="form-check col-12 pt-1 pb-1">
                                            <input class="form-check-input check-categorias border-color-empresa-uno submit-filtros" type="checkbox" name="filtro[caracteristicas][]" value="{{$spect->caracteristicaProducto}}">
                                            <label class="form-check-label lh-1" for="">
                                            <small class="">{{$spect->caracteristicaProducto}}</small>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            @php
                                $aux ++;
                            @endphp
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            <br>
      </div>
    </div>
</form>


