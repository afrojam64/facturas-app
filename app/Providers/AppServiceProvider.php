<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ClienteServiceInterface;
use App\Contracts\ProductoServiceInterface;
use App\Contracts\VentaServiceInterface;
use App\Contracts\FacturaServiceInterface;
use App\Services\ClienteService;
use App\Services\ProductoService;
use App\Services\VentaService;
use App\Services\FacturaService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClienteServiceInterface::class, ClienteService::class);
        $this->app->bind(ProductoServiceInterface::class, ProductoService::class);
        $this->app->bind(VentaServiceInterface::class, VentaService::class);
        $this->app->bind(FacturaServiceInterface::class, FacturaService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}