<?php

namespace Getsolaris\LaravelMakeService;

use Illuminate\Support\ServiceProvider;

class LaravelMakeServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->commands(MakeService::class);
    }
}
