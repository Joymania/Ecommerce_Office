<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Controllers\Backend\UserController;

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

// ----------------- Rakibul ------------------------------------------------
Route::prefix('admin')->group(function () {
    Route::get('users', 'Backend\UserController@index')->name('users.index');
    // if we create users in dashboard
    Route::get('users/create', 'Backend\UserController@create')->name('users.create');
    Route::post('users', 'Backend\UserController@post')->name('users.post');
    Route::get('users/{id}', 'Backend\UserController@show')->name('users.show');
    Route::put('users/{id}/edit', 'Backend\UserController@edit')->name('users.edit');
    Route::delete('users/{id}/delete', 'Backend\UserController@destroy')->name('users.destroy');
});
// --------------------------------------------------------------------------
