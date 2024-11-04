<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HeaderServiceInterface;
use App\Services\MarcaServiceInterface;
use App\Services\ProductoServiceInterface;

class MarcaController extends Controller
{
    protected $headerService;
    protected $marcaService;
    protected $productoService;

    public function __construct(HeaderServiceInterface $headerService,
                                MarcaServiceInterface $marcaService,
                                ProductoServiceInterface $productoService)
    {
        $this->headerService = $headerService;
        $this->marcaService =  $marcaService;
        $this->productoService = $productoService;
    }
    public function index($slug,Request $request){
        //Variables para el header,nav y footer
        $categorias = $this->headerService->obtenerCategorias();
        $empresa = $this->headerService->obtenerEmpresa();
        $marcas = $this->headerService->obtenerMarcas();
        $tipos = $this->headerService->obtenerTipo();
        $tipoCambio = $this->headerService->obtenerCambioDolar();
        
        //Variables propias del controlador
        $marca = $this->marcaService->getMarcaBySlug($slug);
        $productos = $this->productoService->getProductsFilter('idMarca',$marca->idMarca,24,$request);

        //Lista de productos paginados
        if($request->query('page') || $request->query('filtro')){
            $responseAjax = $this->productoService->getAjaxListaProductos($request,$empresa,$productos);
            return $responseAjax;
        }

        //variables de los filtros
        $filtros = $this->productoService->getFiltros('idMarca',$marca->idMarca);
        
        return view('marca',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'tipoCambio' => $tipoCambio,
                    'marca' => $marca,
                    'productos' => $productos,
                    'filtros' => $filtros
]);
    }
}