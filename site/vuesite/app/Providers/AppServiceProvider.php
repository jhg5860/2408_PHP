<?php

namespace App\Providers;

use App\Utils\MyEncrypt;
use Illuminate\Support\ServiceProvider;
use App\Utils\MyToken;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('MyEncrypt', function(){
        return new MyEncrypt();
       });
       
       $this->app->bind('MyToken', function(){
        return new MyToken();
       });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
