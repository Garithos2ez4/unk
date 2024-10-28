<?php

namespace App\Repositories;

use App\Models\CategoriaProducto;

class CategoriaProductoRepository implements CategoriaProductoRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new CategoriaProducto())->getFillable();
    }
    public function getAll(){
        return CategoriaProducto::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return CategoriaProducto::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return CategoriaProducto::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return CategoriaProducto::where($column, 'LIKE', '%' . $data . '%')->get();
    }
    public function create(array $data){
        return CategoriaProducto::create($data);
    }
    public function update($id, array $data){
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->update($data);
        return $categoria;
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}