<?php

namespace App\Http\Controllers;

use App\Services\HeaderServiceInterface;
use App\Services\HomeServiceInterface;

class HomeController extends Controller
{
    protected $headerService;
    protected $homeService;

    public function __construct(HeaderServiceInterface $headerService,
                                HomeServiceInterface $homeService)
    {
        $this->headerService = $headerService;
        $this->homeService = $homeService;
    }
    public function index(){
        //Variables para el header,nav y footer
        $categorias = $this->headerService->obtenerCategorias();
        $empresa = $this->headerService->obtenerEmpresa();
        $marcas = $this->headerService->obtenerMarcas();
        $tipos = $this->headerService->obtenerTipo();
        $tipoCambio = $this->headerService->obtenerCambioDolar();
        
        //Variables propias del controlador
        $banners = $this->homeService->getPublicidad($empresa->idEmpresa);
        
        // $getMonitores = DB::select('CALL sp_get_productoxgrupo(?,?)', [3,-1]);
        // $monitores = collect(Producto::hydrate($getMonitores))->shuffle()->slice(0, 17);
        
        // $getLapGamer = DB::select('CALL sp_get_productoxgrupo(?,?)', [1,1]);
        // $lapGamer = collect(Producto::hydrate($getLapGamer))->shuffle()->slice(0, 17);
        
        // $getImpresoras = DB::select('CALL sp_get_productoxgrupo(?,?)', [6,-1]);
        // $impresoras = collect(Producto::hydrate($getImpresoras))->shuffle()->slice(0, 17);
        
        dd($banners);
        
        return view('home',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'tipoCambio' => $tipoCambio,
                    'banners' => $banners,
                    'monitores' => $monitores,
                    'lapGamer' => $lapGamer,
                    'impresoras' => $impresoras
]);
    }
    //
}
