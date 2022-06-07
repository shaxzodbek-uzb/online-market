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
        $this->mergeConfigFrom(
            __DIR__.'/../config/online-market.php', 'online-market'
        );
    }

    public function boot()
    {
        
        Route::middleware('api')
            ->prefix('api')
            ->group(__DIR__ . '/../routes/api.php');
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
        
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'online-market');
        $this->publishes([
            __DIR__.'/../config/online-market.php' => config_path('online-market.php'),
        ]);
    }
}