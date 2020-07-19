<?php

namespace mergimuka\AHVValidator;

use Illuminate\Support\ServiceProvider;

class AHVValidatorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ahvvalidator.php', 'ahvvalidator');

        // Register the service the package provides.
        $this->app->singleton('ahvvalidator', function ($app) {
            return new AHVValidator;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ahvvalidator'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/ahvvalidator.php' => config_path('ahvvalidator.php'),
        ], 'ahvvalidator.config');
    }
}
