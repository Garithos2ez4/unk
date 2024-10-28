<?php

namespace App\Repositories;

use App\Models\Calculadora;
use Exception;

class CalculadoraRepository implements CalculadoraRepositoryInterface
{
    public function updateTC($tc){
        try{
            $calculadora = Calculadora::first();
            $calculadora->tasaCambio = $tc;
            
            $calculadora->save();
        }catch(Exception $e){
            throw new \InvalidArgumentException("Error en la operacion. '$e'");
        }
        
    }

    public function get(){
        return Calculadora::first();
    }
}