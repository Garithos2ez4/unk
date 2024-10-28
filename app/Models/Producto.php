<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Services\PreciosService;

class Producto extends Model
{
    public $timestamps = false;
 
    protected $table = 'Producto';
    
    protected $primaryKey = 'idProducto';

    protected $guarded = ['idProducto'];
    
    protected $fillable = ['idProducto',
                            'idMarca',
                            'idGrupo',
                            'nombreProducto',
                            'codigoProducto',
                            'UPC',
                            'partNumber',
                            'numeroSerie',
                            'modelo',
                            'precioDolar',
                            'gananciaExtra',
                            'stockTienda',
                            'stockColombia',
                            'stockProveedor',
                            'idProveedor',
                            'garantia',
                            'descripcionProducto',
                            'imagenProducto1',
                            'imagenProducto2',
                            'imagenProducto3',
                            'imagenProducto4',
                            'estadoProductoWeb',
                            'slugProducto'
                            ];

    
    protected $hidden = [
        
    ];

    
    protected $casts = [
        'idProducto' => 'int',
        'idMarca' => 'int',
        'idGrupo' => 'int',
        'gananciaExtra' => 'float',
        'precioDolar' => 'float',
        'stockTienda' => 'int',
        'stockColombia' => 'int',
        'stockProveedor' => 'int',
        'idProveedor' => 'int'
    ];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($producto) {
            $producto->slugProducto = Str::slug($producto->nombreProducto);
        });

        static::updating(function ($producto) {
            $producto->slugProducto = Str::slug($producto->nombreProducto);
        });
    }
    
    public function Publicacion()
    {
        return $this->hasMany(Publicacion::class, 'idProducto', 'idProducto');
    }

    public function MarcaProducto()
    {
        return $this->belongsTo(MarcaProducto::class,'idMarca','idMarca');
    }
    
    public function GrupoProducto()
    {
        return $this->belongsTo(GrupoProducto::class, 'idGrupo', 'idGrupoProducto');
    }
    
    public function Preveedor()
    {
        return $this->belongsTo(Preveedor::class, 'idProveedor', 'idProveedor');
    }
    
    public function Caracteristicas_Producto()
    {
        return $this->hasMany(Caracteristicas_Producto::class,'idProducto','idProducto');
    }
    
    public function precioTotalDolar(){
        $price = new PreciosService();
        
        return number_format($price->getPrecioTotal($this->precioDolar,$this->idGrupo,'DOLAR',$this->estadoProductoWeb,$this->gananciaExtra), 1, '.', ',')."0";
    }
    
    public function precioTotalSol(){
        $price = new PreciosService();
        return number_format($price->getPrecioTotal($this->precioDolar,$this->idGrupo,'SOL',$this->estadoProductoWeb,$this->gananciaExtra), 1, '.', ',')."0";
    }
    
    public function publicImages(){
        
            $default = asset('storage/noimagen.webp');
    
            $imagen1 = $this->imagenProducto1 ? asset('storage/'.$this->imagenProducto1) : $default;
            $imagen2 = $this->imagenProducto2 ? asset('storage/'.$this->imagenProducto2) : $default;
            $imagen3 = $this->imagenProducto3 ? asset('storage/'.$this->imagenProducto3) : $default;
            $imagen4 = $this->imagenProducto4 ? asset('storage/'.$this->imagenProducto4) : $default;
    
            $images = [$imagen1, $imagen2, $imagen3, $imagen4];
            
    
        return $images;
    }
    
    public function estadoColor(){
        switch($this->estadoProductoWeb){
            case 'DISPONIBLE':
                return 'text-success';
            case 'OFERTA':
                return 'text-oferta';
            case 'AGOTADO':
                return 'text-agotado text-decoration-line-through';
            case 'DESCONTINUADO':
                return 'text-dark text-decoration-line-through';
            default:
                return 'text-dark';
        }
    }
    
    public function displayImg($img){
        if($img == "asset('storage/images/noimagen.webp')"){
            return "d-none";
        }else{
            return "";
        }
    }
}