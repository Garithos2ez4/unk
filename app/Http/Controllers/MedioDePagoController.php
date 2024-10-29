<?php

namespace App\Http\Controllers;

use App\Services\HeaderServiceInterface;
use App\Services\MedioDePagoServiceInterface;

class MedioDePagoController extends Controller
{
    protected $headerService;
    protected $medioDePagoService;

    public function __construct(HeaderServiceInterface $headerService,
                                MedioDePagoServiceInterface $medioDePagoService)
    {
        $this->headerService = $headerService;
        $this->medioDePagoService = $medioDePagoService;
    }
    public function index(){
        //Variables para el header,nav y footer
        $categorias = $this->headerService->obtenerCategorias();
        $empresa = $this->headerService->obtenerEmpresa();
        $marcas = $this->headerService->obtenerMarcas();
        $tipos = $this->headerService->obtenerTipo();
        $tipoCambio = $this->headerService->obtenerCambioDolar();
        
        $bancarias = $this->medioDePagoService->getCuentasBancarias();
        $inter = $this->medioDePagoService->getCuentasInterbancarias();
        
        //Variables propias del controlador
        
        return view('mediodepago',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'tipoCambio' => $tipoCambio,
                    'bancarias' => $bancarias,
                    'inter' => $inter,

]);
    }
}