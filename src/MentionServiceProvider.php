<?php

namespace Dongm2ez\Mention;

use Illuminate\Support\ServiceProvider;

class MentionServiceProvider extends ServiceProvider
{
    /**
     * Application bootstrap event.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/mention.php' => config_path('mention.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}