<?php

namespace App\Repositories;

use App\Models\MarcaProducto;

class MarcaProductoRepository implements MarcaProductoRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new MarcaProducto())->getFillable();
    }
    public function getAll(){
        return MarcaProducto::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return MarcaProducto::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return MarcaProducto::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return MarcaProducto::where($column, 'LIKE', '%' . $data . '%')->get();
    }
    public function create(array $data){
        return MarcaProducto::create($data);
    }
    public function update($id, array $data){
        $marca = MarcaProducto::findOrFail($id);
        $marca->update($data);
        return $marca;
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}