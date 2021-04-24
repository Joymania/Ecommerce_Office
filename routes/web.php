<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend;


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
Route::get('/front','Frontend\FrontendController@index');
//Admin Routing Starts
Route::get('/', function () { return redirect('dashboard/ecommerce'); });

/*Dashboard*/
Route::get('dashboard/ecommerce', 'Backend\DashboardController@ecommerce')->name('dashboard.ecommerce');

/* Authentication */
Route::get('authentication', function () { return redirect('authentication/login'); });
Route::get('authentication/login', 'Backend\AuthenticationController@login')->name('authentication.login');
Route::get('authentication/register', 'Backend\AuthenticationController@register')->name('authentication.register');
Route::get('authentication/lockscreen', 'Backend\AuthenticationController@lockscreen')->name('authentication.lockscreen');
Route::get('authentication/forgot-password', 'Backend\AuthenticationController@forgotPassword')->name('authentication.forgot-password');
Route::get('authentication/page404', 'Backend\AuthenticationController@page404')->name('authentication.page404');
Route::get('authentication/page403', 'Backend\AuthenticationController@page403')->name('authentication.page403');
Route::get('authentication/page500', 'Backend\AuthenticationController@page500')->name('authentication.page500');
Route::get('authentication/page503', 'Backend\AuthenticationController@page503')->name('authentication.page503');

/*Profile Page*/
Route::get('pages/profile1', 'Backend\PagesController@profile1')->name('pages.profile1');

/*Products Routes*/
Route::prefix('products')->group(function () {

    Route::get('/list','Backend\ProductsController@index')->name('products.list');
    Route::get('/create','Backend\ProductsController@create')->name('products.create');

    //Size CRUD Routes
    Route:: get('/size/list','Backend\SizeController@productSizeList')->name('products.sizes');
    Route::get('/size/create','Backend\SizeController@createSize')->name('products.size.create');
    Route::post('/size/create','Backend\SizeController@storeSize')->name('product.size.store');
    Route::get('/size/{size}/edit','Backend\SizeController@editSize')->name('products.size.edit');
    Route::patch('/size/{size}/update','Backend\SizeController@updateSize')->name('products.size.update');
    Route::delete('/size/{size}/delete','Backend\SizeController@destroySize')->name('products.size.delete');


    // Get products by id
    Route::get('/{id}','Backend\ProductsController@getProductById')->name('products.jsonbyid');

});


Route::prefix('/tags')->group(function (){
    Route::get('/list','Backend\TagsController@index')->name('tags.list');
    Route::get('/create','Backend\TagsController@create')->name('tags.create');
    Route::post('/create','Backend\TagsController@store')->name('tags.store');
    Route::get('/{tag}/edit', 'Backend\TagsController@edit')->name('tags.edit');
    Route::patch('/{tag}/update', 'Backend\TagsController@update')->name('tags.update');
    Route::delete('/{tag}/delete', 'Backend\TagsController@destroy')->name('tags.delete');
});

//Admin Routing Ends

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Product Purchases Routes*/
Route::name('purchase.')->prefix('purchases')->group(function () {
    // Product Purchase
    Route::get('/create','Backend\ProductPurchaseController@create')->name('add');
    Route::post('/store','Backend\ProductPurchaseController@store')->name('store');
});


Route::prefix('brand')->group(function () {
    Route::get('/view','Backend\BrandController@view')->name('brand.view');
    Route::get('/add','Backend\BrandController@add')->name('brand.add');
    Route::post('/store','Backend\BrandController@store')->name('brand.store');
    Route::get('/edit/{id}','Backend\BrandController@edit')->name('brand.edit');
    Route::post('/update/{id}','Backend\BrandController@update')->name('brand.update');
    Route::get('/delete/{id}','Backend\BrandController@delete')->name('brand.delete');
});

Route::prefix('color')->group(function () {
    Route::get('/view','Backend\ColorController@view')->name('color.view');
    Route::get('/add','Backend\ColorController@add')->name('color.add');
    Route::post('/store','Backend\ColorController@store')->name('color.store');
    Route::get('/edit/{id}','Backend\ColorController@edit')->name('color.edit');
    Route::post('/update/{id}','Backend\ColorController@update')->name('color.update');
    Route::get('/delete/{id}','Backend\ColorController@delete')->name('color.delete');
});


Route::prefix('admin')->group(function () {
    Route::get('users', 'Backend\UserController@index')->name('users.index');

Route::prefix('slider')->group(function(){
    Route::get('/view','Backend\SliderController@view')->name('slider.view');
    Route::get('/add','Backend\SliderController@add')->name('slider.add');
    Route::post('/store','Backend\SliderController@store')->name('slider.store');
    Route::get('/edit/{id}','Backend\SliderController@edit')->name('slider.edit');
    Route::post('/update/{id}','Backend\SliderController@update')->name('slider.update');
    Route::get('/delete/{id}','Backend\SliderController@delete')->name('slider.delete');
});

Route::prefix('contact')->group(function(){
    Route::get('/view','Backend\ContactController@view')->name('contact.view');
    Route::get('/add','Backend\ContactController@add')->name('contact.add');
    Route::post('/store','Backend\ContactController@store')->name('contact.store');
    Route::get('/edit/{id}','Backend\ContactController@edit')->name('contact.edit');
    Route::post('/update/{id}','Backend\ContactController@update')->name('contact.update');
    Route::get('/delete/{id}','Backend\ContactController@delete')->name('contact.delete');
});


Route::prefix('admin')->group(function () {
    Route::get('users', 'Backend\UserController@index')->name('users.index');

    // if we create users in dashboard
    Route::get('users/create', 'Backend\UserController@create')->name('users.add');
    Route::post('users', 'Backend\UserController@store')->name('users.store');
    Route::get('users/{user}/edit', 'Backend\UserController@edit')->name('users.edit');
    Route::put('users/{user}/update', 'Backend\UserController@update')->name('users.update');
    Route::get('users/{user}/delete', 'Backend\UserController@destroy')->name('users.delete');
});

    //Route::get('users/create', 'Backend\UserController@create')->name('users.create');
    //Route::post('users', 'Backend\UserController@post')->name('users.post');
    Route::get('users/{id}', 'Backend\UserController@show')->name('users.show');
    //Route::put('users/{id}/edit', 'Backend\UserController@edit')->name('users.edit');

    //Route::delete('users/{id}/delete', 'Backend\UserController@destroy')->name('users.destroy');
});

    //Route::delete('users/{id}', 'Backend\UserController@destrooy')->name('users.destroy');
// });

