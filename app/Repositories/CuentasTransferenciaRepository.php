<?php

namespace App\Repositories;

use App\Models\CuentasTransferencia;

class CuentasTransferenciaRepository implements CuentasTransferenciaRepositoryInterface
{
    protected $modelColumns;

    public function __construct()
    {
        // Define las columnas válidas
        $this->modelColumns = (new CuentasTransferencia())->getFillable();
    }
    public function getAll(){
        return CuentasTransferencia::all();
    }
    public function getOne($column,$data){
        $this->validateColumns($column);
        return CuentasTransferencia::where($column,'=',$data)->first();
    }
    public function getAllByColumn($column,$data){
        $this->validateColumns($column);
        return CuentasTransferencia::where($column,'=',$data)->get();
    }
    public function searchByColumn($column,$data){
        $this->validateColumns($column);
        return CuentasTransferencia::where($column, 'LIKE', '%' . $data . '%')->get();
    }
    public function create(array $data){
        return CuentasTransferencia::create($data);
    }
    public function update($id, array $data){
        $cuenta = CuentasTransferencia::findOrFail($id);
        $cuenta->update($data);
        return $cuenta;
    }

    private function validateColumns($column){
        if (!in_array($column, $this->modelColumns)) {
            throw new \InvalidArgumentException("La columna '$column' no es válida.");
        }
    }
}