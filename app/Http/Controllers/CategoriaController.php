<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;
use App\Models\GrupoProducto;
use App\Models\Producto;
use App\Services\CategoriaServiceInterface;
use Illuminate\Support\Facades\DB;
use App\Services\HeaderService;
use App\Services\FiltroService;
use App\Services\HeaderServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriaController extends Controller
{
    protected $headerService;
    protected $categoriaService;

    public function __construct(HeaderServiceInterface $headerService,
                                CategoriaServiceInterface $categoriaService)
    {
        $this->headerService = $headerService;
        $this->categoriaService = $categoriaService;
    }
    public function index($cat,$grup,Request $request){
        //Variables para el header,nav y footer
        $categorias = $this->headerService->obtenerCategorias();
        $empresa = $this->headerService->obtenerEmpresa();
        $marcas = $this->headerService->obtenerMarcas();
        $tipos = $this->headerService->obtenerTipo();
        $tipoCambio = $this->headerService->obtenerCambioDolar();
        
        //Variables propias del controlador
        $categoria = $this->categoriaService->getCategoriaXSlug($cat);
        
        $grupo = $this->categoriaService->getGrupoXSlug($grup);

        $productos = $this->categoriaService->getProductoPaginationXGrupo($grupo->idGrupoProducto);

        if ($request->query('page')) {
            $colmedio = $request->query('colmedio');
            $empres = $empresa;
            return response()->json([
                'html' => view('components.partials.lista-productos', compact('productos', 'colmedio','empres'))->render(),
                'paginaActual' => $productos->currentPage(),
                'paginaPrevia' => $productos->previousPageUrl(),
                'paginaSiguiente' => $productos->nextPageUrl()
            ]);
        }
        return view('categoria',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'tipoCambio' => $tipoCambio,
                    'categoria' => $categoria,
                    'grupo' => $grupo,
                    'productos' => $productos
        ]);
    }
}