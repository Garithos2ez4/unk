<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
 
    protected $table = 'Publicidad';

    protected $guarded = ['idPublicidad'];
    
    protected $fillable = ['idPublicidad',
                            'descripcionPublicidad',
                            'imagenPublicidad',
                            'tipoPublicidad',
                            'estadoPublicidad',
                            'idEmpresa'
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idPublicidad' => 'int',
        'idEmpresa' => 'int'
    ];
    
     public function Empresa()
    {
        return $this->belongsTo(Empresa::class,'idEmpresa','idEmpresa');
    }

}