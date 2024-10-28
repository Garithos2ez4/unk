@extends('layouts.app')

@section('title', 'Libro de Reclamaciones')

@section('content')
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <form action="{{route('insertreclamo')}}" id="form-new-reclamo"  method="POST">
        @csrf
<div class="container">
    <br>
    <div class="row">
        <h2>Libro de Reclamaciones:</h2>
    </div>
    <br>
    <div class="row border shadow-sm pt-3 pb-3 rounded-3 ps-4 pe-4">
        <div class="col-md-12 mb-3">
            <h4>1) Datos del solicitante</h4>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-3">
                    <label class="fw-bold">Tipo de documento:</label>
                    <select class="form-select rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent" name="reclamo[tipodocumento]">
                        <option>DNI</option>
                        <option>Carn&eacute de extranjeria</option>
                    </select>
                </div>
                <div class="col-md-9">
                    <label class="fw-bold">Numero de documento:</label>
                    <input type="text" name="reclamo[numerodocumento]" maxlength="8" placeholder="12345678" value="" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="fw-bold">Primer Nombre:</label>
                    <input type="text" name="reclamo[primernombre]" maxlength="50" placeholder="Pablo" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Segundo Nombre:</label>
                    <input type="text" name="reclamo[segundonombre]" maxlength="50" placeholder="Emilio" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent">
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="fw-bold">Apellido Paterno:</label>
                    <input type="text" name="reclamo[apellidopaterno]" maxlength="50" placeholder="Escobar" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Apellido Materno:</label>
                    <input type="text" name="reclamo[apellidomaterno]" maxlength="50" placeholder="Huaman" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <label class="fw-bold">Direcci&oacuten:</label>
                    <input type="text" maxlength="100" name="reclamo[direccion]" placeholder="Av. Con Nombre, Distrito, Provincia." class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label class="fw-bold">Numero de Tel&eacutefono:</label>
                    <input type="text" placeholder="987654321" name="reclamo[telefono]" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="9" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-8 mt-3">
                    <label class="fw-bold">Correo Electr&oacutenico:</label>
                    <br>
                    <small class="text-secondary">Por favor ingresa tu correo electr&oacutenico para poder notificar el comprobante de tu reclamo</small>
                    <input type="email" placeholder="miemail@ejemplo.com" name="reclamo[correo]" maxlength="50" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div clas="col-md-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="1" id="check-edad">
                      <label class="form-check-label">
                        Menor de edad
                      </label>
                    </div>
                </div>
                <div class="col-md-12" id="form-apoderado">
                    <label class="fw-bold">Nombre completo del apoderado:</label>
                    <input type="text" placeholder="Karen Emily Gutierrez Margot" name="reclamo[apoderado]" value="" maxlength="100" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row border shadow-sm pt-3 pb-3 rounded-3 ps-4 pe-4">
        <div class="col-md-12 mb-3">
            <h4>2) Informacion del Producto</h4>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <label class="fw-bold">Producto:</label>
                    <input type="text" placeholder="Titulo del producto" maxlength="50" name="reclamo[producto]" class="form-control rounded-0 border-top-0 border-start-0 border-end-0 bg-transparent form-reclamo">
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <label class="fw-bold">Detalle del Producto:</label>
                    <textarea maxlength="1000" placeholder="Escribe aqui" name="reclamo[detalleproducto]" class="form-control form-reclamo"></textarea>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row border shadow-sm pt-3 pb-3 rounded-3 ps-4 pe-4">
        <div class="col-md-12 mb-3">
            <h4>3) Detalle del reclamo</h4>
        </div>
        <div class="col-md-12 mb-3 d-flex">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="reclamo[checkreclamo]" value="Reclamo" id="check-reclamo" checked>
              <label class="form-check-label  me-3" >Reclamo</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="reclamo[checkqueja]" value="Queja" id="check-queja">
              <label class="form-check-label" >Queja</label>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <label class="fw-bold">Detalle del Reclamo:</label>
                    <textarea placeholder="Escribe aqui" maxlength="1000" name="reclamo[detallereclamo]" class="form-control form-reclamo"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-check">
              <input class="form-check-input check-politicas" type="checkbox" value="" id="">
              <label class="form-check-label" >Declaro que los datos consignados son correctos y veridicos.</label>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-check">
              <input class="form-check-input check-politicas" type="checkbox" value="" id="">
              <label class="form-check-label" >Declaro haber leído y acepto la <a href="{{route('privacidad')}}" class="text-empresa-dos letters">Pol&iacutetica de Privacidad.</a></label>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.api_site_key')}}"></div>
        </div>
        <div class="col-md-12 mb-3 text-center">
            <button type="submit" class="btn btn-secondary rounded-0 empresa-hover w-25" id="btn-reclamo">Enviar</button>
        </div>
    </div>
    <br>
</div>
</form>
 <script src="{{ route('js.reclamos-scripts') }}"></script>

@endsection