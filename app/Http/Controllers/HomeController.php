<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
use App\Models\Publicidad;
use App\Models\Producto;

class HomeController extends Controller
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
        
        //Variables propias del controlador
        $banners = Publicidad::where('idEmpresa','=',$empresa->idEmpresa)->get();
        
        $getMonitores = DB::select('CALL sp_get_productoxgrupo(?,?)', [3,-1]);
        $monitores = collect(Producto::hydrate($getMonitores))->shuffle()->slice(0, 17);
        
        $getLapGamer = DB::select('CALL sp_get_productoxgrupo(?,?)', [1,1]);
        $lapGamer = collect(Producto::hydrate($getLapGamer))->shuffle()->slice(0, 17);
        
        $getImpresoras = DB::select('CALL sp_get_productoxgrupo(?,?)', [6,-1]);
        $impresoras = collect(Producto::hydrate($getImpresoras))->shuffle()->slice(0, 17);
        
        
        
        return view('home',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio,
                    'banners' => $banners,
                    'monitores' => $monitores,
                    'lapGamer' => $lapGamer,
                    'impresoras' => $impresoras
]);
    }
    //
}
