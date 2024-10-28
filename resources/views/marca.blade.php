@extends('layouts.app')

@section('title', $marca->nombreMarca)

@section('content')
<div class="container">
    <br>
    <div class="row text-center align-items-center d-flex">
        <div class="col-12 align-items-center">
            <h1 class="fw-bold">{{$marca->nombreMarca}}</h1>
            <img src="{{asset('storage/'.$marca->imagenMarca)}}" alt="Marca" height="50px" class="rounded-3">
        </div>
    </div>
    @if(count($productos) == 0)
        <div class="container align-middle" style="height:50vh">
            <div class="row" style="height:20vh">
            </div>
            <x-aviso_no_encontrado :nameProduct="''" />
        </div>
    @else
    <div class="row">
        <div class="col-md-2 d-none d-sm-block">
            <div class="row" style="height:3rem">
            </div>
            <x-filtro_medio :pagina="'marca'" :parametrosFillMedio="$parametrosFiltro" :totalProductsMedio="count($productos)" />
        </div>
        <div class="col-md-10  d-none d-md-flex">
            <x-card_producto_medio :storage="$productos" :colsmall="6" :colmedio="3" :empres="$empresa" :dolar="$tipoCambio" :cantCards="16"  />
        </div>
        <div class="col-12 d-block d-sm-none sticky-div" >
            <x-filtro_small :empresaFillSmall="$empresa" :pagina="'marca'" :parametrosFillSmall="$parametrosFiltro" :totalProductsSmall="count($productos)" :paginaFillSmall="'categoria'"/>
        </div>
        <div class="col-12 d-flex d-sm-none">
            <x-card_producto_small :selectedProducts="$productos" :colsmall="6" :colmedio="4" :empres="$empresa" :dolar="$tipoCambio"/>
        </div>
    </div>
    <br>
    <x-carrusel_marcas :marcas="$marcas->shuffle()"/>
    <br>
    <br>
    @endif
</div>

@endsection