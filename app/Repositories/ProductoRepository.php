<?php

namespace App\Repositories;

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
        return Producto::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return Producto::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return Producto::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return Producto::where($column, 'LIKE', '%' . $data . '%')->get();
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