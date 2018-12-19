<?php

namespace Yuner\Sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/sms.php' => config_path('sms.php')], 'sms');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sms',function(){
            return new SmsApi(config('sms.username'),config('sms.password'));
        });
    }
}
