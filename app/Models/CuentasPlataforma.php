<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuentasPlataforma extends Model
{
    public $timestamps = false;
 
    protected $table = 'CuentasPlataforma';
    
    protected $primaryKey = 'idCuentaPlataforma';

    protected $guarded = ['idCuentaPlataforma','idPlataforma'];
    
    protected $fillable = ['nombreCuenta',
                            'estadoCuenta'
                            ];

    
    protected $hidden = [
    ];

    
    protected $casts = [
        'idPlataforma' => 'int',
        'idCuentaPlataforma' => 'int'
    ];

    /**
     * Obtener las relaciones del modelo.
     */
    public function Plataforma()
    {
        return $this->belongsTo(Plataforma::class,'idPlataforma','idPlataforma');
    }
    
    public function Publicacion()
    {
        return $this->hasMany(Publicacion::class,'idCuentaPlataforma','idCuentaPlataforma');
    }
    
}