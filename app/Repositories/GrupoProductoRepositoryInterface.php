<?php

namespace App\Repositories;

interface GrupoProductoRepositoryInterface {
    public function getAll();
    public function getOne($column,$data);
    public function getAllByColumn($column,$data);
    public function searchByColumn($column,$data);
    public function create(array $data);
    public function update($id, array $data);
}