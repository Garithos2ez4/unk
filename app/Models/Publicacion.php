<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    public $timestamps = false;
 
    protected $table = 'Publicacion';
    
    protected $primaryKey = 'idPublicacion';

    protected $guarded = ['idPublicacion','idCuentaPlataforma','idUser','idProducto'];
    
    protected $fillable = ['sku',
                            'titulo',
                            'estado',
                            'fechaPublicacion'
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idPublicacion' => 'int',
        'idCuentaPlataforma' => 'int',
        'idUser' => 'int',
        'idProducto' => 'int',
        'estado' => 'boolean',
        'fechaPublicacion' => 'date'
    ];
    
    public function CuentasPlataforma()
    {
        return $this->belongsTo(CuentasPlataforma::class,'idCuentaPlataforma','idCuentaPlataforma');
    }
    
    public function Usuario()
    {
        return $this->belongsTo(Usuario::class,'idUser','idUser');
    }
    
    public function Producto()
    {
        return $this->belongsTo(Producto::class,'idProducto','idProducto');
    }

    /**
     * Obtener las relaciones del modelo.
     */
    
}