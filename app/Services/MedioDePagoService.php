<?php

namespace App\Services;

use App\Repositories\CuentasTransferenciaRepository;

class MedioDePagoService implements MedioDePagoServiceInterface
{
    protected $cuentasRepository;

    public function __construct(CuentasTransferenciaRepository $cuentasRepository)
    {
        $this->cuentasRepository = $cuentasRepository;
    }
    public function getCuentasBancarias(){
        return $this->cuentasRepository->getAllByColumn('tipoCuenta','BANCARIA');
    }

    public function getCuentasInterbancarias(){
        return $this->cuentasRepository->getAllByColumn('tipoCuenta','INTERBANCARIA');
    }
}