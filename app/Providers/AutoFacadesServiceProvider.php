<?php

namespace App\Providers;

use App\Libraries\Auto\Garage;
use Illuminate\Support\ServiceProvider;

class AutoFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('auto.garage', function () {
            return new Garage();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
