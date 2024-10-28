<?php

namespace App\Repositories;

use App\Models\TipoProducto;

class TipoProductoRepository implements TipoProductoRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new TipoProducto())->getFillable();
    }
    public function getAll(){
        return TipoProducto::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return TipoProducto::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return TipoProducto::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return TipoProducto::where($column, 'LIKE', '%' . $data . '%')->get();
    }
    public function create(array $data){
        return TipoProducto::create($data);
    }
    public function update($id, array $data){
        $tipo = TipoProducto::findOrFail($id);
        $tipo->update($data);
        return $tipo;
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}