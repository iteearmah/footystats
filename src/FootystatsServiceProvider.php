<?php

namespace Iteearmah\Footystats;

use Illuminate\Support\ServiceProvider;
use Iteearmah\Footystats\Console\Commands\LeagueTableCommand;

class FootystatsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'footystats');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'footystats');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('footystats.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/footystats'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/footystats'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/footystats'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                LeagueTableCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'footystats');

        // Register the main class to use with the facade
        $this->app->singleton('footystats', function () {
            return new Footystats;
        });
    }
}
