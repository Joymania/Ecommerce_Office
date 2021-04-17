<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend;

use App\Controllers\Backend\UserController;


Route::get('/', function () { return redirect('dashboard/ecommerce'); });

//singlePagesRoutes

Route::get('/front','Frontend\FrontendController@index')->name('index');


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

Route::prefix('/tags')->group(function (){
    route::get('/list','Backend\TagsController@index')->name('tags.list');
    route::get('/create','Backend\TagsController@create')->name('tags.create');
    route::post('/create','Backend\TagsController@store')->name('tags.store');
    route::get('/{tag}/edit', 'Backend\TagsController@edit')->name('tags.edit');
    route::patch('/{tag}/update', 'Backend\TagsController@update')->name('tags.update');
    route::delete('/{tag}/delete', 'Backend\TagsController@destroy')->name('tags.delete');
});

Route::prefix('/categories')->group(function (){
    route::get('/list','Backend\CategoriesController@index')->name('categories.list');
    route::get('/create','Backend\CategoriesController@create')->name('categories.create');
    route::post('/create','Backend\CategoriesController@store')->name('categories.store');
    route::get('/{category}/edit','Backend\CategoriesController@edit')->name('categories.edit');
    route::patch('/{category}/update','Backend\CategoriesController@update')->name('categories.update');
    route::delete('/{category}/delete','Backend\CategoriesController@destroy')->name('categories.delete');
});

Auth::routes();

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
    Route::get('users/create', 'Backend\UserController@create')->name('users.create');
    Route::post('users', 'Backend\UserController@post')->name('users.post');
    Route::get('users/{id}', 'Backend\UserController@show')->name('users.show');
    Route::put('users/{id}/edit', 'Backend\UserController@edit')->name('users.edit');
    Route::delete('users/{id}', 'Backend\UserController@destrooy')->name('users.destroy');
});



