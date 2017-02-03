<?php

namespace Shimomo\Nicovideo;

use Illuminate\Support\ServiceProvider;

/**
 * @author shimomo
 */
class ApiServiceProvider extends ServiceProvider
{
    /**
     * プロバイダーのローディングを遅延
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * サービスプロバイダーの登録
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nicovideo', function ($app) {
            return new Api();
        });
    }

    /**
     * このプロバイダーにより提供されるサービス
     *
     * @return array
     */
    public function provides()
    {
        return ['nicovideo'];
    }
}
