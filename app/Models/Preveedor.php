<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preveedor extends Model
{
 
    protected $table = 'Preveedor';

    protected $guarded = ['idProveedor'];
    
    protected $fillable = ['nombreProveedor',
                            'razSocialProveedor',
                            'rucProveedor'
                            ];

    
    protected $hidden = [
    ];

    
    protected $casts = [
        'idProveedor' => 'int'
    ];

    /**
     * Obtener las relaciones del modelo.
     */
    public function Producto()
    {
        return $this->hasMany(Producto::class,'idProveedor','idProveedor');
    }
    
    
    
}