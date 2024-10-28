<?php

namespace App\Services;

interface PreciosServiceInterface
{
    public function getIgv($precio,$tipo);
    public function getPrecioSinFacturar($precio,$grupo,$tipo);
    public function getPrecioFacturado($precio,$grupo,$tipo);
    public function getPromedio($precio,$grupo,$tipo);
    public function getEspecialPrice($precio,$tipo);
    public function getPrecioCalculado($precio,$grupo,$tipo,$estado);
    public function getPrecioTotal($precio,$grupo,$tipo,$estado,$ganancia);
}