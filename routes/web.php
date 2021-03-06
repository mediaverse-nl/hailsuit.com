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


use App\Order;
use UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder;
use UniSharp\LaravelFilemanager\Middlewares\MultiUser;

Route::group(['middleware' => ['web', 'language']], function () {

    Route::get('/', 'HomeController')->name('home');
    Route::get('/home', 'HomeController');

    Route::get('products', 'ProductController@index')->name('product.index');
    Route::get('p-{id}/{title?}', 'ProductController@show')->name('product.show');

    Route::get('shopping-cart', 'CartController@index')->name('cart.index');
    Route::get('shopping-cart/order', 'CartController@create')->name('cart.create');
    Route::post('shopping-cart/{id}/{units?}', 'CartController@store')->name('cart.store');
    Route::patch('shopping-cart/update', 'CartController@update')->name('cart.update');
    Route::delete('shopping-cart/{id?}', 'CartController@destroy')->name('cart.destroy');

    Route::post('order', 'OrderController@store')->name('order.store');
    Route::get('order/{id}', 'OrderController@show')->name('order.show');

    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::post('contact', 'ContactController@store')->name('contact.store');

    Route::get('terms-and-conditions', 'PageController@terms')->name('page.terms');
    Route::get('privacy-policy', 'PageController@privacy')->name('page.privacy');
    Route::get('cookies', 'PageController@cookie')->name('page.cookie');
    Route::get('warranty', 'PageController@warranty')->name('page.warranty');
    Route::get('returns', 'PageController@returns')->name('page.returns');
    Route::get('delivery', 'PageController@delivery')->name('page.delivery');
    Route::get('faq', 'PageController@faq')->name('page.faq');

    Route::get('app/download', 'PageController@app')->name('page.app');

    Route::post('mollie-webhook', 'WebhookController@mollie')->name('webhook.mollie');
});

Route::get('invoice/pdf/{id}', function ($id = 1){
    $orders = new Order;

    $order = $orders->findOrFail($id);
    $data = [
        'order' => $order
    ];
    $pdf = PDF::loadView('pdf.invoice', $data);
    return $pdf->stream();

//    return $pdf->loadView('pdf.invoice');
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
        Route::resource('type', 'TypeController', ['only' => ['store', 'destroy', 'edit', 'update']]);
        Route::resource('detail', 'DetailController');
        Route::resource('brand', 'BrandController');
        Route::resource('body', 'BodyController');
        Route::resource('product', 'ProductController');
        Route::resource('faq', 'FAQController');
        Route::get('translator/{id}-{type}/edit', 'TranslatorController@edit')->name('translator.edit');
        Route::patch('translator/{id}/edit', 'TranslatorController@update')->name('translator.update');
        Route::post('product/add-stock', 'ProductController@addStock')->name('product.addStock');
        Route::post('product/added-stock', 'ProductController@addedStock')->name('product.addedStock');
        Route::resource('order', 'OrderController');
        Route::patch('text-editor/{id}/update', 'TextController@update')->name('text-editor.update');
        Route::resource('text-editor', 'TextController', ['only' => ['index', 'edit']]);
        Route::resource('seo-manager', 'SEOController');
        Route::get('file-manager', 'FileManagerController@index')->name('file-manager.index');
        Route::get('pdf/streamInvoice/{id}', 'PDFController@streamInvoice')->name('pdf.streamInvoice');
        Route::get('pdf/downloadInvoice{id}', 'PDFController@downloadInvoice')->name('pdf.downloadInvoice');
    });
});

Route::group(['prefix' => 'admin/laravel-filemanager', 'middleware' => ['auth']], function () {
    $middleware = [ CreateDefaultFolder::class, MultiUser::class ];
    $as = 'unisharp.lfm.';

    Route::group(compact('middleware', 'as'), function () {
        $namespace = '\\UniSharp\\LaravelFilemanager\\Controllers\\';

        // display main layout
        Route::get('/', ['uses' => $namespace . 'LfmController@show', 'as' => 'show']);
        // display integration error messages
        Route::get('/errors', ['uses' => $namespace . 'LfmController@getErrors', 'as' => 'getErrors']);
        // upload
        Route::any('/upload', ['uses' => $namespace . 'UploadController@upload', 'as' => 'upload']);
        // list images & files
        Route::get('/jsonitems', ['uses' => $namespace . 'ItemsController@getItems', 'as' => 'getItems']);
        Route::get('/move', ['uses' => $namespace . 'ItemsController@move', 'as' => 'move']);
        Route::get('/domove',['uses' => $namespace . 'ItemsController@domove', 'as' => 'domove']);
        // folders
        Route::get('/newfolder', ['uses' => $namespace . 'FolderController@getAddfolder', 'as' => 'getAddfolder',]);
        // list folders
        Route::get('/folders', ['uses' => $namespace . 'FolderController@getFolders', 'as' => 'getFolders']);
        // crop
        Route::get('/crop', ['uses' => $namespace . 'CropController@getCrop', 'as' => 'getCrop',]);
        Route::get('/cropimage', ['uses' => $namespace . 'CropController@getCropimage', 'as' => 'getCropimage',]);
        Route::get('/cropnewimage', ['uses' => $namespace . 'CropController@getNewCropimage', 'as' => 'getCropimage',]);
        // rename
        Route::get('/rename', ['uses' => $namespace . 'RenameController@getRename', 'as' => 'getRename']);
        // scale/resize
        Route::get('/resize', ['uses' => $namespace . 'ResizeController@getResize', 'as' => 'getResize']);
        Route::get('/doresize', ['uses' => $namespace . 'ResizeController@performResize', 'as' => 'performResize']);
        // download
        Route::get('/download', ['uses' => $namespace . 'DownloadController@getDownload', 'as' => 'getDownload']);
        // delete
        Route::get('/delete', ['uses' => $namespace . 'DeleteController@getDelete', 'as' => 'getDelete']);
    });
});

