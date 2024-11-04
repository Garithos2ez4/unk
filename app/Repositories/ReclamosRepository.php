<?php

namespace App\Repositories;

use App\Models\Reclamos;

class ReclamosRepository implements ReclamosRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new Reclamos())->getFillable();
    }
    public function getAll(){
        return Reclamos::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return Reclamos::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return Reclamos::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return Reclamos::where($column, 'LIKE', '%' . $data . '%')->get();
    }
    public function create(array $data){
        return Reclamos::create($data);
    }
    public function update($id, array $data){
        $reclamo = Reclamos::findOrFail($id);
        $reclamo->update($data);
        return $reclamo;
    }

    public function getLast(){
        return Reclamos::orderBy('idReclamo', 'desc')->first();
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}