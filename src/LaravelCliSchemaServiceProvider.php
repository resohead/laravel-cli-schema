<?php

namespace Resohead\LaravelCliSchema;

use Illuminate\Support\ServiceProvider;
use Resohead\LaravelCliSchema\Commands\SchemaTableCommand;

class LaravelCliSchemaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                SchemaTableCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
