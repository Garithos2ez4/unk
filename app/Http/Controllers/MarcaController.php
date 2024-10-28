<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarcaProducto;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
use App\Services\FiltroService;

class MarcaController extends Controller
{
    public function index($slug,Request $request){
        //Variables para el header,nav y footer
        $header = new HeaderService();
        $categorias = $header->obtenerCategorias();
        $empresa = $header->obtenerEmpresa();
        $marcas = $header->obtenerMarcas();
        $tipos = $header->obtenerTipo();
        $redes = $header->obtenerLinkRedes();
        $tipoCambio = $header->obtenerCambioDolar();
        
        //Variables propias del controlador
        $slugMarca = MarcaProducto::select('idMarca')->where('slugMarca','=',$slug)->first();
        $getProductos = DB::select('CALL sp_get_productoxmarca(?)', [$slugMarca->idMarca]);
        $modelProductos = Producto::hydrate($getProductos);
        $marca = MarcaProducto::firstWhere('idMarca', $slugMarca->idMarca);
        
        //variables para el filtro
        $filtro = new FiltroService();
        $parametrosFiltro = $filtro->parameterFilter($modelProductos);
        $productos = $filtro->productsFilter($modelProductos,$request);
        
        return view('marca',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio,
                    'marca' => $marca,
                    'productos' => $productos,
                    'parametrosFiltro' => $parametrosFiltro
]);
    }
}