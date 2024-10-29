<?php

namespace App\Services;

interface MedioDePagoServiceInterface
{
    public function getCuentasBancarias();
    public function getCuentasInterbancarias();
}