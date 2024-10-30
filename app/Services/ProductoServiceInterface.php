<?php

namespace App\Services;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductoServiceInterface
{
    public function getAjaxListaProductos(Request $request,Empresa $empresa,LengthAwarePaginator $productos);
    public function getFiltros($column,$data);
    public function searchFiltros($column,$data);
}