<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
use App\Models\CuentasTransferencia;

class MedioDePagoController extends Controller
{
    public function index(){
        //Variables para el header,nav y footer
        $header = new HeaderService();
        $categorias = $header->obtenerCategorias();
        $empresa = $header->obtenerEmpresa();
        $marcas = $header->obtenerMarcas();
        $tipos = $header->obtenerTipo();
        $redes = $header->obtenerLinkRedes();
        $tipoCambio = $header->obtenerCambioDolar();
        
        $bancarias = CuentasTransferencia::where('tipoCuenta','BANCARIA')->get();
        $inter = CuentasTransferencia::where('tipoCuenta','INTERBANCARIA')->get();
        
        //Variables propias del controlador
        
        return view('mediodepago',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio,
                    'bancarias' => $bancarias,
                    'inter' => $inter,

]);
    }
}