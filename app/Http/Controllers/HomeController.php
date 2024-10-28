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
        $monitores = $this->homeService->getProductsByMonitores();
        $lapGamer = $this->homeService->getProductsByLaptopGamers();
        $impresoras = $this->homeService->getProductsByImpresoras();
        
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
