<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Repositories\ProductoRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoService implements ProductoServiceInterface
{
    protected $productoRepository;
    protected $preciosService;

    public function __construct(ProductoRepositoryInterface $productoRepository,
                                PreciosServiceInterface $preciosService)
    {
        $this->productoRepository = $productoRepository;
        $this->preciosService = $preciosService;
    }
    public function getAjaxListaProductos(Request $request, Empresa $empresa, LengthAwarePaginator $productos)
    {
        if ($request->query('page')) {
            $colmedio = $request->query('colmedio');
            $colsmall = $request->query('colsmall');
            $empres = $empresa;
            return response()->json([
                'html' => view('components.partials.lista-productos', compact('productos', 'colmedio','colsmall','empres'))->render(),
                'paginaActual' => $productos->currentPage(),
                'paginaPrevia' => $productos->previousPageUrl(),
                'paginaSiguiente' => $productos->nextPageUrl()
            ]);
        }
    }

    public function getFiltros($column, $data) { 
        $productos = $this->productoRepository->getAllByColumn($column, $data); 
        $filtros = $this->getParametros($productos);
        return $filtros;
    }

    public function searchFiltros($column,$data){
        
        dd($column);
    }

    private function getParametros($productos){
        $disponibilidad = $productos->unique('estadoProductoWeb')->pluck('estadoProductoWeb');
        $marcas = $productos->load('MarcaProducto')->pluck('MarcaProducto')->unique('idMarca'); 
        $tipos = $productos->load('GrupoProducto')->pluck('GrupoProducto')->unique('GrupoProducto.idTipoProducto')->pluck('TipoProducto');
        $categorias = $productos->load('GrupoProducto')->pluck('GrupoProducto')->unique('GrupoProducto.idCategoria')->pluck('CategoriaProducto');
        $precios = $productos->map(function ($producto) {
                                    return floatval(str_replace(',', '', $producto->precioTotalSol($this->preciosService)));
                                    // Suponiendo que calcularPrecio() es el método del modelo 
                                    });
        $precioMax = $precios->max();
        $precioMin = $precios->min();
        $especificaciones = $productos->load('Caracteristicas_Producto.Caracteristicas')
                                    ->pluck('Caracteristicas_Producto.*')
                                    ->flatten()
                                    ->unique('caracteristicaProducto');

        $caracteristicas = $especificaciones->groupBy('Caracteristicas.idCaracteristica')
                                            ->sortBy(function ($spect) {
                                                return $spect->first()->Caracteristicas->idCaracteristica; 
                                            })->map(function ($group) {
                                                // Obtén el id y otras propiedades que quieras
                                                $idCaracteristica = $group->first()->Caracteristicas->idCaracteristica;
                                                $nombreCaracteristica = $group->first()->Caracteristicas->especificacion; // Asumiendo que existe este campo
                                                $tipoCaracteristica = $group->first()->Caracteristicas->tipo;
                                                return [
                                                    'id' => $idCaracteristica,
                                                    'nombre' => $nombreCaracteristica,
                                                    'especificaciones' => $group,
                                                    'tipo' =>$tipoCaracteristica
                                                ];
                                            });
        $filtros = ['disponibilidad' => $disponibilidad,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'categorias' => $categorias,
                    'precioMin' => $precioMin,
                    'precioMax' => $precioMax,
                    'caracteristicas' => $caracteristicas];
        return $filtros;
    }
}