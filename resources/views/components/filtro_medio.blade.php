
<div class="filtro_medio">
    <script src="{{ route('js.filter-scripts') }}"></script>
    <form action="{{ url()->current() }}" method="GET" >
    <div class="row ps-2 pe-2 pb-3 pt-3 border-empresa-uno rounded" >
        <div class="col-12">
            <div class="row">
                <h5 class="ms-0 ps-0">Filtros:</h5>
            </div>
            <div class="row ps-0" >
                    <h6 class="ms-0 ps-0">Disponibilidad:</h6>
            </div>
            <div class="row">
                <div class="col-6 ps-0 pe-1">
                    <div class="form-check">
                        <input class="form-check-input border-color-empresa-uno check-todos-dispo" onchange="habiliteChecks(this,'dispo')" type="checkbox" value="true" name="validatedispo" id="">
                        <label class="form-check-label">
                        <small><strong>Todos</strong></small>
                        </label>
                    </div>
                </div>
                @foreach($parametrosFillMedio['disponibilidades'] as $pdispo)
                <div class="col-6 ps-0 pe-1">
                    <div class="form-check text-truncate">
                    <input class="form-check-input border-color-empresa-uno check-dispo" type="checkbox"  value="{{$pdispo}}" name="filtro[dispo][]" id="">
                    <label class="form-check-label  ">
                    <small class="text-lowercase">{{$pdispo}}</small>
                    </label>
                </div>
                </div>
                
                @endforeach
            </div>
            @if($pagina != 'marca')
            <div class="row" >
                <h6 class="ms-0 ps-0">Marca:</h6>
            </div>
            <div class="row">
                <div class="form-check col-6">
                    <input class="form-check-input border-color-empresa-uno check-todos-marca" type="checkbox" onchange="habiliteChecks(this,'marca')" value="true" name="validatemarca" id="">
                    <label class="form-check-label">
                    <small><strong>Todos</strong></small>
                    </label>
                </div>
                @foreach($parametrosFillMedio['marcas'] as $idpmarcas => $pmarcas)
                <div class="form-check col-6">
                  <input class="form-check-input check-marcas border-color-empresa-uno check-marca" type="checkbox" name="filtro[marcas][]" value="{{$idpmarcas}}">
                  <label class="form-check-label">
                    <small>{{$pmarcas}}</small>
                  </label>
                </div>
                @endforeach
            </div>
            @endif
            @if($pagina != 'categoria' && $pagina != 'tipo')
            <div class="row pt-2" >
                <h6 class="ms-0 ps-0">Categorias:</h6>
            </div>
            <div class="row">
                <div class="form-check col-6">
                    <input class="form-check-input border-color-empresa-uno check-todos-grupo" type="checkbox" onchange="habiliteChecks(this,'grupo')" value="true" name="validategrupo" id="">
                    <label class="form-check-label">
                    <small><strong>Todos</strong></small>
                    </label>
                </div>
                @foreach($parametrosFillMedio['grupos'] as $idpgrupo => $pgrupo)
                <div class="form-check col-6">
                  <input class="form-check-input check-categorias border-color-empresa-uno check-grupo" type="checkbox" name="filtro[grupos][]" value="{{$idpgrupo}}">
                  <label class="form-check-label lh-1" for="">
                    <small class="">{{$pgrupo}}</small>
                  </label>
                </div>
                @endforeach
            </div>
            @endif
            <br>
            <div class="row">
                <button type="submit" class="btn bg-empresa-uno text-empresa-tres empresa-hover" id="filtro-general">Filtrar</button>
            </div>
        </div>
    </div>
    </form>
    <br>
</div>
