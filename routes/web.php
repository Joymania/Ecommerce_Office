<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/front','Frontend\FrontendController@index');
//Admin Routing Starts
// Route::get('/', function () { return redirect('dashboard/ecommerce'); });

//Shopping-Cart
Route::post('add-to-cart','Frontned\CartController@addtoCart')->name('insert.cart');
Route::get('show-cart','Frontend\CartController@showCart')->name('show.cart');
Route::post('update-cart','Frontend\CartController@updateCart')->name('update.cart');
Route::get('delete-cart/{rowId}','Frontend\CartController@deleteCart')->name('delete.cart');
Route::post('destroy-cart','Frontned\CartController@destroyCart')->name('destroy.cart');
Route::post('apply-cuppon','Frontend\CartController@applyCuppon')->name('apply.cuppon');

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

    Route::get('/list','Backend\ProductsController@index')->name('products.list');
    Route::get('/create','Backend\ProductsController@create')->name('products.create');
    Route::post('/create','Backend\ProductsController@store')->name('product.store');
    Route::get('/{product}/edit','Backend\ProductsController@create')->name('product.edit');
    Route::patch('/{product}/update','Backend\ProductsController@update')->name('product.update');
    Route::delete('/{product}/delete','Backend\ProductsController@destory')->name('product.destroy');

    //Size CRUD Routes
    Route:: get('/size/list','Backend\SizeController@productSizeList')->name('products.sizes');
    Route::get('/size/create','Backend\SizeController@createSize')->name('products.size.create');
    Route::post('/size/create','Backend\SizeController@storeSize')->name('product.size.store');
    Route::get('/size/{size}/edit','Backend\SizeController@editSize')->name('products.size.edit');
    Route::patch('/size/{size}/update','Backend\SizeController@updateSize')->name('products.size.update');
    Route::delete('/size/{size}/delete','Backend\SizeController@destroySize')->name('products.size.delete');
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

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('brand')->group(function () {
    Route::get('/view','Backend\BrandController@view')->name('brand.view');
    Route::get('/add','Backend\BrandController@add')->name('brand.add');
    Route::post('/store','Backend\BrandController@store')->name('brand.store');
    Route::get('/edit/{id}','Backend\BrandController@edit')->name('brand.edit');
    Route::post('/update/{id}','Backend\BrandController@update')->name('brand.update');
    Route::get('/delete/{id}','Backend\BrandController@delete')->name('brand.delete');
});


Route::prefix('cupon')->group(function () {
    Route::get('/view','Backend\CuponController@view')->name('cupon.view');
    Route::get('/add','Backend\CuponController@add')->name('cupon.add');
    Route::post('/store','Backend\CuponController@store')->name('cupon.store');
    Route::get('/edit/{id}','Backend\CuponController@edit')->name('cupon.edit');
    Route::post('/update/{id}','Backend\CuponController@update')->name('cupon.update');
    Route::get('/delete/{id}','Backend\CuponController@delete')->name('cupon.delete');
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

Route::prefix('contact')->group(function(){
    Route::get('/view','Backend\ContactController@view')->name('contact.view');
    Route::get('/add','Backend\ContactController@add')->name('contact.add');
    Route::post('/store','Backend\ContactController@store')->name('contact.store');
    Route::get('/edit/{id}','Backend\ContactController@edit')->name('contact.edit');
    Route::post('/update/{id}','Backend\ContactController@update')->name('contact.update');
    Route::get('/delete/{id}','Backend\ContactController@delete')->name('contact.delete');
});


Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('profile', 'Backend\AdminController@showProfile')->name('admin.profile');
    Route::put('profile/update', 'Backend\AdminController@updateProfile')->name('admin.profile-update');

    Route::get('users', 'Backend\UserController@index')->name('users.index');
    Route::post('users', 'Backend\UserController@store')->name('users.store');
    Route::get('users/{user}/edit', 'Backend\UserController@edit')->name('users.edit');
    Route::put('users/{user}/update', 'Backend\UserController@update')->name('users.update');
    Route::delete('users/{user}/delete', 'Backend\UserController@destroy')->name('users.delete');
    
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('dashboard', 'Backend\DashboardController@ecommerce')->name('admin.dashboard');
});

Route::prefix('admin')->middleware('auth:admin', 'superAdmin')->group(function () {
    Route::get('admins', 'Backend\AdminController@index')->name('admin.index');
    Route::get('admins/create', 'Backend\AdminController@create')->name('admin.create');
    Route::post('admins', 'Backend\AdminController@store')->name('admin.store');
    Route::get('admins/{admin}/edit', 'Backend\AdminController@edit')->name('admin.edit');
    Route::put('admins/{admin}/update', 'Backend\AdminController@update')->name('admin.update');
    Route::delete('admins/{admin}/delete', 'Backend\AdminController@destroy')->name('admin.delete');
});

// admin routes without Authentication
Route::prefix('admin')->group(function () {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login');

    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});
Route::get('/','Frontend\FrontendController@index')->middleware('verified');
Route::get('/home','HomeController@index')->middleware('verified');