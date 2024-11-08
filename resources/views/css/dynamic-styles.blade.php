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

.group-selected{
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
    color:{{$empresa->colorUno}} !important;
}

.text-empresa-dos{
    color:{{$empresa->colorDos}} !important;
}

.text-empresa-tres{
    color:{{$empresa->colorTres}} !important;
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

.link-select {
    appearance: none; /* Quitar estilo predeterminado */
    background: none;
    border: none;
    color: #007bff; /* Color similar a enlaces */
    font-size: 1rem; /* Ajusta según tus necesidades */
    cursor: pointer; /* Cambia el cursor a puntero */
    text-decoration: underline; /* Simula un enlace subrayado */
}

.link-select:focus {
    outline: none; /* Quita el borde de enfoque */
}

/* Estilo para el borde del select cuando está enfocado */ 
.form-select:focus { 
    border-color: {{$empresa->colorDos}}; /* Cambia el color del borde al enfocar */ 
    box-shadow: {{$empresa->colorDos}}; /* Añade una sombra al enfocar */ 
} 

.form-select option:hover { 
    background-color: {{$empresa->colorDos}} !important; /* Cambia el color de fondo al pasar sobre las opciones */
    color: {{$empresa->colorTres}}; /* Cambia el color del texto al pasar sobre las opciones */ 
}

.img-vertical{
    width: 80%;
    height: auto;
}

@media (min-width:768px){
    .img-vertical{
        width: 100%;
        height: auto;
    }
}

.text-hidden{
    color: {{$empresa->colorTres}};
    opacity: 0.05;
}

/* Estilo de los botones del acordeón (los que abren y cierran los ítems) */
{{-- .accordion-button {
    background-color: {{$empresa->colorDos}};  /* Fondo azul */
    color: white;               /* Color de texto blanco */
    font-weight: bold;          /* Texto en negrita */
    border-radius: 5px;         /* Bordes redondeados */
} --}}

/* Estilo cuando el botón del acordeón está activo (cuando está abierto) */
.accordion-button:not(.collapsed) {
    background-color: {{$empresa->colorTres}};  /* Fondo más oscuro cuando está abierto */
    color: #ffffff;             /* Texto blanco */
    box-shadow: 0; /* Sombra suave */
}
