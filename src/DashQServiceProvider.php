<?php

namespace TonySong\DashQ;

use Illuminate\Support\ServiceProvider;

class DashQServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tonysong');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'tonysong');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/dashq.php' => config_path('dashq.php'),
            ], 'dashq.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/tonysong'),
            ], 'dashq.views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/assets/app.css' => public_path('tonysong/dashq'),
            ], 'dashq.assets');
            $this->publishes([
                __DIR__.'/../resources/assets/app.js' => public_path('tonysong/dashq'),
            ], 'dashq.assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/tonysong'),
            ], 'dashq.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dashq.php', 'dashq');

        // Register the service the package provides.
        $this->app->singleton('dashq', function ($app) {
            return new DashQ;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['dashq'];
    }
}
