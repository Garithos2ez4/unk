<?php

namespace App\Services;

interface CategoriaServiceInterface
{
    public function getCategoriaXSlug($slug);
    public function getGrupoXSlug($slugGrupo);
    public function getProductoPaginationXGrupo($idGrupo);
}