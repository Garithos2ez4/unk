@extends('layouts.app')

@section('title', 'Sobre nosotros')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-3 col-md-2">
            <a href="#"><img src="{{asset('storage/'.$empresa->logo)}}" alt="{{$empresa->nombreComercial}}" width="100" height="100"></a>
        </div>
        <div class="col-9 col-md-6 text-end">
            <h2>NUESTRA EMPRESA</h2>
            <h2>{{$empresa->nombreComercial}}</h2>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align:justify">
            <div class="row">
                <p>Nos especializamos en la venta de una amplia gama de productos tecnológicos, desde monitores y laptops hasta componentes de computadora y accesorios.
                Nuestro compromiso es ofrecerte productos de alta calidad a precios competitivos, asegurando que siempre encuentres lo que necesitas para estar a la vanguardia en el mundo digital.</p>
        
                <p>En {{$empresa->nombreComercial}}, nos apasiona la tecnología y trabajamos incansablemente para brindarte las últimas innovaciones y los mejores productos del mercado.
                Nuestro equipo de expertos está dedicado a proporcionarte un servicio excepcional y asesoramiento especializado para que tomes las mejores decisiones de compra.</p>
        
                <p>Ya sea que seas un profesional de la tecnología, un gamer apasionado o simplemente busques mejorar tu setup, en {{$empresa->nombreComercial}} encontrarás todo lo necesario para llevar tu
                experiencia tecnológica al siguiente nivel. ¡Explora nuestra tienda y descubre todo lo que tenemos para ofrecerte!</p>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <h3 class="text-center">UBICANOS <i class="bi bi-geo-alt"></i></h3>
                    <img class="border shadow" src="{{asset('storage/ubicacion.webp')}}" alt="ubi" width="100%">
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-6 ">
                    <p>
                        Nos encontramos en Av. Bolivia 180 , SS127 (SEMISOTANO 127) - Cercado de Lima - Galería Wilson Plaza cerca al Real Plaza Centro Civico.
                    </p>
                    <p>
                        Bajando las escaleras en el semisotano al fondo a la derecha tienda 127 de la galeria WilsonPlaza.
                    </p>
                    <p>
                        Nuestro horario es de Lunes a Sábado de 9am a 7pm y los Domingos 1pm a 6pm (Consultar atención).
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img class="border shadow" src="{{asset('storage/semisotano.webp')}}" alt="ubi" width="100%">
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                    <h3 class="text-center">Misión <i class="bi bi-bullseye"></i></h3>
                    <p>
                        Nuestra misión es proporcionar soluciones tecnológicas innovadoras y accesibles que impulsen la eficiencia y creatividad de nuestros clientes.
                        Nos comprometemos a ofrecer productos de alta calidad, un servicio excepcional y asesoramiento experto para que cada cliente encuentre las herramientas perfectas para sus necesidades.
                        En {{$empresa->nombreComercial}}, trabajamos con dedicación para mantenernos a la vanguardia de la tecnología y contribuir al crecimiento y éxito de nuestros clientes.
                    </p>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Visión <i class="bi bi-eye"></i></h3>
                    <p>
                        Nuestra visión es ser reconocidos como líderes en la industria tecnológica, conocidos por nuestra pasión por la innovación y la excelencia en el servicio al cliente.
                        Aspiramos a ser la primera opción para quienes buscan soluciones tecnológicas de vanguardia, construyendo una comunidad de clientes satisfechos y leales.
                        En {{$empresa->nombreComercial}}, soñamos con un futuro donde la tecnología esté al alcance de todos y mejore la vida de las personas en todo el mundo.
                    </p>
                </div>
            </div>
            <div class="row text-center pt-4">
                <h4>AGRADECIMIENTO A TODOS NUESTROS CLIENTES</h4>
                <h5>Por depositar su confianza en nosotros para brindarle un servicio y equipos de calidad.</h5>
            </div>
            
        </div>
        <div class="col-2"></div>
    </div>
    <br>
    <br>
</div>
@endsection