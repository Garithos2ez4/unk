<?php

namespace App\Services;

use App\Repositories\MarcaProductoRepositoryInterface;

class MarcaService implements MarcaServiceInterface
{
    protected $marcaRepository;
    
    public function __construct(MarcaProductoRepositoryInterface $marcaRepository)
    {
        $this->marcaRepository = $marcaRepository;
    }
    public function getMarcaBySlug($slug){
        return $this->marcaRepository->getOne('slugMarca',$slug);
    }
}