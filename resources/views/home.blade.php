@extends('layouts.app')


@section('content')
{{-- ---------------------------------------BANNERS SOLO A 1920 * 740p--------------------------------------- --}}
<br>
<br>
<div class="container" >
  <div class="row">
    <div id="corruselHome" class="carousel slide w-100" data-bs-ride="carousel">
      <div class="carousel-inner">
          @php $contador=0 @endphp
          @foreach($banners->where('tipoPublicidad','BANNER') as $banner)
            @if($contador == 0)
                <div class="carousel-item active">
                  <img src="{{asset('storage/'.$banner->imagenPublicidad)}}" alt="" width="90% " height="10%" class="rounded-3 d-block w-100" >
                </div>
                @php $contador++;  @endphp
            @else
                <div class="carousel-item">
                  <img src="{{asset('storage/'.$banner->imagenPublicidad)}}" alt="" width="90% " height="10%" class="rounded-3 d-block w-100" >
                </div>
                @php $contador++;  @endphp
            @endif
          @endforeach
      </div>
    </div>
  </div>
  <div class="row pt-2 text-center">
      <div class="col-12">
          @php $contador=0 @endphp
          @foreach($banners->where('tipoPublicidad','BANNER') as $banner)
            @if($contador == 0)
                <button type="button" data-bs-target="#corruselHome" data-bs-slide-to="{{$contador}}" class="btn letters active" aria-current="true" aria-label="Slide {{$contador + 1}}"> <i class="bi bi-circle-fill"></i></button>
                @php $contador++;  @endphp
            @else
                <button type="button" data-bs-target="#corruselHome" data-bs-slide-to="{{$contador}}" class="btn letters" aria-label="Slide {{$contador + 1}}"><i class="bi bi-circle-fill"></i></button>
                @php $contador++;  @endphp
            @endif
          @endforeach
      </div>
  </div>
  <br>
  <br>
  <div class="row" >
    <div class="col-12">
        <x-slider_medio :producto="$monitores" :empre="$empresa" :cambio="$tipoCambio" :titulo="'Monitores'" :slideMedio="5" :slideSmall="8" :link="route('categoria', ['monitores', 'monitor-fhd'])"/>
    </div>
 </div>
  <br>
  <br>
  <div class="row " >
      <div class="col-12 col-md-3 ">
          <div class="text-center">
            <img src="{{asset('storage/'.$banners->where('descripcionPublicidad','Banner vertical 2')->first()->imagenPublicidad)}}" alt="" width="80% "class="rounded-3 border shadow" >
          </div>
      </div>
      <div class="col-12 col-md-9">
          <h2>Productos Exclusivos</h2>
      </div>
  </div>
  <br>
  <br>
  @if(!empty($banners->where('descripcionPublicidad','Banner campania 1')->first()->imagenPublicidad))
  <div class="row">
      <img src="{{asset('storage/'.$banners->where('descripcionPublicidad','Banner campania 1')->first()->imagenPublicidad)}}" alt="" class="rounded-3 border shadow" >
  </div>
  @endif
  <br>
  <br>
 <div class="row" >
    <div class="col-12">
        <x-slider_medio :producto="$impresoras" :empre="$empresa" :cambio="$tipoCambio" :titulo="'Impresoras'" :slideMedio="5" :slideSmall="8" :link="route('categoria', ['impresoras','impresora-tinta'])"/>
    </div>
 </div>
  <br>
  <div class="row" >
      <div class="col-12 col-md-9">
          <h2>Accesorios</h2>
      </div>
      <div class="col-12 col-md-3">
          <div class="text-center">
            <img src="{{asset('storage/'.$banners->where('descripcionPublicidad','Banner vertical 1')->first()->imagenPublicidad)}}" alt="" width="80% " class="rounded-3 border shadow" >
          </div>
      </div>
  </div>
  <br>
    
 <div class="row">
     <div class="col-12">
         <x-slider_medio :producto="$lapGamer" :empre="$empresa" :cambio="$tipoCambio" :titulo="'Laptops Gamer'" :slideMedio="5" :slideSmall="8" :link="route('categoria', ['laptops','laptop-gamer'])"/>
     </div>
 </div>
 <br>
<br>
    <x-carrusel_marcas :marcas="$marcas->shuffle()"/>
<br>
<br>
</div>
<script>
      document.getElementById('corruselHome').addEventListener('slide.bs.carousel', function (e) {
            var activeIndex = Array.from(e.target.querySelectorAll('.carousel-item')).indexOf(e.relatedTarget);
            var buttons = document.querySelectorAll('.letters');
            buttons.forEach(function (button, index) {
                if (index === activeIndex) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });
        });
</script>

@endsection