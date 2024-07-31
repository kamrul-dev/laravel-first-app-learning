<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // binding for facades
        app()->bind("jogfol", function () {
            return new \App\Repositories\Jogfol;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
