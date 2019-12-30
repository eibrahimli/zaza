<?php

namespace App\Providers;

use App\Ayarlar;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend/*', function($view) {
           $setting = Ayarlar::first();

           $view->with('setting',$setting);
        });
        Schema::defaultStringLength(191);
        Artisan::call('schedule:run');
    }
}
