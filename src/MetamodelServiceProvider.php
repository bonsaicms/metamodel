<?php

namespace BonsaiCms\Metamodel;

use Illuminate\Support\ServiceProvider;

class MetamodelServiceProvider extends ServiceProvider
{
    /**
     * Register package.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bonsaicms-metamodel.php', 'bonsaicms-metamodel'
        );
    }

    /**
     * Bootstrap package.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/bonsaicms-metamodel.php' => config_path('bonsaicms-metamodel.php'),
        ], 'bonsaicms-metamodel-config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'bonsaicms-metamodel-migrations');
    }
}
