<?php

namespace Tierlist\System;

use Illuminate\Support\ServiceProvider;

class TierlistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Tierlist\System\ArticlesController');
        $this->loadViewsFrom(__DIR__.'/views', 'tierlist');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
    }
}
