<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MobileDetect\MobileDetect;

class MobileDetectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MobileDetect::class, function ($app) {
            return new MobileDetect();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}