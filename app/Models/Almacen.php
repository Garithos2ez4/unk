<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    public $timestamps = false;
 
    protected $table = 'Almacen';
    
    protected $primaryKey = 'idAlmacen';

    protected $guarded = ['idAlmacen'];
    
    protected $fillable = ['idAlmacen','descripcion'
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idAlmacen' => 'int'
    ];
    
    public function Inventario()
    {
        return $this->hasMany(Inventario::class,'idAlmacen','idAlmacen');
    }

    /**
     * Obtener las relaciones del modelo.
     */
    
}