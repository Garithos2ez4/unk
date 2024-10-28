<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\TipoProducto;
use App\Models\MarcaProducto;
use App\Models\Empresa;
use App\Models\EmpresaRedSocial;
use App\Models\RedSocial;
use App\Models\Calculadora;
use App\Models\registroUpdate;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\DB as Database;

class HeaderService
{
    private static  $id = 2;
    
    public function obtenerEmpresa()
    {
        return Empresa::where('idEmpresa', self::$id)->first();
    }

    public function obtenerCategorias()
    {
        return CategoriaProducto::select('idCategoria','slugCategoria','nombreCategoria')->get();
    }
    
    public function obtenerMarcas()
    {
        return MarcaProducto::select('idMarca','nombreMarca','imagenMarca','slugMarca')->orderBy('nombreMarca','asc')->get();
    }
    
    public function obtenerTipo()
    {
        return TipoProducto::select('idTipoProducto','tipoProducto','slugTipo')->get();
    }
    
    public function obtenerLinkRedes(){
        $red = DB::select('CALL sp_get_linksxempresa(?)', [self::$id]);
        return $red;
    }
    
   public function getApiDolar() {
       
       $fecha = date("Y-m-d");

        // Configuración del cliente Guzzle
        $client = new Client([
            'base_uri' => 'https://api.apis.net.pe',
            'verify' => false, // Deshabilita la verificación SSL (ajustar en producción)
        ]);
        
        // Token de autenticación
        $token = 'apis-token-9519.CtzX-NCD9Ejr-S-6oxsV2gMlV06VeMNH';
        
        // Parámetros de la solicitud
        $parameters = [
        'http_errors' => false,
        'connect_timeout' => 5,
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'Referer' => 'https://apis.net.pe/api-sunat-tipo-de-cambio',
            'User-Agent' => 'laravel/guzzle',
            'Accept' => 'application/json',
        ],
        'query' => ['fecha' => (string)$fecha], // Parámetro de fecha
        ];
    
        try {
            // Realizar la solicitud GET
            $response = $client->request('GET', '/v2/sunat/tipo-cambio', $parameters);
    
            // Verificar el código de estado de la respuesta
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                // Obtener y decodificar el cuerpo de la respuesta JSON
                $data = json_decode($response->getBody()->getContents(), true);
    
                // Retornar el precio de compra formateado
                return number_format($data['precioVenta'], 2, '.', '');
            } else {
                // Manejar otros códigos de estado si es necesario
                return null;
            }
        } catch (RequestException $e) {
            // Capturar errores de Guzzle (por ejemplo, tiempo de conexión agotado)
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $reason = $e->getResponse()->getReasonPhrase();
                echo "Error HTTP $statusCode: $reason";
            } else {
                echo 'Error de conexión: ' . $e->getMessage();
            }
        } catch (Exception $e) {
            // Capturar y manejar otras excepciones
            echo 'Excepción capturada: ' . $e->getMessage();
        }
    
        return null; // Manejo de retorno en caso de error
    }
    
    function updateTipoCambio($backup){
        $switch = false;
        $horaActual = date("H:i:s");
        $fechaActual = now()->format('Y-m-d');
        $lastUpdate = registroUpdate::where('columna','=','tasaCambio')->first();
        
        if (!empty($lastUpdate) && isset($lastUpdate->ultimaFecha)) {
            if ($lastUpdate->ultimaFecha->format('Y-m-d') != $fechaActual && $horaActual > '10:30:00') {
                $switch = true;
            }
        }
        
        if($switch){
            $tc = $this->getApiDolar();
            if($tc != null){
                $calculadora = Calculadora::where('idCalculadora', 1)->first();
                $calculadora->tasaCambio = $tc;
                
                $calculadora->save();
                
                $registro = registroUpdate::where('columna','=','tasaCambio')->first();
                $registro->ultimaFecha = now();
                $registro->save();
                //$update = Database::select('CALL sp_update_tipocambio(?)',[$tc]);
            }else{
                $calculadora = Calculadora::where('idCalculadora', 1)->first();
                $calculadora->tasaCambio = $backup;
                
                $calculadora->save();
                
                $registro = registroUpdate::where('columna','=','tasaCambio')->first();
                $registro->ultimaFecha = now();
                $registro->save();
                //$update = Database::select('CALL sp_update_tipocambio(?)',[$backup]);
            }
        }
    }
    
    function obtenerCambioDolar(){
        $calculadora = Calculadora::where('idCalculadora', 1)->first();
        $this->updateTipoCambio($calculadora->tasaCambio);
        return $calculadora->tasaCambio;
    }
    
   
}
