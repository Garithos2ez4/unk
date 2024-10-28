<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    public $timestamps = false;
 
    protected $table = 'Plataforma';
    
    protected $primaryKey = 'idPlataforma';

    protected $guarded = ['idPlataforma'];
    
    protected $fillable = ['nombrePlataforma',
                            'tipoPlataforma',
                            'imagenPlataforma'
                            ];

    
    protected $hidden = [
    ];

    
    protected $casts = [
        'idPlataforma' => 'int'
    ];

    /**
     * Obtener las relaciones del modelo.
     */
    public function CuentasPlataforma()
    {
        return $this->hasMany(CuentasPlataforma::class,'idPlataforma','idPlataforma');
    }
    
}