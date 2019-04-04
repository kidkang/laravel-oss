<?php

namespace Kd\Oss;

use Illuminate\Support\ServiceProvider;

class OssServiceProvider extends ServiceProvider
{

    /**
     * 是否延时加载提供器。
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->publishes([
            __DIR__ . '/config.php' => config_path('alioss.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('oss', function ($app) {
            return new Oss($app['config']);
        });
    }
    /**
     * 获取提供器提供的服务。
     *
     * @return array
     */
    public function provides()
    {
        return ['oss'];
    }
}
