<?php

namespace App\Services;

use App\Models\Calculadora;
use App\Models\Comision;

class PreciosService implements PreciosServiceInterface
{
    protected $headerService;

    public function __construct(HeaderServiceInterface $headerService)
    {
        $this->headerService = $headerService;
    }
    
    public function getIgv($precio,$tipo){
        $calculadora = $this->getCalculadora();
            $precioIgv = $this->validateMoney($precio,$tipo) * $this->porcent($calculadora->igv);
        return $precioIgv;
    }
    
    public function getPrecioSinFacturar($precio,$grupo,$tipo){
        $comisiones = Comision::where('idGrupoProducto','=',$grupo)->get();
            
        foreach($comisiones as $comision){
            if($precio > $comision->RangoPrecio->rangoMin && $precio < $comision->RangoPrecio->rangoMax){
                return $this->getIgv($precio,$tipo) * $this->porcent($comision->comision);
                 
            }
        }
    }
   
    
    public function getPrecioFacturado($precio,$grupo,$tipo){
        $calculadora = $this->getCalculadora();
        return $this->getPrecioSinFacturar($precio,$grupo,$tipo) * $this->porcent($calculadora->facturacion);
    }
    
    public function getPromedio($precio,$grupo,$tipo){
        return ($this->getPrecioSinFacturar($precio,$grupo,$tipo) + $this->getPrecioFacturado($precio,$grupo,$tipo))/2;
    }
    
    public function getEspecialPrice($precio,$tipo){
            $totalPrecio = $this->getIgv($precio,$tipo) ;
        return $totalPrecio;
    }
    
    public function getPrecioCalculado($precio,$grupo,$tipo,$estado){
        if($estado == 'EXCLUSIVO' || $estado == 'OFERTA'){
            $total =  $this->getEspecialPrice($precio,$tipo);
        }else{
            $total = $this->getPromedio($precio,$grupo,$tipo);
        }
            
         return $total;
    }
    
    public function getPrecioTotal($precio,$grupo,$tipo,$estado,$ganancia){
        $empresa = $this->headerService->obtenerEmpresa();
        $gananciaValidate = $this->validateMoney($ganancia,$tipo);
        $total = $this->getPrecioCalculado($precio,$grupo,$tipo,$estado) * $this->porcent($empresa->comision) + $gananciaValidate;
        return $total;
    }
    
    private function getCalculadora(){
        return Calculadora::first();
    }

    private function validateMoney($precio,$tipo){
         $calculadora = $this->getCalculadora();
        if($tipo == 'SOL'){
            return $precio * $calculadora->tasaCambio;
        }else{
            return $precio;
        }
    }
    
    private function porcent($number){
        return 1 + ($number / 100);
    }
}