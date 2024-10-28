<?php

namespace App\Repositories;

use App\Models\registroUpdate;

class registroUpdateRepository implements registroUpdateRepositoryInterface
{
    public function update(){
        $registro = registroUpdate::where('columna','=','tasaCambio')->first();
        $registro->ultimaFecha = now();
        $registro->save();
    }

    public function get(){
        return registroUpdate::where('columna','=','tasaCambio')->first();
    }
}