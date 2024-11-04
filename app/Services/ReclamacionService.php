<?php

namespace App\Services;

use App\Mail\ReclamosMaileable;
use App\Repositories\ReclamosRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class ReclamacionService implements ReclamacionServiceInterface
{
    protected $reclamoRepository;
    protected $headerService;

    public function __construct(ReclamosRepositoryInterface $reclamoRepository,
                                HeaderServiceInterface $headerService)
    {
        $this->reclamoRepository = $reclamoRepository;
        $this->headerService = $headerService;
    }
    public function generateReclamo(array $data){
        $values = [ 'idReclamo' => $this->getNewidReclamo(),
                    'codigo' => $this->getNewCodigo(),
                    'tipoDocumento' => $data['tipodocumento'],
                    'numeroDocumento' => $data['numerodocumento'],
                    'primerNombre' => $data['primernombre'],
                    'segundoNombre' => $data['segundonombre'],
                    'apellidoPaterno' => $data['apellidopaterno'],
                    'apellidoMaterno' => $data['apellidomaterno'],
                    'direccion' => $data['direccion'],
                    'numeroTelefono' => $data['telefono'],
                    'correoElectronico' => $data['correo'],
                    'apoderado' => isset($data['apoderado']) ? $data['apoderado'] : null,
                    'producto' => $data['producto'],
                    'detalleProducto' => $data['detalleproducto'],
                    'tipoReclamo' => isset($data['checkreclamo']) ? $data['checkreclamo'] : (isset($data['checkqueja']) ? $data['checkqueja'] : null),
                    'detalleReclamo' => $data['detallereclamo'],
                    'fechaReclamo' => now(),
                    'fechaLimite' => now()->addDays(15),
                    'estado' => 'EN TRAMITE'];
        
        $reclamoModel = $this->reclamoRepository->create($values);
        
        $reclamoModel->save();
        $this->sendEmail($values['correo'],$reclamoModel,$this->headerService->obtenerEmpresa(),'atencion@unikstoreperu.com');
    }

    private function getNewidReclamo(){
        $reclamo = $this->reclamoRepository->getLast();
        $id = $reclamo ? $reclamo->idReclamo : 0;
        return $id + 1;
    }
    
    private function getNewCodigo(){
        $reclamo = $this->reclamoRepository->getLast();
        $cod = $reclamo ? $reclamo->codigo : 100000;
        return $cod + 1;
    }
    
    private function sendEmail($email,$detalles,$empresa,$fromAddress){
        Mail::to($email)->cc($fromAddress)->send( new ReclamosMaileable($detalles,$empresa,$fromAddress));
    }
}