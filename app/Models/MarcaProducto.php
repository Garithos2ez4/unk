<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarcaProducto extends Model
{
 
    protected $table = 'MarcaProducto';

    protected $guarded = ['idMarca'];
    
    protected $fillable = ['nombreMarca',
                            'imagenMarca',
                            'slugMarca'
                            ];

    
    protected $hidden = [
    ];

    
    protected $casts = [
        'idMarca' => 'int'
    ];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($marca) {
            $marca->slugMarca = Str::slug($marca->nombreMarca);
        });

        static::updating(function ($marca) {
            $marca->slugMarca = Str::slug($marca->nombreMarca);
        });
    }

    /**
     * Obtener las relaciones del modelo.
     */
    public function Producto()
    {
        return $this->hasMany(Producto::class,'idMarca','idMarca');
    }
    
    public function imagenEncode(){
        return base64_encode($this->imagenMarca);
    }
    
    public function marcasFilter($listProducto,$listMarcas){
        $marcas = array();
        
        foreach ($listMarcas as $marca) {
            foreach ($listProducto as $producto) {
                if ($producto->idMarca == $marca->idMarca) {
                    $found = false;
                    foreach ($marcas as $pmarca) {
                        if ($pmarca->idMarca == $marca->idMarca) {
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $marcas[] = $marca;
                    }
                    break;
                }
            }
        }
        
        return $marcas;
    }
    
}