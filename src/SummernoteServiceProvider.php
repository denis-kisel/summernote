<?php

namespace DenisKisel\Summernote;

use Illuminate\Support\ServiceProvider;

class SummernoteServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'dksummernote');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/summernote.php', 'summernote');

        // Register the service the package provides.
        $this->app->singleton('summernote', function ($app) {
            return new Summernote;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['summernote'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/deniskisel'),
        ], 'summernote.views');
    }
}
