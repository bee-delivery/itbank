<?php

namespace BeeDelivery\ItBank\Services;

use Illuminate\Support\ServiceProvider;
use BeeDelivery\ItBank\ItBank;

class ItBankServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/itbank.php' => config_path('itbank.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/itbank.php', 'itbank');


        // Register the service the package provides.
        $this->app->singleton('itbank', function ($app) {
            return new ItBank;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['itbank'];
    }
}
