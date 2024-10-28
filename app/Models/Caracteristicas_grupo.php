<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristicas_grupo extends Model
{
 
    protected $table = 'Caracteristicas_grupo';
    protected $primaryKey = ['idCaracteristica', 'idGrupoProducto'];
    public $incrementing = false;
    protected $keyType = 'int';
    
    public function getKeyName()
    {
        return $this->primaryKey;
    }

    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $key) {
            $query->where($key, '=', $this->getAttribute($key));
        }

        return $query;
    }

    protected $guarded = ['idCaracteristica','idGrupoProducto'];
    
    protected $fillable = [
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idCaracteristica' => 'int',
        'idGrupoProducto' => 'int',
    ];
    
     public function Caracteristicas()
    {
        return $this->belongsTo(Caracteristicas::class,'idCaracteristica','idCaracteristica');
    }
    
     public function GrupoProducto()
    {
        return $this->belongsTo(GrupoProducto::class,'idGrupoProducto','idGrupoProducto');
    }
    

    /**
     * Obtener las relaciones del modelo.
     */
    
}