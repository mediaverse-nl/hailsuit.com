<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Hashids\Hashids;
use Illuminate\Support\Facades\Validator;


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

        Validator::extend('check_array', function ($attribute, $value, $parameters, $validator) {
            return count(
                array_filter($value, function($var) use ($parameters)
                {
                    return ( $var && $var >= $parameters[0]);
                })
            );
        }, 'one must be filled');

        Validator::replacer('check_array', function($message, $attribute, $rule, $parameters){
            return str_replace(':foo', $parameters[0], $message);
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
