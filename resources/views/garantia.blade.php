@extends('layouts.app')

@section('title', 'Condiciones de garantía')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <h1 class="text-center">Terminos y Condiciones de garantía</h1>
        <div class="col-12"><h5 >CONDICIONES</h5></div>
        <div class="col-12">
            <ul style="text-align:justify">
            <li>
                El cliente deberá presentar su comprobante de compra (Factura/Boleta/Guía) donde se especifica el número de serie del producto. El cliente debe acreditar ser el titular de la compra mediante su respectivo documento de identidad.
            </li>
            <br>
            <li>
                Si usted tiene un producto en proceso de garantía y envía a recogerlo a un tercero, deberá enviar una carta poder simple donde autoriza que determinada persona lo va recoger, sus datos personales copia de DNI y deberá traer copia del DNI del titular de la compra, y si es persona jurídica firma y sello de gerencia. Todo esto para evitar un error de dar el producto a la persona incorrecta.
            </li>
            <br>
            <li>
                El producto no debe presentar signos de daño físico o deterioro. (rayones, pines doblados, alteración a software entre otros.) No se aceptarán cambios ni devoluciones por incompatibilidad con productos de otros proveedores, ni por errores de compra y/o preferencias.
            </li>
            <br>
            <li>
                Debe encontrarse dentro del periodo de garantía con {{$empresa->nombreComercial}} (36/12/6/3 meses a partir de la fecha de compra).
            </li>
            <br>
            <li>
                Si tenemos que hacer un cambio al producto tendrá que traer sus respectivos accesorios. con todas sus etiquetas, accesorios, empaques, repuestos, manuales, seguros, bolsas, entre otros. Todos estos mencionados en buen estado y sin señales de daño, deterioro.
            </li>
        </ul>
        </div>
      

        <div class="col-12"><h5 >GARANTIA PÁSANDO LOS 7 DIAS</h5></div>
        <div class="col-12">
            <p style="text-align:justify">
                Su equipo o accesorio pasara por un proceso de prueba y descarte para su solución. en un tiempo razonable haremos el cambio de su producto igual o parecido y de mejores características. o le emitiremos una nota de crédito lo cual puede usarlo para comprar cualquier producto de nuestra tienda valido por 12 meses.
            </p>
        </div>
        <div class="col-12"><h5 >NOTA DE CREDITO</h5></div>
        <div class="col-12">
            <p style="text-align:justify">
                Documento valor, emitido para canjear un producto en compra. emitimos este documento (nc) como devolución. es un documento válido para canjear otro producto. Tiempo de vigencia 12 meses. Para canjear su nota de crédito tiene que ser el titular si en caso envía canjear su nota de crédito a un tercero, deberá traer una carta poder simple donde autoriza que determinada persona lo va canjear, sus datos personales y copia de DNI y deberá traer copia del DNI del titular de la compra y si es persona jurídica, con firma y sello de gerencia. Todo esto para evitar un error de canje de nota de crédito a la persona incorrecta.
En ningún caso hacemos devolución de dinero por temas de garantía hasta haber cumplido todas las exigencias de ley
            </p>
        </div>
        <div class="col-12"><h5 >PARA TRAMITAR SU GARANTIA</h5></div>
        <div class="col-12">
            <ul style="text-align:justify">
                <li>
                    Deberá traer el producto a nuestra tienda (<a class="text-empresa-dos" href="{{$empresa->ubicacionLink}}">{{$empresa->ubicacion}}</a>), teniendo en cuenta las consideraciones correspondientes para la aplicación de la garantía. El producto debe estar en óptimas condiciones como fue entregado.
                </li>
                <br>
                <li>
                    De no contar con stock se le otorgará una NOTA DE CRÉDITO para que pueda adquirir otro producto de similares características o mejores en nuestro amplio catálogo de productos.
                </li>
                <br>
                <li>
                    El equipo o accesorio defectuoso será internado por {{$empresa->nombreComercial}}, este proceso de garantía tendrá un tiempo aproximado de entre 15 a 30 días hábiles.
                </li>
                <br>
                <li>
                    Pasado el tiempo de 15 a 30 días hábiles la garantía establecida por parte del proveedor se le otorgará un cambio similar o de mejores características de dicho producto, de no ser así se le brindará una nota de crédito el cual será usado desde el momento que se le entregue, este documento valor tiene vigencia de 12 meses.
                </li>
                <br>
                <li>
                    Para los tramites de productos vendidos a provincia, el cliente deberá escribirnos a nuestro 
                    @foreach($redes as $red)
                        @if($red->plataforma == 'Whatsapp')
                        <a class="text-success" href="{{$red->enlace}}">WhatsApp</a>
                        @break
                        @endif
                     @endforeach
                      para darle las indicaciones datos para que pueda enviarnos con una agencia de trasporte, el producto con su respectivo documento de compra.
                </li>
                <br>
                <li>
                    El cual lo recogeremos y tendrá el mismo proceso de garantía una ves solucionado lo enviaremos con una agencia de transporte indicado y coordinado con el cliente. el cliente asumirá la obligación de cubrir los gastos de envío y retorno de sus productos.
                </li>
            </ul>
        </div>
        <div class="col-12"><h5 >EXCLUSIONES DE GARANTÍA</h5></div>
        <div class="col-12">
            <ul style="text-align:justify">
                <li>
                    Cuando se encuentre fuera del período de garantía. Estos datos están en el documento de compra (factura o boleta guía de remisión).
                </li>
                <li>
                    Cuando se evidencie daño tales como golpes accidentales o intencionales, rayaduras, daño eléctrico, quemaduras, contactos rotos o doblados (pines), cobre expuesto, óxido, salitre, corrosión, partes faltantes, sellos de garantía adulterados, etiquetas de series removidas o cualquier agente externo que pueda perjudicar el funcionamiento de los componentes electrónicos (líquidos, insectos, residuos de animales, exceso de polvo por ausencia de mantenimiento, etc.).
                </li>
                <li>
                    Cuando sea utilizado en condiciones no recomendadas por el fabricante, (humedad, altura, temperatura). Para más información, consulte la documentación del fabricante del producto.
                </li>
                <li>
                    Cuando el equipo presente un funcionamiento distinto al esperado debido a configuraciones incorrectas en el software o ausencia de configuraciones, uso de aplicaciones no compatibles, actualizaciones del sistema y de las aplicaciones. Para más información, consulte la documentación del fabricante del producto sobre software compatible y su configuración.
                </li>
                <li>
                    Cuando haya existido algún intento anterior de reparación, fuera de nuestra área de garantía.
                </li>
                <li>
                    Cuando la falla se debe al uso de accesorios, cargadores o consumibles que no sean compatibles.
                </li>
                <li>
                    Se realiza instalaciones de sistemas operativos y aplicaciones únicamente con fines de control de calidad y/o demostración del buen funcionamiento y compatibilidad del hardware que conforma el equipo. Por lo tanto, el cliente debe borrar este tipo de software o adquirir las licencias respectivas. La garantía no cubre fallas o errores de software, (sistemas operativos y aplicaciones) por ser muy vulnerables y maniobrables.
                </li>
            </ul>
        </div>
    </div>
    <br>
</div>
@endsection