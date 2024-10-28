<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\CategoriaProducto;
use App\Models\TipoProducto;
use App\Models\MarcaProducto;
use App\Models\Producto;

class FiltroService
{
    public function productsFilter($productos, $request){
        $disponibilidadValidate = $request->query('validatedispo');
        $marcaValidate = $request->query('validatemarca');
        $grupoValidate = $request->query('validategrupo');
        
        if($request->has('filtro')){
            $filtros = $request->query('filtro');
            
            // Filtro por disponibilidad
            if(is_null($disponibilidadValidate)){
                if(!empty($filtros['dispo'])){
                    $productos = $productos->whereIn('estadoProductoWeb', $filtros['dispo']);
                }
            }
            
            // Filtro por marca
            if(is_null($marcaValidate)){
                if(!empty($filtros['marcas'])){
                    $productos = $productos->whereIn('idMarca', $filtros['marcas']);
                }
            }
            
            // Filtro por grupo
            if(is_null($grupoValidate)){
                if(!empty($filtros['grupos'])){
                    $productos = $productos->whereIn('idGrupo', $filtros['grupos']);
                }
            }
    
            // Ejecuta la consulta y resetea los índices
            return $productos->values();
        } else {
            // Ejecuta la consulta original y resetea los índices
            return $productos;
        }
    }
    
    public function parameterFilter($productos){
        $parametros = [];
        $marcas = $productos->pluck('MarcaProducto.nombreMarca','MarcaProducto.idMarca')->unique();
        $grupos = $productos->pluck('GrupoProducto.nombreGrupo','GrupoProducto.idGrupoProducto')->unique();
        $disponibilidades = $productos->pluck('estadoProductoWeb')->unique();
        
        $parametros['marcas'] = $marcas;
        $parametros['grupos'] = $grupos;
        $parametros['disponibilidades'] = $disponibilidades;
        
        return $parametros;
    }
}