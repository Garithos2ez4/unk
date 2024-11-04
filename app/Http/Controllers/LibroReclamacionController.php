<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Services\HeaderService;
use App\Mail\ReclamosMaileable;
use App\Services\HeaderServiceInterface;
use App\Services\ReclamacionServiceInterface;
use Exception;
use PDF;

class LibroReclamacionController extends Controller
{
    protected $headerService;
    protected $reclamacionService;

    public function __construct(HeaderServiceInterface $headerService,
                                ReclamacionServiceInterface $reclamacionService)
    {
        $this->headerService = $headerService;
        $this->reclamacionService = $reclamacionService;
    }
    public function index(){
        
        //Variables para el header,nav y footer
        $categorias = $this->headerService->obtenerCategorias();
        $empresa = $this->headerService->obtenerEmpresa();
        $marcas = $this->headerService->obtenerMarcas();
        $tipos = $this->headerService->obtenerTipo();
        $tipoCambio = $this->headerService->obtenerCambioDolar();
        
        return view('libroreclamacion',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'tipoCambio' => $tipoCambio
        ]);
    }
    
    public function createReclamo(Request $request){
        $request->validate(['g-recaptcha-response' => 'required|recaptcha',]);
        $empresa = $this->headerService->obtenerEmpresa();
        $reclamos = $request->input('reclamo');
        
        //luego catcha
        if($reclamos){
            try{
                $this->reclamacionService->generateReclamo($reclamos);
                echo("<script>alert('Recibiras un correo de confirmacion (revisa el spam de ser necesario).')</script>");
                return back();
            }catch(Exception $e){
                echo("<script>alert('Ocurrio un error.')</script>");
                return back();
            }
            
        }else{
            echo("<script>alert('Error en la operacion')</script>");
            return back();
        }
        
    }
    
   
}