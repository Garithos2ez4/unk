<?php

namespace App\Repositories;

use App\Models\Publicidad;

class PublicidadRepository implements PublicidadRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new Publicidad())->getFillable();
    }
    public function getAll(){
        return Publicidad::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return Publicidad::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return Publicidad::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return Publicidad::where($column, 'LIKE', '%' . $data . '%')->get();
    }
    public function create(array $data){
        return Publicidad::create($data);
    }
    public function update($id, array $data){
        $publicidad = Publicidad::findOrFail($id);
        $publicidad->update($data);
        return $publicidad;
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}