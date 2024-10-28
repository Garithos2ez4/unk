<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RangoPrecio extends Model
{
 
    protected $table = 'RangoPrecio';
    
    protected $primaryKey = 'idRango';

    protected $guarded = ['idRango'];
    
    protected $fillable = ['rangoMin',
                            'rangoMax',
                            'descripcion',
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idRango' => 'int',
        'rangoMin' => 'float',
        'rangoMax' => 'float'
    ];

    /**
     * Obtener las relaciones del modelo.
     */
    public function Comision()
    {
        return $this->hasMany(Comision::class, 'idRango', 'idRango');
    }
}