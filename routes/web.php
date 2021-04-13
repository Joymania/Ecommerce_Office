<?php

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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::delete('users/{id}', 'Backend\UserController@destrooy')->name('users.destroy');
});
// --------------------------------------------------------------------------
