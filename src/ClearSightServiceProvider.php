<?php

namespace Camrymps\ClearSight;

use Illuminate\Support\ServiceProvider;

class ClearSightServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish migration(s)
        $this->publishes([
            \dirname(__DIR__) . '/migrations' => database_path('migrations'),
        ], 'migrations');

        // Load migration(s)
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(\dirname(__DIR__) . '/migrations');
        }
    }
}
