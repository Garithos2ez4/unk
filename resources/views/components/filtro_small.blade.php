<div class="filtro_small">
    <script src="{{ route('js.filter-scripts') }}"></script>
    <div class="row align-items-start pt-2 pb-0 bg-body">
        <div class="col-8">
            <h6 class="pt-2 pb-2 fw-light" id="recountSmall">{{$totalProductsSmall}} productos encontrados</h6>
        </div>
        <div class="col-4 text-end">
             <button class="btn text-end" data-bs-toggle="offcanvas" href="#offcanvasFiltros" aria-controls="offcanvasRight">
            Filtros <i class="bi bi-funnel-fill"></i>
          </button>
        </div>
    </div>
   <form action="{{ url()->current() }}" method="GET" >
   <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasFiltros" aria-labelledby="offcanvasFiltrosLabel">
      <div class="offcanvas-header d-flex text-center bg-empresa-uno">
        <h5 class="offcanvas-title text-center text-empresa-tres" id="offcanvasFiltrosLabel">FILTROS</h5>
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body ">
            <div class="row  border-bottom pt-2 pb-2">
                    <button class="btn text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroDisp" aria-expanded="false" aria-controls="collapseExample">
                    Disponibilidad
                  </button>
                    <div class="collapse" id="collapseFiltroDisp">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input border-color-empresa-uno check-todos-dispo" onchange="habiliteChecks(this,'dispo')" type="checkbox" value="TODOS" name="" id="">
                                    <label class="form-check-label">
                                    <small><strong>Todos</strong></small>
                                    </label>
                                </div>
                            </div>
                            @foreach($parametrosFillSmall['disponibilidades'] as $pdispo)
                            <div class="col-6 text-truncate">
                                <div class="form-check">
                                    <input class="form-check-input border-color-empresa-uno check-dispo" type="checkbox" value="{{$pdispo}}" name="filtro[dispo][]">
                                    <label class="form-check-label">
                                    <small class="text-lowercase">{{$pdispo}}</small>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
            @if($pagina != 'marca')
            <div class="row border-bottom pt-2 pb-2">
                    <button class="btn text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroMarcas" aria-expanded="false" aria-controls="collapseExample">
                    Marcas
                  </button>
                  <div class="collapse" id="collapseFiltroMarcas">
                      <div class="row">
                          <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input border-color-empresa-uno check-todos-marca" type="checkbox" onchange="habiliteChecks(this,'marca')" value="TODOS" name="" id="">
                                    <label class="form-check-label">
                                    <small><strong>Todos</strong></small>
                                    </label>
                                </div>
                            </div>
                        @foreach($parametrosFillSmall['marcas'] as $idpmarcas => $pmarcas)
                        <div class="col-6">
                            <div class="form-check">
                              <input class="form-check-input border-color-empresa-uno check-marca" type="checkbox" value="{{$idpmarcas}}" name="filtro[marcas][]" value="{{$idpmarcas}}">
                              <label class="form-check-label" for="flexCheckChecked">
                                <small>{{$pmarcas}}</small>
                              </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if($pagina != 'categoria' && $pagina != 'tipo')
            <div class="row border-bottom pt-2 pb-2">
                <button class="btn text-end fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiltroCat" aria-expanded="false" aria-controls="collapseExample">
                Categorias
                </button>
                <div class="collapse" id="collapseFiltroCat">
                    <div class="row">
                        <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input border-color-empresa-uno check-todos-grupo" onchange="habiliteChecks(this,'grupo')" type="checkbox" value="TODOS" name="" id="">
                                    <label class="form-check-label">
                                    <small><strong>Todos</strong></small>
                                    </label>
                                </div>
                            </div>
                        @foreach($parametrosFillSmall['grupos'] as $idpgrupo => $pgrupo)
                        <div class="col-6">
                            <div class="form-check">
                              <input class="form-check-input border-color-empresa-uno check-grupo" type="checkbox" value="{{$idpgrupo}}" name="filtro[grupos][]" value="{{$idpgrupo}}">
                              <label class="form-check-label" for="flexCheckChecked">
                                <small>{{$pgrupo}}</small>
                              </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <br>
            <br>
            <div class="row">
                <button type="submit" class="btn bg-empresa-uno text-empresa-tres empresa-hover" id="filtro-general">Filtrar</button>
            </div>
      </div>
    </div>
    </form>
</div>