<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HeaderService;

class StyleController extends Controller
{
    public function generateStyles()
    {
        // Obtén datos de los modelos
        $backgroundColor = '#f8f9fa'; // Estos valores podrían venir de un modelo
        $textColor = '#333';
        $containerWidth = '80%';
        
        $header = new HeaderService();
        $empresa = $header->obtenerEmpresa();

        return response()->view('css.dynamic-styles', compact('backgroundColor', 'textColor', 'containerWidth','empresa'))
                         ->header('Content-Type', 'text/css');
    }
    
    public function carruselMarcasStyles()
    {

        return response()->view('css.carrusel-marcas-styles')
                         ->header('Content-Type', 'text/css');
    }
}