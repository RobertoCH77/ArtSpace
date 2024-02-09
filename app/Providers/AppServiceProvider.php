<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Ejecutar php artisan storage:link durante cada despliegue
        if (app()->environment('production')) {
            $this->app->booted(function () {
                Storage::makeDirectory('public');
                if (!Storage::exists('public/storage')) {
                    Artisan::call('storage:link');
                }
            });
        }
    }
}
