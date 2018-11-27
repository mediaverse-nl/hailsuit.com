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


Route::group(['middleware' => ['web', 'language']], function () {

    Route::get('/', 'HomeController')->name('home');
    Route::get('/home', 'HomeController');

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::get('products', 'ProductController@index')->name('product.index');
    Route::get('p-{id}/{title?}', 'ProductController@show')->name('product.show');

    Route::get('shopping-cart', 'CartController@index')->name('cart.index');
    Route::get('shopping-cart/create', 'CartController@create')->name('cart.create');
    Route::post('shopping-cart/{id}/{units?}', 'CartController@store')->name('cart.store');
    Route::patch('shopping-cart/update', 'CartController@update')->name('cart.update');
    Route::delete('shopping-cart/{id?}', 'CartController@destroy')->name('cart.destroy');

    Route::post('order', 'OrderController@store')->name('order.store');
    Route::get('order/{id}', 'OrderController@show')->name('order.show');

    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::post('contact', 'ContactController@store')->name('contact.store');

    Route::get('algemene-voorwaarden', 'PageController@terms')->name('page.terms');
    Route::get('privacy-policy', 'PageController@privacy')->name('page.privacy');
    Route::get('cookies', 'PageController@cookie')->name('page.cookie');
    Route::get('warranty', 'PageController@warranty')->name('page.warranty');
    Route::get('returns', 'PageController@returns')->name('page.returns');
    Route::get('delivery', 'PageController@delivery')->name('page.delivery');
    Route::get('faq', 'PageController@faq')->name('page.faq');

    Route::get('app/download', 'PageController@app')->name('page.app');

    Route::post('mollie-webhook', 'WebhookController@mollie')->name('webhook.mollie');
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
//Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
//Route::post('register', ['as' => '', 'uses' => 'Auth\RegisterController@register']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'DashboardController')->name('dashboard');
        Route::get('dashboard', 'DashboardController');
        Route::resource('property', 'PropertyController', ['only' => ['store', 'destroy']]);
        Route::resource('type', 'TypeController', ['only' => ['store', 'destroy']]);
        Route::resource('detail', 'DetailController');
        Route::resource('brand', 'BrandController');
        Route::resource('body', 'BodyController');
        Route::resource('product', 'ProductController');
        Route::resource('faq', 'FAQController');
        Route::post('product/add-stock', 'ProductController@addStock')->name('product.addStock');
        Route::post('product/added-stock', 'ProductController@addedStock')->name('product.addedStock');
        Route::resource('order', 'OrderController');
        Route::resource('text-editor', 'TextController');
        Route::resource('seo-manager', 'SEOController');
        Route::get('file-manager', 'FileManagerController@index')->name('file-manager.index');
        Route::get('pdf/streamInvoice/{id}', 'PDFController@streamInvoice')->name('pdf.streamInvoice');
        Route::get('pdf/downloadInvoice{id}', 'PDFController@downloadInvoice')->name('pdf.downloadInvoice');
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

//    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
////        \UniSharp\LaravelFilemanager\Lfm::routes();
//    });
});

