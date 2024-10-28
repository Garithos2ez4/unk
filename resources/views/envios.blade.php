@extends('layouts.app')

@section('title', 'Formas de envío')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row d-flex">
        <div class="col-md-2"></div>
        <div class="col-12 col-md-8 text-center">
            <img src="{{asset('storage/enviovertical.png')}}" alt="Envios" width="80%" class="rounded-3">
            <img src="{{asset('storage/enviobanner.png')}}" alt="Envios" width="80%" class="rounded-3">
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>
    <br>
</div>
@endsection