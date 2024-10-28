<div class="carrusel_marcas">
    <link rel="stylesheet" href="{{ route('css.carrusel-marcas-styles') }}">
    <script src="{{ route('js.carrusel-marcas-scripts') }}"></script>
    <div class="row">
        <div class="row slider-container">
            <div class="slider-content">
                    @foreach($marcas as $marca)
                        <div class="col-4 col-md-2 slider-item">
                            <img src="{{asset('storage/'.$marca->imagenMarca)}}" alt="" width="100% " class="rounded-3 border" >
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>