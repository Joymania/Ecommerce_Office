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
    route::get('/list','Backend\ProductsController@index')->name('products.list');
    route::get('/create','Backend\ProductsController@create')->name('products.create');

    //Size CRUD Routes
    route:: get('/size/list','Backend\SizeController@productSizeList')->name('products.sizes');
    route::get('/size/create','Backend\SizeController@createSize')->name('products.size.create');
    route::post('/size/create','Backend\SizeController@storeSize')->name('product.size.store');
    route::get('/size/{size}/edit','Backend\SizeController@editSize')->name('products.size.edit');
    route::patch('/size/{size}/update','Backend\SizeController@updateSize')->name('products.size.update');
    route::delete('/size/{size}/delete','Backend\SizeController@destroySize')->name('products.size.delete');
});


//Admin Routing Ends


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
