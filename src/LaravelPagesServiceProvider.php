<?php

namespace Appoly\LaravelPages;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;


class LaravelPagesServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/appoly/laravel-pages'), 
        ], 'public');

        $this->publishes([
            __DIR__ . '/../config/laravel_pages.php' => config_path('laravel_pages.php'),
        ], 'laravel-pages-config');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravel-pages');
    }
    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel_pages.php',
            'laravel_pages'
        );
    }
}
