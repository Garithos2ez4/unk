@extends('layouts.app')

@section('title', 'Medios de pago')

@section('content')
<div class="container">
    @php
    $bcpBanc = '';
    $scotiaBanc = '';
    $interBanc = '';
    $bbvabanc = '';
    $bcpInter = '';
    $scotiaInter = '';
    $interInter = '';
    $bbvaInter = '';
    $nacion = '';
    @endphp
    
    @foreach($bancarias as $banc)
        @switch($banc->idBanco)
            @case(1)
                @php  $bcpBanc = $banc->numeroCuenta; @endphp
                @break
            @case(2)
                @php  $scotiaBanc = $banc->numeroCuenta; @endphp
                @break
            @case(3)
                @php  $bbvabanc = $banc->numeroCuenta; @endphp
                @break
            @case(4)
                @php  $interBanc = $banc->numeroCuenta; @endphp
                @break
            @case(5)
                @php  $nacion = $banc->numeroCuenta; @endphp
                @break
            @default
                @php
                $bcpBanc = '';
                $scotiaBanc = '';
                $interBanc = '';
                $bbvabanc = '';
                $nacion = '';
                @endphp
        @endswitch
    @endforeach
    
    @foreach($inter as $inte)
        @switch($inte->idBanco)
            @case(1)
                @php  $bcpInter = $inte->numeroCuenta; @endphp
                @break
            @case(2)
                @php  $scotiaInter = $inte->numeroCuenta; @endphp
                @break
            @case(3)
                @php  $bbvaInter = $inte->numeroCuenta; @endphp
                @break
            @case(4)
                @php  $interInter = $inte->numeroCuenta; @endphp
                @break
            @default
                @php
                $bcpInter = '';
                $scotiaInter = '';
                $bbvaInter = '';
                $interInter = '';
                @endphp
        @endswitch
    @endforeach
    <div class="row d-block d-sm-none background-mediodepago" style="height:600px">
        <div class="col-12" >
            <div class="row">
                <div class="col-12" style="height:124px"></div>
                <div class="col-12" style="height:84px">
                    <div class="row h-100 d-flex justify-content-center align-items-center">
                        <div class="h-100" style="width:318px;margin-left:8px">
                            <div class="row h-100 d-flex justify-content-left align-items-center">
                                <div style="width:136px;font-size:10px" class="text-center text-light h-100 ">
                                    <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                    <p style="margin-top:0px;margin-bottom:0px">Soles:{{$bbvabanc}}</p>
                                </div>
                                <div style="width:46px" class="h-100"></div>
                                <div style="width:134px;font-size:10px" class="text-center text-light h-100">
                                    <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                    <p style="margin-top:0px;margin-bottom:0px">Soles:{{$bcpBanc}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="height:80px"></div>
                <div class="col-12" style="height:85px">
                    <div class="row h-100 d-flex justify-content-center align-items-center">
                        <div class="h-100" style="width:320px;margin-left:4px">
                            <div class="row h-100 d-flex justify-content-left align-items-center">
                                <div style="width:137px;font-size:10px" class="text-center text-light h-100">
                                    <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                    <p style="margin-top:0px;margin-bottom:0px">Soles:{{$scotiaBanc}}</p>
                                </div>
                                <div style="width:48px" class="h-100"></div>
                                <div style="width:135px;font-size:10px" class="text-center text-light h-100">
                                    <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                    <p style="margin-top:0px;margin-bottom:0px">Soles:{{$interBanc}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="height:54px"></div>
                <div class="col-12" style="height:90px">
                    <div class="row h-100 d-flex justify-content-center align-items-center">
                        <div class="h-100 text-center text-light" style="width:300px">
                            <div class="ms-2" style="font-size:10px">
                                <p style="margin-top:0px;margin-bottom:0px" class="fw-bold">BANCO DE LA NACIÓN</p>
                                <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                <p style="margin-top:0px;margin-bottom:0px">Soles:{{$nacion}}</p>
                                <p style="margin-top:0px;margin-bottom:0px;line-height: 1;">En la cuenta del Banco DE LA NACION puede depositar por Agente(montos hasta 499 soles sin recargo, si el monto es mayor puede abonar en partes) o hacer transferencia electrónica, por Ventanilla (consultar costo extra comisión al momento de depositar)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none d-sm-block background-mediodepago" style="height:1000px">
        <div class="row">
            <div class="col-12" style="height:196px"></div>
            <div class="col-12" style="height:155px">
                <div class="row h-100 d-flex justify-content-center align-items-center">
                    <div class="h-100" style="width:528px;margin-left:36px">
                        <div class="row h-100 d-flex justify-content-left align-items-center">
                            <div style="width:226px" class="text-center text-light h-100 ">
                                <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                <p style="margin-top:0px;margin-bottom:0px">Soles:{{$bbvabanc}}</p>
                            </div>
                            <div style="width:77px" class="h-100"></div>
                            <div style="width:223px" class="text-center text-light h-100">
                                <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                <p style="margin-top:0px;margin-bottom:0px">Soles:{{$bcpBanc}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" style="height:125px"></div>
            <div class="col-12" style="height:155px">
                <div class="row h-100 d-flex justify-content-center align-items-center">
                    <div class="h-100" style="width:534px;margin-left:32px">
                        <div class="row h-100 d-flex justify-content-left align-items-center">
                            <div style="width:226px" class="text-center text-light h-100">
                                <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                <p style="margin-top:0px;margin-bottom:0px">Soles:{{$scotiaBanc}}</p>
                            </div>
                            <div style="width:82px" class="h-100"></div>
                            <div style="width:224px" class="text-center text-light h-100">
                                <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                                <p style="margin-top:0px;margin-bottom:0px">Soles:{{$interBanc}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" style="height:85px"></div>
            <div class="col-12" style="height:155px">
                <div class="row h-100 d-flex justify-content-center align-items-center">
                    <div class="h-100 text-center text-light" style="width:575px">
                        <div class="ms-5">
                            <p style="margin-top:0px;margin-bottom:0px" class="fw-bold">BANCO DE LA NACIÓN</p>
                            <p style="margin-top:0px;margin-bottom:0px">Cuenta bancaria</p>
                            <p style="margin-top:0px;margin-bottom:0px">Soles:{{$nacion}}</p>
                            <p style="margin-top:0px;margin-bottom:0px;line-height: 1;">En la cuenta del Banco DE LA NACION puede depositar por Agente(montos hasta 499 soles sin recargo, si el monto es mayor puede abonar en partes) o hacer transferencia electrónica, por Ventanilla (consultar costo extra comisión al momento de depositar)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection