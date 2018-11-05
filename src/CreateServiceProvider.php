<?php

namespace getsolaris\LaravelCreateService;

use Illuminate\Support\ServiceProvider;

class CreateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.getsolaris.makeservice', function ($app) {
            return $app['getsolaris\LaravelCreateService\Commands\MakeServices'];
        });
        $this->commands('command.getsolaris.makeservice');
    }
}