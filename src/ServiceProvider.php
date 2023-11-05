<?php

namespace Bfg\AdminMetronicTheme;

use Admin\Facades\AdminFacade;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        AdminFacade::addTheme(MetronicTheme::class);
    }

    public function boot()
    {
        /**
         * Register publishers assets.
         */
        $this->publishes([
            __DIR__.'/../assets' => public_path('/metronic'),
        ], ['metronic-theme-assets']);
    }
}

