<?php

namespace OnlineMarket\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use Illuminate\Support\Facades\Route;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
    *
    * @return void
    */
    public function register()
    {

    }

    public function boot()
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../routes/api.php');

    }
}