<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function headerScripts()
    {
        
        $js = view('js.header-scripts')->render();

        return response($js)->header('Content-Type', 'application/javascript');
    }
    
    public function filterScripts()
    {
        
        $js = view('js.filter-scripts')->render();

        return response($js)->header('Content-Type', 'application/javascript');
    }
    
    public function paginationScript()
    {
        
        $js = view('js.pagination-scripts')->render();

        return response($js)->header('Content-Type', 'application/javascript');
    }
    
    public function carruselMarcasScript()
    {
        
        $js = view('js.carrusel-marcas-scripts')->render();

        return response($js)->header('Content-Type', 'application/javascript');
    }
    
    public function sliderScript($titulo, $slideSmall, $slideMedio)
    {
        $js = view('js.slider-scripts',['titulo' => $titulo,
                                        'slideSmall' => $slideSmall,
                                        'slideMedio' => $slideMedio])->render();

        return response($js)->header('Content-Type', 'application/javascript');
    }
    
    public function reclamosScript()
    {
        
        $js = view('js.reclamo-scripts')->render();

        return response($js)->header('Content-Type', 'application/javascript');
    }
}