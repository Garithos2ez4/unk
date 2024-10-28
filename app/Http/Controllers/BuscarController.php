<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarcaProducto;
use App\Models\Producto;
use App\Models\Caracteristicas_Producto;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
use App\Services\FiltroService;

class BuscarController extends Controller
{
    public function index(Request $request){
        //Variables propias del controlador
        $obt = $request->input('header');
        if(!empty($obt)){
           session(['buscar' => $obt]);
        }
        
        $getProducts = collect();
        
        $marcaSearch = MarcaProducto::where('nombreMarca', 'LIKE', '%'.session()->get('buscar',$obt).'%')->first();
        
        if ($marcaSearch) {
            // Buscar productos basados en el idMarca si se encontrÃ³ una marca
            $getProducts = Producto::where('idMarca', '=', $marcaSearch->idMarca)->get();
        }
        
        if($getProducts->isEmpty()){
            $getProducts = Producto::where('nombreProducto', 'LIKE', '%'.session()->get('buscar',$obt).'%')->get();
        }
        
        if($getProducts->isEmpty()){
            $getProducts = Producto::where('descripcionProducto', 'LIKE', '%'.session()->get('buscar',$obt).'%')->get();
        }
        
        
        $products = $getProducts;
        
        //Variables para el header,nav y footer
        $header = new HeaderService();
        $categorias = $header->obtenerCategorias();
        $empresa = $header->obtenerEmpresa();
        $marcas = $header->obtenerMarcas();
        $tipos = $header->obtenerTipo();
        $redes = $header->obtenerLinkRedes();
        $tipoCambio = $header->obtenerCambioDolar();
        
        //variables para el filtro
        $filtro = new FiltroService();
        $parametrosFiltro = $filtro->parameterFilter($products);
        $productos = $filtro->productsFilter($products,$request);
        
        return view('buscar',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio,
                    'obt' => $obt,
                    'productos' => $productos,
                    'parametrosFiltro' => $parametrosFiltro
]);
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
    
         $results = Producto::where('nombreProducto', 'LIKE', "%{$query}%")
                ->take(4) // Limitar a 5 resultados
                ->get()
                ->map(function ($producto) {
                    // Agregar las URLs de las im¨¢genes al producto
                    $producto->precioTotalDolar = $producto->precioTotalDolar();
                    $producto->precioTotalSol = $producto->precioTotalSol();
                    $producto->imageUrls = $producto->publicImages();
                    return $producto;
                });
                
        return response()->json($results);
    }
}