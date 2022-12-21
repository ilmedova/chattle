<?php
namespace Ilmedova\Chattle;

use Illuminate\Support\ServiceProvider;


class ChatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ .'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'chattle');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([__DIR__.'/public' => public_path(),], 'public');

    }

    public function register()
    {
        
    }
}
