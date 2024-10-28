<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristicas extends Model
{
 
    protected $table = 'Caracteristicas';
    
    protected $primaryKey = 'idCaracteristica';

    protected $guarded = ['idCaracteristica'];
    
    protected $fillable = ['especificacion'
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idCaracteristica' => 'int'
    ];

    /**
     * Obtener las relaciones del modelo.
     */
     
    public function Caracteristicas_Producto()
    {
        return $this->hasMany(Caracteristicas_Producto::class,'idCaracteristica','idCaracteristica');
    }
}