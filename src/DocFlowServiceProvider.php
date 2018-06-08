<?php

namespace JeroenG\DocFlow;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class DocFlowServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'jeroeng');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'jeroeng');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/docflow.php' => config_path('docflow.php'),
            ], 'docflow.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/jeroeng'),
            ], 'docflow.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/jeroeng'),
            ], 'docflow.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/jeroeng'),
            ], 'docflow.views');*/

            // Registering package commands.
            // $this->commands([]);

            Route::macro('routesToDocFlow', function () {
                return Route::group([
                    'prefix' => 'docflow',
                    'namespace' => 'JeroenG\\DocFlow\\Http\\Controllers',
                ], function () {
                    Route::get('review/{doc}/{user}', 'ReviewController@edit')->name('review')->middleware('signed');
                });
            });

            Event::subscribe(Ledger::class);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/docflow.php', 'docflow');

        // Register the service the package provides.
        $this->app->singleton('docflow', function ($app) {
            return new DocFlow;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['docflow'];
    }
}