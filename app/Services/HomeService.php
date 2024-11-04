<?php

namespace App\Services;

use App\Repositories\ProductoRepositoryInterface;
use App\Repositories\PublicidadRepositoryInterface;

class HomeService implements HomeServiceInterface
{
    protected $publicidadRepository;
    protected $productoRepository;

    public function __construct(PublicidadRepositoryInterface $publicidadRepository,
                                ProductoRepositoryInterface $productoRepository)
    {
        $this->publicidadRepository = $publicidadRepository;
        $this->productoRepository = $productoRepository;
    }
    public function getPublicidad($idEmpresa){
        return $this->publicidadRepository->getAllByColumn('idEmpresa',$idEmpresa);
    }

    public function getProductsByLaptopGamers(){
        return $this->productoRepository->getAllByColumn('idGrupo',1)->shuffle()->take(17);
    }

    public function getProductsByMonitores(){
        return $this->productoRepository->getAllByCategoria(3)->shuffle()->take(17);
    }

    public function getProductsByImpresoras(){
        return $this->productoRepository->getAllByCategoria(6)->shuffle()->take(17);
    }

    public function getAccesorios(){
        return $this->productoRepository->getAllByCategoria(4)->shuffle()->take(30);
    }

    public function getExclusivos(){
        return $this->productoRepository->getAllByColumn('estadoProductoWeb','OFERTA')->shuffle()->take(9);
    }
}