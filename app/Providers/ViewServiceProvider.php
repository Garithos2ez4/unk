<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\PreciosServiceInterface;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(PreciosServiceInterface $preciosService)
    {
        // Compartir el servicio con todas las vistas
        View::share('preciosService', $preciosService);
    }
}