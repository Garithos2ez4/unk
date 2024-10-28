<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class Reclamos extends Model
{
    public $timestamps = false;
 
    protected $table = 'Reclamos';
    
    protected $primaryKey = 'idReclamo';

    protected $guarded = ['idReclamo'];
    
    protected $fillable = ['tipoDocumento',
                            'codigo',
                            'numeroDocumento',
                            'primerNombre',
                            'segundoNombre',
                            'apellidoPaterno',
                            'apellidoMaterno',
                            'direccion',
                            'numeroTelefono',
                            'correoElectronico',
                            'apoderado',
                            'producto',
                            'detalleProducto',
                            'tipoReclamo',
                            'detalleReclamo',
                            'fechaReclamo',
                            'fechaLimite',
                            'estado'
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idReclamo' => 'int',
        'codigo' => 'int',
        'fechaReclamo' => 'date',
        'fechaLimite' => 'date'
    ];
    
}