
<div class="filtro_medio">
    <script src="{{ route('js.filter-scripts') }}"></script>
    <form action="{{ url()->current() }}" method="GET" >
        <div class="container pe-0 ms-0 me-0">
            <div class="row" style="height: 4.5rem"></div>
            <div class="row ps-2 pe-2 pb-3 pt-3 border-empresa-uno rounded" >
                <div class="col-12">
                    <div class="row">
                        <h5 class="ms-0 ps-0">Filtros:</h5>
                    </div>
                    <div class="row ps-0" >
                            <h6 class="ms-0 ps-0">Disponibilidad:</h6>
                    </div>
                    <div class="row" style="z-index: 1000">
                        @foreach ($filtros['disponibilidad'] as $dispo)
                            <div class="col-12 ps-0 pe-1">
                                <div class="form-check text-truncate">
                                    <input class="form-check-input border-color-empresa-uno" type="checkbox"  value="{{$dispo}}" name="filtro[dispo][]" id="">
                                    <label class="form-check-label">
                                    <small>{{$dispo}}</small>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        
                        
                    </div>
                    <div class="row" >
                        <h6 class="ms-0 ps-0">Marca:</h6>
                    </div>
                    <div class="row">
                        @foreach ($filtros['marcas'] as $marca)
                        <div class="form-check col-6">
                            <input class="form-check-input check-marcas border-color-empresa-uno" type="checkbox" name="filtro[marcas][]" value="{{$marca->idMarca}}">
                            <label class="form-check-label">
                              <small>{{$marca->nombreMarca}}</small>
                            </label>
                          </div>
                        @endforeach
                    </div>
                    <div class="row pt-2" >
                        <h6 class="ms-0 ps-0">Tipo:</h6>
                    </div>
                    <div class="row">
                        @foreach ($filtros['tipos'] as $tipo)
                            <div class="form-check col-6">
                                <input class="form-check-input check-categorias border-color-empresa-uno" type="checkbox" name="filtro[grupos][]" value="{{$tipo->idTipoProducto}}">
                                <label class="form-check-label lh-1" for="">
                                <small class="">{{$tipo->tipoProducto}}</small>
                                </label>
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="row pt-2" >
                        <h6 class="ms-0 ps-0">Categoria:</h6>
                    </div>
                    <div class="row">
                        @foreach ($filtros['categorias'] as $categoria)
                            <div class="form-check col-6">
                                <input class="form-check-input check-categorias border-color-empresa-uno" type="checkbox" name="filtro[grupos][]" value="{{$categoria->idCategoria}}">
                                <label class="form-check-label lh-1" for="">
                                <small class="">{{$categoria->nombreCategoria}}</small>
                                </label>
                            </div>
                        @endforeach
                        
                    </div>
                    <div class="row pt-2" >
                        <h6 class="ms-0 ps-0">Precio:</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 ps-0">
                            <label class="form-label">Minimo ({{$filtros['precioMin'].'0'}}):</label>
                            <input type="number" class="form-control" value="0" min="{{$filtros['precioMin']}}" name="">
                        </div>
                        <div class="col-12 ps-0">
                            <label class="form-label">Maximo ({{$filtros['precioMax'].'0'}}):</label>
                            <input type="number" class="form-control" value="0" max="{{$filtros['precioMax']}}">
                        </div>
                    </div>
                    <div class="row pt-2" >
                        <h6 class="ms-0 ps-0">Especificaciones:</h6>
                    </div>
                    <div class="row">
                        <div class="accordion accordion-flush ps-0 pe-0 border" id="accordionFlushSpects">
                            @php
                                $cont = 0;
                            @endphp
                            @foreach ($filtros['caracteristicas'] as $caracteristica)
                                @if($caracteristica['tipo'] == 'FILTRO')
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading-{{$cont}}">
                                        <button class="accordion-button collapsed pt-2 pb-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$cont}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                             <small class="fw-bold">{{$caracteristica['nombre']}}</small>
                                        </button>
                                    </h2>
                                    <div id="flush-collapse-{{$cont}}" class="accordion-collapse collapse ps-2" aria-labelledby="flush-heading-{{$cont}}" data-bs-parent="#accordionFlushSpects">
                                        @foreach ($caracteristica['especificaciones'] as $spect)
                                        <div class="form-check col-12 pt-1 pb-1">
                                            <input class="form-check-input check-categorias border-color-empresa-uno" type="checkbox" name="filtro[caracteristicas][]" value="{{$spect->caracteristicaProducto}}">
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
                    </div>
                    <br>
                    <div class="row">
                        <button type="submit" class="btn bg-empresa-uno text-empresa-tres empresa-hover" id="filtro-general">Filtrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
</div>
