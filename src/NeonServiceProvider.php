<?php 

namespace Tirtoid\Neon;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Tirtoid\Neon\Middleware\NeonAuth;

class NeonServiceProvider extends ServiceProvider
{
     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/config.php', 'neon' );
        app('router')->aliasMiddleware('neon', NeonAuth::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = $this->app['path.config'] . DIRECTORY_SEPARATOR . 'neon.php';
        $this->publishes([__DIR__ . '/config.php' => $configPath]);
        $this->publishes([__DIR__. '/views' => base_path('resources/views/neon')]);
        $this->publishes([__DIR__. '/Middleware' => base_path('app/Http/Middleware')]);

        $this->loadViewsFrom(__DIR__.'/views', 'neon');

        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

}