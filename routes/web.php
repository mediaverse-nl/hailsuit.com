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

    Auth::routes();

    Route::get('home', 'HomeController@index')->name('home');

    Route::get('/{locale}/test', function () {
        return view('welcome');
    });

    Route::get('product', 'ProductController@index')->name('product.index');
    Route::get('product/{id}', 'ProductController@show')->name('product.show');

    Route::get('shopping-cart', 'ContactController@index')->name('cart.index');

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