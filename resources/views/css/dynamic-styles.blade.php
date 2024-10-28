/* resources/views/css/dynamic-styles.blade.php */

body {
    background-color: #f8f9fa;
}
.bg-body{
    background-color: #f8f9fa !important;
}

.group-hover:hover{
    border:0.5px solid {{$empresa->colorDos}}!important;
}


#loader {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: {{$empresa->colorTres}};
        display: flex;
        justify-content: center;
        align-items: center;
    }
.dropdown-menu .dropdown-item:focus,
.dropdown-menu .dropdown-item:active {
    background-color: black !important;
    color: white !important;
}
html, body {
height: 100%;
}
.content {
  flex: 1;
}
.wrapper {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
.productimg:hover{
    filter: contrast(50%);
}

.letters:hover{
    color:{{$empresa->colorDos}};
}
.letters.active {
    color: {{$empresa->colorDos}}; 
}

.form-check-input:checked {
    background-color: {{$empresa->colorUno}};
  }
  
.retract{
    display:none;
}

.bg-opacity{
    opacity:0.5 ;
}

.text-empresa-uno{
    color:{{$empresa->colorUno}};
}

.text-empresa-dos{
    color:{{$empresa->colorDos}};
}

.text-empresa-tres{
    color:{{$empresa->colorTres}};
}

.text-agotado{
    color: #a30048;
}

.text-oferta{
    color: #eb0000;
}

.text-exclusivo{
    color: #e5b100;
}

.bg-empresa-uno{
    background-color:{{$empresa->colorUno}};
}

.bg-empresa-dos{
    background-color:{{$empresa->colorDos}};
}

.bg-empresa-tres{
    background-color:{{$empresa->colorTres}};
}

.border-empresa-uno{
    border: 1px solid {{$empresa->colorUno}};
}
.border-empresa-dos{
    border: 1px solid {{$empresa->colorDos}};
}

.border-empresa-tres{
    border: 1px solid {{$empresa->colorTres}};
}

.border-color-empresa-uno{
    border-color:{{$empresa->colorUno}} !important;
}

.border-color-empresa-dos{
    border-color:{{$empresa->colorDos}} !important;
}

.border-color-empresa-tres{
    border-color:{{$empresa->colorTres}} !important;
}

.product-hover:hover{
    color:gray;
}

.hover-dark:hover{
    color:gray;
}

.truncar-tres-lineas {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.truncar-one-lineas {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.custom-pagination .page-item .page-link:hover {
    color: {{$empresa->colorTres}};
    background-color: {{$empresa->colorUno}};
    
}

.custom-pagination .page-item.active .page-link {
    z-index: 1;
    color: {{$empresa->colorDos}};
    background-color: {{$empresa->colorTres}};
    border-color: {{$empresa->colorDos}};
}

.custom-pagination .page-item .page-link:focus {
    box-shadow: none;
    outline: none;
}

.custom-pagination .page-item .page-link:active {
    background-color:{{$empresa->colorDos}} !important;
    border-color:{{$empresa->colorDos}} !important;
}

.fs-card-text {
 font-size:80%;   
}

.btn:focus {
    outline: none !important;
    box-shadow: none !important;
}


.form-check-input:focus {
    outline: none !important;
    box-shadow: none !important;
}

 input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none; /* Eliminar estilos predeterminados de Safari */
    appearance: none; /* Eliminar estilos predeterminados */
    width: 20px;
    height: 20px; 
    background-color: {{$empresa->colorUno}};
    border: 2px solid {{$empresa->colorUno}}; 
    border-radius: 50%;
    cursor: pointer;
}

.no-border {
    border: none;
    box-shadow: none;
}

.empresa-hover:hover{
    background-color:{{$empresa->colorDos}};
    color:{{$empresa->colorTres}};
}

.enlace-hover:hover{
    text-decoration: underline !important;
}

.listener-hover {
    position: relative;
}

.listener-hover::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(211, 211, 211, 0.5); /* Gris claro con 50% de opacidad */
    z-index: 1;
    opacity: 0; /* Inicialmente invisible */
    transition: opacity 0.3s; /* Transición suave */
}

.listener-hover:hover::before {
    opacity: 1; /* Asegura que el pseudo-elemento sea visible al hacer hover */
}

.sticky-div {
    z-index: 1000;
    background-color: {{$empresa->colorTres}};
    position: -webkit-sticky; /* Para compatibilidad con Safari */
    position: sticky;
    top: 0;
}

.background-mediodepago {
    background-image: url('{{ asset('storage/cuentasbancarias.jpg') }}');
    background-size: contain; /* Ajusta la imagen al alto y ancho del contenedor */
    background-position: center; /* Centra la imagen */
    background-repeat: no-repeat; /* No repite la imagen */
}

.overlay {
    position: relative;
    z-index: 1; /* Asegura que los elementos estén encima del fondo */
    width: 100%;
    height: 100%;
}

.form-select:focus {
    box-shadow: none; /* Elimina la sombra del borde */
    outline: none; /* Elimina el contorno */
}

.form-control:focus {
    border-color: gray; /* Elimina el color del borde */
    box-shadow: none; /* Elimina la sombra del borde */
    outline: none; /* Elimina el contorno */
}
