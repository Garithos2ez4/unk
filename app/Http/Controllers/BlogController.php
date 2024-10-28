<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
// llamar a los models: use App\Models\CategoriaProducto;

class BlogController extends Controller
{
    public function index(){
        //Variables propias del controlador
        
        //Variables para el header,nav y footer
        $header = new HeaderService();
        $categorias = $header->obtenerCategorias();
        $empresa = $header->obtenerEmpresa();
        $marcas = $header->obtenerMarcas();
        $tipos = $header->obtenerTipo();
        $redes = $header->obtenerLinkRedes();
        $tipoCambio = $header->obtenerCambioDolar();
        
        return view('blog',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio
]);
    }
}