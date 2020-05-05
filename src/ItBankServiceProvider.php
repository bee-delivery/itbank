<?php

namespace BeeDelivery\ItBank;

use Illuminate\Support\ServiceProvider;

class ItBankServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/itbank.php', 'itbank');

        // Register the service the package provides.
        $this->app->singleton('itbank', function ($app) {
            return new ItBank;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/itbank.php' => config_path('itbank.php'),
        ]);
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
