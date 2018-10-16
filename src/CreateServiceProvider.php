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
        mkdir(app_path('Http/Services')); 
        $this->publishes([
            __DIR__.'/Services/Service.php' => app_path('Http/Services/Service.php'),
            __DIR__.'/Commands/MakeServices.php' => app_path('Console/Commands/MakeServices.php'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}