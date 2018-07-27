<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'language'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home/{locale}', function () {
        return view('welcome');
    });

    Route::get('product', 'ProductController@index')->name('product.index');
    Route::get('product/{id}', 'ProductController@show')->name('product.show');

    Route::get('shopping-cart', 'CartController@index')->name('cart.index');
    Route::post('product/{id}', 'CartController@store')->name('cart.store');

    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::post('contact', 'ContactController@store')->name('contact.store');

    Route::get('algemene-voorwaarden', 'PageController@terms')->name('page.terms');
    Route::get('privacy-policy', 'PageController@privacy')->name('page.privacy');
    Route::get('cookies', 'PageController@cookie')->name('page.cookie');
    Route::get('warranty', 'PageController@warranty')->name('page.warranty');
    Route::get('returns', 'PageController@returns')->name('page.returns');
    Route::get('delivery', 'PageController@delivery')->name('page.delivery');
    Route::get('app/download', 'PageController@app')->name('page.app');

});

// Authentication Routes...
Route::get('login', 'Admin\LoginController@login')->name('login');
Route::post('login', ['as' => '', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Password Reset Routes...
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/reset', ['as' => '', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);

// Registration Routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => '', 'uses' => 'Auth\RegisterController@register']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'DashboardController');
        Route::get('dashboard', 'DashboardController')->name('dashboard');

        Route::resource('product', 'ProductController');
        Route::resource('orders', 'OrderController');

    });
});

