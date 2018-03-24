<?php

namespace Echowebid\Bitly;

use Illuminate\Support\ServiceProvider;

class BitlyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap config
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bitly.php' => config_path('bitly.php'),
        ]);
    }

    /**
     * Register bindings in the container
     * @return void
     */
    public function register()
    {
        App::bind('Bitly', function()
        {
            return new Bitly;
        });
    }
}