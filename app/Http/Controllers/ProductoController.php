<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
use App\Models\Producto;
use Illuminate\Support\Facades\URL;
// llamar a los models: use App\Models\CategoriaProducto;

class ProductoController extends Controller
{
    public function index($product){
        //Variables para el header,nav y footer
        $header = new HeaderService();
        $categorias = $header->obtenerCategorias();
        $empresa = $header->obtenerEmpresa();
        $marcas = $header->obtenerMarcas();
        $tipos = $header->obtenerTipo();
        $redes = $header->obtenerLinkRedes();
        $tipoCambio = $header->obtenerCambioDolar();
        
        //Variables propias del controlador
        $slug = Producto::select('idProducto')->where('slugProducto','=',$product)->first();
        //dd(json_encode($product));
        
        $getProducto = DB::select('CALL sp_get_producto(?)', [$slug->idProducto]);
        $producto = Producto::hydrate($getProducto);
        $detalles = DB::select('CALL sp_get_detallexproducto(?)', [$slug->idProducto]);
        $producto = collect($producto)->first();
        $miUrl = URL::current();
        
        $productosCategoria = Producto::join('GrupoProducto','Producto.idGrupo','=','GrupoProducto.idGrupoProducto')->select('Producto.*')
                                ->where('GrupoProducto.idCategoria','=',$producto->GrupoProducto->idCategoria)->inRandomOrder()->take(17)->get();
        
        return view('producto',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio,
                    'producto' => $producto,
                    'miUrl' => $miUrl,
                    'detalles' => $detalles,
                    'productosCategoria' => $productosCategoria
]);
    }
}