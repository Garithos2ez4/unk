@extends('layouts.app')

@section('content')
    @if(count($productos) == 0)
    
    <div class="container align-middle" style="height:50vh">
        <div class="row" style="height:20vh">
        </div>
        <x-aviso_no_encontrado :nameProduct="$obt" />
    </div>
    @else
    <br>
    <br>
    <div class="container ">
        <div class="row">
             <div class="col-md-2 d-none d-sm-block" >
                <div class="row" style="height:3rem">
                </div>
                <x-filtro_medio :pagina="'buscar'" :parametrosFillMedio="$parametrosFiltro" :totalProductsMedio="count($productos)"/>
            </div>
            <div class="col-md-10 d-none d-md-flex">
                <x-card_producto_medio :storage="$productos" :colsmall="6" :colmedio="3" :empres="$empresa" :dolar="$tipoCambio" :cantCards="24"/>
            </div>
            <div class="col-12 d-block d-sm-none sticky-div" >
                <x-filtro_small :empresaFillSmall="$empresa" :pagina="'buscar'" :parametrosFillSmall="$parametrosFiltro"  :totalProductsSmall="count($productos)" :paginaFillSmall="'categoria'"/>
            </div>
            <div class="col-12 d-flex d-sm-none">
                <x-card_producto_small :selectedProducts="$productos" :colsmall="6" :colmedio="3" :empres="$empresa" :dolar="$tipoCambio"/>
            </div>
        </div>
        <br>
        <x-carrusel_marcas :marcas="$marcas->shuffle()"/>
    </div>
    <br>
    <br>
    @endif
@endsection