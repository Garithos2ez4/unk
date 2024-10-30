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

    public function getPaginationByColumn($column,$data,$cant){
        return Producto::where('estadoProductoWeb','<>','DESCONTINUADO')->where($column,'=',$data)->paginate($cant);
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