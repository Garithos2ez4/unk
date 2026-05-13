<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
// llamar a los models: use App\Models\CategoriaProducto;

class BlogController extends Controller
{
    protected $headerService;

    public function __construct(HeaderService $headerService)
    {
        $this->headerService = $headerService;
    }

    public function index(){
        //Variables propias del controlador
        
        //Variables para el header,nav y footer
        $categorias = $this->headerService->obtenerCategorias();
        $empresa = $this->headerService->obtenerEmpresa();
        $marcas = $this->headerService->obtenerMarcas();
        $tipos = $this->headerService->obtenerTipo();
        $redes = $this->headerService->obtenerLinkRedes();
        $tipoCambio = $this->headerService->obtenerCambioDolar();
        
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