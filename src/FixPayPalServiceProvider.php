<?php

namespace phpcodertop\FixPayPal;

use Illuminate\Support\ServiceProvider;

class FixPayPalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('FixPayPal',function (){
            return new PayPalFixer();
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
