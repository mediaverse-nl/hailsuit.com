<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Hashids\Hashids;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Socialite::extend('mollie', function ($app) {
            $config = $app['config']['services.mollie'];

            return Socialite::buildProvider('Mollie\Laravel\MollieConnectProvider', $config);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(Hashids::class, function () {
//            return new Hashids(env('HASHIDS_SALT'), 10);
//        });

//        Route::bind('id', function ($id) {
//            $hashids = new Hashids();
//
////            return 'test';
//            return $hashids->decode(1);
//        });
    }
}
