<?php

namespace App\Repositories;

use App\Models\Caracteristicas;
use App\Models\Producto;

class ProductoRepository implements ProductoRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new Producto())->getFillable();
    }

    public function getAll(){
        return Producto::where('estadoProductoWeb','<>','DESCONTINUADO')->get();
    }

    public function getOne($column,$data){
        $this->validateColumns($column);
        return Producto::where('estadoProductoWeb','<>','DESCONTINUADO')->where($column,'=',$data)->first();
    }

    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return Producto::where('estadoProductoWeb','<>','DESCONTINUADO')->where($column,'=',$data)->get();
    }

    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return Producto::where('estadoProductoWeb','<>','DESCONTINUADO')->where($column, 'LIKE', '%' . $data . '%')->get();
    }

    public function getPaginationByColumn($column,$data,$cant,array $querys){
        $query = Producto::query();
        $query->where('estadoProductoWeb','<>','DESCONTINUADO');
        $query->where($column,'=',$data);
        if($querys){
            if(isset($querys['tipos']) || isset($querys['categorias'])){
                $query->join('GrupoProducto','GrupoProducto.idGrupoProducto','=','Producto.idGrupo');
                if (isset($querys['tipos'])) {
                    $query->whereIn('GrupoProducto.idTipoProducto', $querys['tipos']);
                }
    
                if (isset($querys['categorias'])) {
                    $query->whereIn('GrupoProducto.idCategoria', $querys['categorias']);
                }
            }

            if (isset($querys['caracteristicas'])) {
                $query->join('Caracteristicas_Producto','Caracteristicas_Producto.idProducto','=','Producto.idProducto')
                    ->whereIn('Caracteristicas_Producto.caracteristicaProducto',$querys['caracteristicas']);
            }

            if (isset($querys['dispo'])) {
                $query->whereIn('estadoProductoWeb', $querys['dispo']);
            }

            if (isset($querys['marcas'])) {
                $query->whereIn('idMarca', $querys['marcas']);
            }

            if(isset($querys['orden'])){
                $query->orderBy('precioDolar', $querys['orden']);
            }

        }
        return   $query->paginate($cant);
    }

    public function getAllByCategoria($idCategoria){
        return Producto::join('GrupoProducto','GrupoProducto.idGrupoProducto','=','Producto.idGrupo')
                        ->select('Producto.*')->where('Producto.estadoProductoWeb','<>','DESCONTINUADO')
                        ->where('GrupoProducto.idCategoria','=',$idCategoria)
                        ->get();
    }

    public function getSpectsByColumn($column,$data){
        return Producto::with('Caracteristicas_Producto.Caracteristicas')->where('estadoProductoWeb','<>','DESCONTINUADO')->where($column,'=',$data)->get();
    }

    public function create(array $data){
        return Producto::create($data);
    }

    public function update($id, array $data){
        $producto = Producto::findOrFail($id);
        $producto->update($data);
        return $producto;
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}