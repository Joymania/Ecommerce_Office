<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend;
use GuzzleHttp\Middleware;

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
// Route::get('/', function () { return redirect('dashboard/ecommerce'); });

/*Dashboard*/
// Route::get('dashboard/ecommerce', 'Backend\DashboardController@ecommerce')->name('dashboard.ecommerce');

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

Route::get('/home', 'HomeController@index')->name('home');

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

Route::prefix('slider')->group(function(){
    Route::get('/view','Backend\SliderController@view')->name('slider.view');
    Route::get('/add','Backend\SliderController@add')->name('slider.add');
    Route::post('/store','Backend\SliderController@store')->name('slider.store');
    Route::get('/edit/{id}','Backend\SliderController@edit')->name('slider.edit');
    Route::post('/update/{id}','Backend\SliderController@update')->name('slider.update');
    Route::get('/delete/{id}','Backend\SliderController@delete')->name('slider.delete');
});


Route::prefix('admin')->group(function () {
    Route::get('users', 'Backend\UserController@index')->name('users.index');
    Route::post('users', 'Backend\UserController@store')->name('users.store');
    Route::get('users/{user}/edit', 'Backend\UserController@edit')->name('users.edit');
    Route::put('users/{user}/update', 'Backend\UserController@update')->name('users.update');
    Route::get('users/{user}/delete', 'Backend\UserController@destroy')->name('users.delete');
});
// Website base url
Route::get('/', function () { return view('website.website-index'); });

// Route::prefix('admin')->middleware('auth:admin')->group(function () {
Route::prefix('admin')->group(function () {
    Route::get('admins', 'Backend\AdminController@index')->name('admin.index');
    Route::get('admins/create', 'Backend\AdminController@create')->name('admin.create');
    Route::post('admins', 'Backend\AdminController@store')->name('admin.store');
    Route::get('admins/{admin}/edit', 'Backend\AdminController@edit')->name('admin.edit');
    Route::put('admins/{admin}/update', 'Backend\AdminController@update')->name('admin.update');
    Route::get('admins/{admin}/delete', 'Backend\AdminController@destroy')->name('admin.delete');
    
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('dashboard', 'Backend\DashboardController@ecommerce')->name('admin.dashboard');
});

// admin routes without Authentication
Route::prefix('admin')->group(function () {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login');
});

Auth::routes();