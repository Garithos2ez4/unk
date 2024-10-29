<?php

namespace App\Repositories;

use App\Models\GrupoProducto;

class GrupoProductoRepository implements GrupoProductoRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new GrupoProducto())->getFillable();
    }
    public function getAll(){
        return GrupoProducto::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return GrupoProducto::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return GrupoProducto::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return GrupoProducto::where($column, 'LIKE', '%' . $data . '%')->get();
    }
    public function create(array $data){
        return GrupoProducto::create($data);
    }
    public function update($id, array $data){
        $grupo = GrupoProducto::findOrFail($id);
        $grupo->update($data);
        return $grupo;
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}