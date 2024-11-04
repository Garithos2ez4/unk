<?php

namespace App\Repositories;

interface ProductoRepositoryInterface {
    public function getAll();
    public function getOne($column,$data);
    public function getAllByColumn($column,$data);
    public function searchByColumn($column,$data);
    public function getPaginationByColumn($column,$data,$cant,array $querys);
    public function searchPaginationByColumn($column,$data,$cant,array $querys);
    public function getAllByCategoria($idCategoria);
    public function getSpectsByColumn($column,$data);
    public function create(array $data);
    public function update($id, array $data);
}