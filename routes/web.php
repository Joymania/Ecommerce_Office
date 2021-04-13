<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('dashboard/ecommerce', 'DashboardController@ecommerce')->name('dashboard.ecommerce');

/* Authentication */
Route::get('authentication', function () { return redirect('authentication/login'); });
Route::get('authentication/login', 'AuthenticationController@login')->name('authentication.login');
Route::get('authentication/register', 'AuthenticationController@register')->name('authentication.register');
Route::get('authentication/lockscreen', 'AuthenticationController@lockscreen')->name('authentication.lockscreen');
Route::get('authentication/forgot-password', 'AuthenticationController@forgotPassword')->name('authentication.forgot-password');
Route::get('authentication/page404', 'AuthenticationController@page404')->name('authentication.page404');
Route::get('authentication/page403', 'AuthenticationController@page403')->name('authentication.page403');
Route::get('authentication/page500', 'AuthenticationController@page500')->name('authentication.page500');
Route::get('authentication/page503', 'AuthenticationController@page503')->name('authentication.page503');

/*Profile Page*/
Route::get('pages/profile1', 'PagesController@profile1')->name('pages.profile1');

//Admin Routing Ends


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//

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
