<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristicas_Producto extends Model
{
    protected $table = 'Caracteristicas_Producto';
    protected $primaryKey = ['idCaracteristica', 'idProducto'];
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

    protected $guarded = ['idCaracteristica','idProducto'];
    
    protected $fillable = ['caracteristicaProducto',
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idCaracteristica' => 'int',
        'idProducto' => 'int',
    ];
    
     public function Caracteristicas()
    {
        return $this->belongsTo(Caracteristicas::class,'idCaracteristica','idCaracteristica');
    }
    
     public function Producto()
    {
        return $this->belongsTo(Producto::class,'idProducto','idProducto');
    }
    

    /**
     * Obtener las relaciones del modelo.
     */
    
}