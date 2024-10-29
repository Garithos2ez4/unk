<?php

namespace App\Services;

use App\Repositories\CategoriaProductoRepositoryInterface;
use App\Repositories\GrupoProductoRepositoryInterface;
use App\Repositories\ProductoRepositoryInterface;

class CategoriaService implements CategoriaServiceInterface
{
    protected $categoriaRepository;
    protected $grupoRepository;
    protected $productoRepository;

    public function __construct(CategoriaProductoRepositoryInterface $categoriaRepository,
                                GrupoProductoRepositoryInterface $grupoRepository,
                                ProductoRepositoryInterface $productoRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
        $this->grupoRepository = $grupoRepository;
        $this->productoRepository = $productoRepository;
    }

    public function getCategoriaXSlug($slug){
        return $this->categoriaRepository->getOne('slugCategoria',$slug);
    }

    public function getGrupoXSlug($slugGrupo){
        return $this->grupoRepository->getOne('slugGrupo',$slugGrupo);
    }

    public function getProductoPaginationXGrupo($idGrupo){
        return $this->productoRepository->getPaginationByColumn('idGrupo',$idGrupo,16);
    }
}