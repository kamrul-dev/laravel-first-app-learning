<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // service container
        // Providers --> AppServiceProvider.php
        app()->bind("first_service_helper", function ($app) {
            dd("This is my first service container");
        });

        app()->bind("second_service_helper", function ($app) {
            dd("This is my second service container");
        });

        app()->bind("third_service_helper", function ($app) {
            dd("This is my third service container");
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
