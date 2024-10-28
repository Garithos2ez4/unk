<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoProducto extends Model
{
 
    protected $table = 'GrupoProducto';
    
    protected $primaryKey = 'idGrupoProducto';

    protected $guarded = ['idGrupoProducto','idCategoria','idTipoProducto'];
    
    protected $fillable = ['nombreGrupo',
                            'imagenGrupo',
                            'slugGrupo',
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idGrupoProducto' => 'int',
        'idCategoria' => 'int',
        'idTipoProducto' => 'int'
    ];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($grupo) {
            $grupo->slugGrupo = Str::slug($grupo->nombreGrupo);
        });

        static::updating(function ($grupo) {
            $grupo->slugGrupo = Str::slug($grupo->nombreGrupo);
        });
    }

    /**
     * Obtener las relaciones del modelo.
     */
    public function Producto()
    {
        return $this->hasMany(Producto::class, 'idGrupo', 'idGrupoProducto');
    }
    
    public function Comision()
    {
        return $this->hasMany(Comision::class, 'idGrupoProducto', 'idGrupoProducto');
    }
    
    public function CategoriaProducto()
    {
        return $this->belongsTo(CategoriaProducto::class,'idCategoria','idCategoria');
    }
    
    public function TipoProducto()
    {
        return $this->belongsTo(TipoProducto::class,'idTipoProducto','idTipoProducto');
    }
    
    public function Caracteristicas_grupo()
    {
        return $this->hasMany(Caracteristicas_grupo::class,'idGrupoProducto','idGrupoProducto');
    }
}