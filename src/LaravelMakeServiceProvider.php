<?php

namespace Getsolaris\LaravelMakeService;

use Getsolaris\LaravelMakeService\Commands\MakeService;
use Illuminate\Support\ServiceProvider;

class LaravelMakeServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(MakeService::class);
    }
}
