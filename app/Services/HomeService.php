<?php

namespace App\Services;

use App\Repositories\PublicidadRepositoryInterface;

class HomeService implements HomeServiceInterface
{
    protected $publicidadRepository;

    public function __construct(PublicidadRepositoryInterface $publicidadRepository)
    {
        $this->publicidadRepository = $publicidadRepository;
    }
    public function getPublicidad($idEmpresa){
        return $this->publicidadRepository->getAllByColumn('idEmpresa',$idEmpresa);
    }
}