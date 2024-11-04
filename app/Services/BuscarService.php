<?php

namespace App\Services;

use App\Repositories\ProductoRepositoryInterface;

class BuscarService implements BuscarServiceInterface
{
    protected $productoRepository;
    protected $preciosService;

    public function __construct(ProductoRepositoryInterface $productoRepository,
                                PreciosServiceInterface $preciosService)
    {
        $this->productoRepository = $productoRepository;
        $this->preciosService = $preciosService;
    }

    public function searchProducts($query){
        $productos = $this->productoRepository->searchByColumn('nombreProducto',$query)
                                                ->take(4)
                                                ->map(function ($producto) {
                                                    // Agregar las URLs de las im��genes al producto
                                                    $producto->precioTotalDolar = $producto->precioTotalDolar($this->preciosService);
                                                    $producto->precioTotalSol = $producto->precioTotalSol($this->preciosService);
                                                    $producto->imageUrls = $producto->publicImages();
                                                    $producto->stock = array_sum($producto->Inventario->pluck('stock')->toArray());
                                                    return $producto;
                                                });
        return $productos;
    }
}