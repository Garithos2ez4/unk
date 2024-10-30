<?php

namespace App\Providers;

use App\Repositories\CalculadoraRepository;
use App\Repositories\CalculadoraRepositoryInterface;
use App\Repositories\CategoriaProductoRepository;
use App\Repositories\CategoriaProductoRepositoryInterface;
use App\Repositories\CuentasTransferenciaRepository;
use App\Repositories\CuentasTransferenciaRepositoryInterface;
use App\Repositories\EmpresaRepository;
use App\Repositories\EmpresaRepositoryInterface;
use App\Repositories\GrupoProductoRepository;
use App\Repositories\GrupoProductoRepositoryInterface;
use App\Repositories\MarcaProductoRepository;
use App\Repositories\MarcaProductoRepositoryInterface;
use App\Repositories\ProductoRepository;
use App\Repositories\ProductoRepositoryInterface;
use App\Repositories\PublicidadRepository;
use App\Repositories\PublicidadRepositoryInterface;
use App\Repositories\registroUpdateRepository;
use App\Repositories\registroUpdateRepositoryInterface;
use App\Repositories\TipoProductoRepository;
use App\Repositories\TipoProductoRepositoryInterface;
use App\Services\CategoriaService;
use App\Services\CategoriaServiceInterface;
use App\Services\HeaderService;
use App\Services\HeaderServiceInterface;
use App\Services\HomeService;
use App\Services\HomeServiceInterface;
use App\Services\MedioDePagoService;
use App\Services\MedioDePagoServiceInterface;
use App\Services\PreciosService;
use App\Services\PreciosServiceInterface;
use App\Services\ProductoService;
use App\Services\ProductoServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmpresaRepositoryInterface::class,EmpresaRepository::class);
        $this->app->bind(CategoriaProductoRepositoryInterface::class,CategoriaProductoRepository::class);
        $this->app->bind(MarcaProductoRepositoryInterface::class,MarcaProductoRepository::class);
        $this->app->bind(TipoProductoRepositoryInterface::class,TipoProductoRepository::class);
        $this->app->bind(registroUpdateRepositoryInterface::class,registroUpdateRepository::class);
        $this->app->bind(CalculadoraRepositoryInterface::class,CalculadoraRepository::class);
        $this->app->bind(PublicidadRepositoryInterface::class,PublicidadRepository::class);
        $this->app->bind(ProductoRepositoryInterface::class,ProductoRepository::class);
        $this->app->bind(CuentasTransferenciaRepositoryInterface::class,CuentasTransferenciaRepository::class);
        $this->app->bind(GrupoProductoRepositoryInterface::class,GrupoProductoRepository::class);

        $this->app->bind(HeaderServiceInterface::class,HeaderService::class);
        $this->app->bind(HomeServiceInterface::class,HomeService::class);
        $this->app->bind(PreciosServiceInterface::class,PreciosService::class);
        $this->app->bind(MedioDePagoServiceInterface::class,MedioDePagoService::class);
        $this->app->bind(CategoriaServiceInterface::class,CategoriaService::class);
        $this->app->bind(ProductoServiceInterface::class,ProductoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
