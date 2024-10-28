<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Services\HeaderService;
use App\Mail\ReclamosMaileable;
use PDF;

class LibroReclamacionController extends Controller
{
    public function index(){
        //Variables propias del controlador
        
        //Variables para el header,nav y footer
        $header = new HeaderService();
        $categorias = $header->obtenerCategorias();
        $empresa = $header->obtenerEmpresa();
        $marcas = $header->obtenerMarcas();
        $tipos = $header->obtenerTipo();
        $redes = $header->obtenerLinkRedes();
        $tipoCambio = $header->obtenerCambioDolar();
        
        return view('libroreclamacion',[
                    'categorias' => $categorias,
                    'empresa' => $empresa,
                    'marcas' => $marcas,
                    'tipos' => $tipos,
                    'redes' => $redes,
                    'tipoCambio' => $tipoCambio
        ]);
    }
    
    public function createReclamo(Request $request){
        $request->validate(['g-recaptcha-response' => 'required|recaptcha',]);
        $header = new HeaderService();
        $empresa = $header->obtenerEmpresa();
        $reclamos = $request->input('reclamo');
        
        //luego catcha
        if($reclamos){
            try{
                DB::beginTransaction();
                
                $newIdReclamo = $this->getNewidReclamo();
                $newCodReclamo = $this->getNewCodigo();
                $reclamoModel = new Reclamos();
                $reclamoModel->idReclamo = $newIdReclamo;
                $reclamoModel->codigo = $newCodReclamo;
                $reclamoModel->tipoDocumento = $reclamos['tipodocumento'];
                $reclamoModel->numeroDocumento = $reclamos['numerodocumento'];
                $reclamoModel->primerNombre = $reclamos['primernombre'];
                $reclamoModel->segundoNombre = $reclamos['segundonombre'];
                $reclamoModel->apellidoPaterno = $reclamos['apellidopaterno'];
                $reclamoModel->apellidoMaterno = $reclamos['apellidomaterno'];
                $reclamoModel->direccion = $reclamos['direccion'];
                $reclamoModel->numeroTelefono = $reclamos['telefono'];
                $reclamoModel->correoElectronico = $reclamos['correo'];
                if(isset($reclamos['apoderado'])){
                    $reclamoModel->apoderado = $reclamos['apoderado'];
                }
                
                $reclamoModel->producto = $reclamos['producto'];
                $reclamoModel->detalleProducto = $reclamos['detalleproducto'];
                if(isset($reclamos['checkreclamo'])){
                    $reclamoModel->tipoReclamo = $reclamos['checkreclamo'];
                }
                
                if(isset($reclamos['checkqueja'])){
                    $reclamoModel->tipoReclamo = $reclamos['checkqueja'];
                }
                $reclamoModel->detalleReclamo = $reclamos['detallereclamo'];
                $reclamoModel->fechaReclamo = now();
                $reclamoModel->fechaLimite = now()->addDays(15);
                $reclamoModel->estado = 'EN TRAMITE';
                
                DB::commit();
                $reclamoModel->save();
                $this->sendEmail($reclamos['correo'],$reclamoModel,$empresa,'atencion@unikstoreperu.com');
                
                echo("<script>alert('Recibiras un correo de confirmacion (revisa el spam de ser necesario).')</script>");
                return back();
            }catch(Exception $e){
                DB::rollBack();
                echo("<script>alert('Ocurrio un error.')</script>");
                return back();
            }
            
        }else{
            echo("<script>alert('Error en la operacion')</script>");
            return back();
        }
        
    }
    
    private function getNewidReclamo(){
        $id = Reclamos::select('idReclamo')->orderBy('idReclamo','desc')->first();
        return $id->idReclamo + 1;
    }
    
    private function getNewCodigo(){
        $cod = Reclamos::orderBy('idReclamo','desc')->first();
        return $cod->codigo + 1;
    }
    
    private function sendEmail($email,$detalles,$empresa,$fromAddress){
        Mail::to($email)->cc($fromAddress)->send( new ReclamosMaileable($detalles,$empresa,$fromAddress));
    }
}