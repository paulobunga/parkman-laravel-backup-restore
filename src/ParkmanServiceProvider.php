<?php

namespace Paulobunga\Parkman;

use Illuminate\Support\ServiceProvider;

class ParkmanServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'parkman');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'parkman');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('parkman.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../config/backup.php' => config_path('backup.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/parkman'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/parkman'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/parkman'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                \Paulobunga\Parkman\Commands\BackupCommand::class,
                \Paulobunga\Parkman\Commands\RestoreCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'parkman');

        // Register the main class to use with the facade
        $this->app->singleton('parkman', function () {
            return new Parkman;
        });

        $this->mergeConfigFrom(__DIR__.'/../config/filesystems.php', 'filesystems');

        $this->app->register(\Spatie\Backup\BackupServiceProvider::class);
    }
}
