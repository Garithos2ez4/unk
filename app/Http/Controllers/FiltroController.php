<?php
// app/Http/Controllers/FiltroController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltroController extends Controller
{
     public function actualizarContenido(Request $request)
    {
        $results = $request->input('query');
        
        return response()->json($results);
    }
}