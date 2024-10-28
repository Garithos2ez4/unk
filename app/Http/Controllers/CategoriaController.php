<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;
use App\Models\GrupoProducto;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
use App\Services\FiltroService;


class CategoriaController extends Controller
{
    public function index($cat,$grup,Request $request){
        //Variables para el header,nav y footer
        $header = new HeaderService();
        $categorias = $header->obtenerCategorias();
        $empresa = $header->obtenerEmpresa();
        $marcas = $header->obtenerMarcas();
        $tipos = $header->obtenerTipo();
        $redes = $header->obtenerLinkRedes();
        $tipoCambio = $header->obtenerCambioDolar();
        
        //Variables propias del controlador
        $slugCat = CategoriaProducto::select('idCategoria')->where('slugCategoria','=',$cat)->first();
        
        $gruposModel = DB::select('CALL sp_get_gruposxcategorias(?)', [$slugCat->idCategoria]);
        $grupos = GrupoProducto::hydrate($gruposModel);
        $category = '';
        $getProductos = DB::select('CALL sp_get_productoxgrupo(?,?)', [$slugCat->idCategoria,$this->getIdGroup($grup)]);
        $modelProductos = Producto::hydrate($getProductos);
        $selectgroup = '';
        
        
        foreach($grupos as $grupo){
            if($grupo->idGrupoProducto == $this->getIdGroup($grup)){
                $selectgroup = $grupo;
            }
        }
        
        foreach($categorias as $categoria){
            if($categoria->idCategoria == $slugCat->idCategoria){
                $category = $categoria;
            }
        }
        
        //variables para el filtro
        $filtro = new FiltroService();
        $parametrosFiltro = $filtro->parameterFilter($modelProductos);
        $productos = $filtro->productsFilter($modelProductos,$request);
        
        //dd($parametrosFiltro['marcas']);
        
        //dd(json_encode($categorias));
        
        return view('categoria',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio,
                    'category' => $category,
                    'grupos' => $grupos,
                    'selectgroup'=> $selectgroup,
                    'productos' => $productos,
                    'parametrosFiltro' => $parametrosFiltro
]);
    }
    
    private function getIdGroup($request){
        $grupo = GrupoProducto::select('idGrupoProducto')->where('slugGrupo','=',$request)->first();
        
        if(!empty($grupo)){
            return $grupo->idGrupoProducto;
        }else{
            return -1;
        }
    }
    
}