<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

/*Front end routing Starts*/
Auth::routes();
// OTP
Route::middleware('guest')->group(function(){
    Route::post('send_otp', 'Auth\VonageSmsController@send')->name('send.otp');
    Route::get('mobile_verification', 'Auth\VonageSmsController@verifyForm')->name('verify.form');
    Route::post('mobile_verification', 'Auth\VonageSmsController@verifyOtp')->name('verify.otp');

    Route::get('forgot_password', 'Auth\VonageSmsController@forgotPasswordForm')->name('forgot.password');
    Route::post('forgot_password/send_otp', 'Auth\VonageSmsController@sendOtpForgotPass')->name('send.otp.forgot.pass');
    Route::get('forgot_password/verify', 'Auth\VonageSmsController@verifyFormForgotPass')->name('verify.form.forgot.pass');
    Route::post('forgot_password/verify', 'Auth\VonageSmsController@verifyOtpForgotPass')->name('verify.otp.forgot.pass');
    Route::post('password_reset', 'Auth\VonageSmsController@resetPassword')->name('reset.password');

});

//google login
Route::get('/login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('/google/callback', 'Auth\LoginController@handleGoogleCallback');

//Facebook login
Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

// redirect verified user
Route::get('/home','Frontend\FrontendController@index')->name('home');
Route::get('about-us', 'Frontend\FrontendController@aboutUs')->name('about_us');
// without authentication
Route::get('/','Frontend\FrontendController@index')->name('frontsite');
Route::get('/{id}/products','Frontend\ProductBySubcatController@productByCat')->name('productByCat');
Route::get('/{id}/products/subCat-priceFilter','Frontend\ProductBySubcatController@priceFilter');
Route::get('/{id}/category/products','Frontend\ProductByCategoryController@productByCategory')->name('productByCategory');
Route::get('/{id}/products/cat-priceFilter','Frontend\ProductByCategoryController@priceFilter');



Route::get('/{id}/product-details-Ajax', 'Frontend\ProductDetailsController@index_ajax')->name('product.details.ajax');
//Shop page routing
Route::get('/shop','Frontend\ShopController@index')->name('products.shop');

//Offer products routing
Route::get('/offer-products','Frontend\OfferProductsController@index')->name('offerProducts');
Route::get('/priceFiltered-offer-products','Frontend\OfferProductsController@priceFilter');
Route::get('/offer-products-ajax-search','Frontend\OfferProductsController@ajaxSearch');
Route::get('/offer-category-products','Frontend\OfferProductsController@categoryProducts');

//  Route::get('/{id}','Frontend\ProductBySubcatController@productByCat')->name('product');
Route::get('/{id}/product-details', 'Frontend\ProductDetailsController@index')->name('product.details');
Route::get('/{id}/product-details-all-reviews', 'Frontend\ProductDetailsController@reviewsWithoutLimit')->name('product.details.reviews');
Route::get('/search-result','Frontend\SearchController@searchResults')->name('search.result');
Route::get('/search-filter','Frontend\SearchController@filteredResult')->name('search.filter');
Route::get('/category-products','Frontend\SearchController@categoryProducts')->name('category.products');


//wishlist
Route::get('wishlist','Frontend\WishlistController@index')->name('wishlist.view');
Route::get('add-to-wishlist/{id}','Frontend\WishlistController@addtoWishlist')->name('wishlist.add');

 //Shopping-Cart
Route::post('add-to-cart','Frontend\CartController@addtoCart')->name('insert.cart');
Route::post('add-to-cart-ajax','Frontend\CartController@addtoCartAjax');

Route::get('show-cart','Frontend\CartController@showCart')->name('show.cart');
Route::post('update-cart','Frontend\CartController@updateCart')->name('update.cart');
Route::get('delete-cart/{rowId}','Frontend\CartController@deleteCart')->name('delete.cart');
Route::get('delete-cartshopping/{id}','Frontend\CartController@deleteAuthCart')->name('delete.authcart');
Route::get('delete-wishlist/{id}','Frontend\CartController@deletewishlist')->name('delete.wishlist');
Route::get('destroy-cart','Frontend\CartController@destroyCart')->name('destroy.cart');
Route::get('destroy-cartshopcart/{id}','Frontend\CartController@destroyAauthCart')->name('destroyauth.cart');
Route::post('cart-to-add', 'Frontend\CartController@cartadd')->name('adding.cart');
Route::post('cart-update', 'Frontend\CartController@cartupdate')->name('updating.cart');
//Route::get('/{id}','Frontend\ProductBySubcatController@productByCat')->name('product');
Route::get('/{id}/product-details', 'Frontend\ProductDetailsController@index')->name('product.details');
Route::get('/search-result','Frontend\SearchController@searchResults')->name('search.result');
Route::get('/search-filter','Frontend\SearchController@filteredResult')->name('search.filter');
Route::get('/search-ajax','Frontend\SearchController@ajaxSearch')->name('search.ajax');
// contact
Route::get('/contact','Frontend\FrontendController@contact')->name('contact');



Route::middleware(['auth'])->group(function () {
    Route::get('/user/userAccount','Frontend\userAccountController@userAccount')->name('userAccount');
    Route::post('/user/userUpdate','Frontend\userAccountController@userUpdate')->name('userUpdate');
    Route::delete('users/image/{user}/delete', 'Frontend\userAccountController@deleteImage')->name('userAccount.image.delete');

    //Checkout
    Route::post('checkout','Frontend\CheckoutController@index')->name('checkout');
    Route::get('checkout','Frontend\CheckoutController@index')->name('checkout');
    Route::post('checkout-store','Frontend\CheckoutController@store')->name('checkout.store');
    Route::post('apply-cuppon','Frontend\CartController@applyCuppon')->name('apply.cuppon');
    Route::get('/user/{id}/order-details','Frontend\userAccountController@orderDetails')->name('orderDetails');

    Route::post('review/{prod_id}', 'Frontend\ReviewController@store')->name('store-review');
    // tracking
    Route::get('track-show','Frontend\CheckoutController@showTrack')->name('track.show');
    Route::post('tracking','Frontend\CheckoutController@track')->name('order.track');
});

/*Front end routing ends*/


//Admin Routing Starts
// Admin role routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // for profile
    Route::get('profile', 'Backend\AdminController@showProfile')->name('admin.profile');
    Route::put('profile/update', 'Backend\AdminController@updateProfile')->name('admin.profile-update');
    Route::get('markasread',function(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();

    })->name('markasRead');

    // users
    Route::get('users', 'Backend\UserController@index')->name('users.index');
    Route::post('users', 'Backend\UserController@store')->name('users.store');
    Route::get('users/{user}/edit', 'Backend\UserController@edit')->name('users.edit');
    Route::put('users/{user}/update', 'Backend\UserController@update')->name('users.update');
    Route::delete('users/{user}/delete', 'Backend\UserController@destroy')->name('users.delete');
    Route::delete('users/image/{user}/delete', 'Backend\UserController@deleteImage')->name('users.image.delete');
    // dashboard
    Route::get('dashboard', 'Backend\DashboardController@ecommerce')->name('admin.dashboard');
    // logout
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');

    /*Products Routes*/
    Route::prefix('products')->group(function () {
        Route::get('/list','Backend\ProductsController@index')->name('products.list');
        Route::get('/create','Backend\ProductsController@create')->name('products.create');
        Route::post('/create','Backend\ProductsController@store')->name('product.store');
        Route::get('/{product}/edit','Backend\ProductsController@edit')->name('product.edit');
        Route::patch('/{product}/update','Backend\ProductsController@update')->name('product.update');
        Route::delete('/{product}/delete','Backend\ProductsController@destroy')->name('product.destroy');
    });

    //Size CRUD Routes
    Route:: get('/size/list','Backend\SizeController@productSizeList')->name('products.sizes');
    Route::get('/size/create','Backend\SizeController@createSize')->name('products.size.create');
    Route::post('/size/create','Backend\SizeController@storeSize')->name('product.size.store');
    Route::get('/size/{size}/edit','Backend\SizeController@editSize')->name('products.size.edit');
    Route::patch('/size/{size}/update','Backend\SizeController@updateSize')->name('products.size.update');
    Route::delete('/size/{size}/delete','Backend\SizeController@destroySize')->name('products.size.delete');

    // Tags
    Route::prefix('/tags')->group(function (){
        Route::get('/list','Backend\TagsController@index')->name('tags.list');
        Route::get('/create','Backend\TagsController@create')->name('tags.create');
        Route::post('/create','Backend\TagsController@store')->name('tags.store');
        Route::get('/{tag}/edit', 'Backend\TagsController@edit')->name('tags.edit');
        Route::patch('/{tag}/update', 'Backend\TagsController@update')->name('tags.update');
        Route::delete('/{tag}/delete', 'Backend\TagsController@destroy')->name('tags.delete');
    });

    // Brands
    Route::prefix('brand')->group(function () {
        Route::get('/view','Backend\BrandController@view')->name('brand.view');
        Route::get('/add','Backend\BrandController@add')->name('brand.add');
        Route::post('/store','Backend\BrandController@store')->name('brand.store');
        Route::get('/edit/{id}','Backend\BrandController@edit')->name('brand.edit');
        Route::post('/update/{id}','Backend\BrandController@update')->name('brand.update');
        Route::delete('/delete/{id}','Backend\BrandController@delete')->name('brand.delete');
    });

     // cupon
     Route::prefix('cupon')->group(function () {
        Route::get('/view','Backend\CuponController@view')->name('cupon.view');
        Route::get('/add','Backend\CuponController@add')->name('cupon.add');
        Route::post('/store','Backend\CuponController@store')->name('cupon.store');
        Route::get('/edit/{id}','Backend\CuponController@edit')->name('cupon.edit');
        Route::post('/update/{id}','Backend\CuponController@update')->name('cupon.update');
        Route::delete('/delete/{id}','Backend\CuponController@delete')->name('cupon.delete');
    });

    // Order
    Route::prefix('order')->group(function () {
        Route::get('/view','Backend\OrderController@view')->name('order.view');
        Route::get('/details/{id}','Backend\OrderController@details')->name('order.details');
        Route::delete('/delete/{id}','Backend\OrderController@delete')->name('order.delete');
        Route::get('approved/{id}','Backend\OrderController@status')->name('order.status');
        Route::get('deliver/{id}','Backend\OrderController@deliveryStatus')->name('order.delivarystatus');
        Route::get('returnpending/{id}', 'Backend\OrderController@returnPending')->name('order.returnPending');
    });
    // Color
    Route::prefix('color')->group(function () {
        Route::get('/view','Backend\ColorController@view')->name('color.view');
        Route::get('/add','Backend\ColorController@add')->name('color.add');
        Route::post('/store','Backend\ColorController@store')->name('color.store');
        Route::get('/edit/{id}','Backend\ColorController@edit')->name('color.edit');
        Route::post('/update/{id}','Backend\ColorController@update')->name('color.update');
        Route::delete('/delete/{id}','Backend\ColorController@delete')->name('color.delete');
    });
    // contacts
    Route::prefix('contact')->group(function () {
        Route::get('/view', 'Backend\ContactController@view')->name('contact.view');
        Route::get('/add', 'Backend\ContactController@add')->name('contact.add');
        Route::post('/store', 'Backend\ContactController@store')->name('contact.store');
        Route::get('/edit/{id}', 'Backend\ContactController@edit')->name('contact.edit');
        Route::post('/update/{id}', 'Backend\ContactController@update')->name('contact.update');
        Route::delete('/delete/{id}', 'Backend\ContactController@delete')->name('contact.delete');
    });

    Route::prefix('admin')->group(function () {
        // slider
        Route::prefix('slider')->group(function () {
            Route::get('/view', 'Backend\SliderController@view')->name('slider.view');
            Route::get('/add', 'Backend\SliderController@add')->name('slider.add');
            Route::post('/store', 'Backend\SliderController@store')->name('slider.store');
            Route::get('/edit/{id}', 'Backend\SliderController@edit')->name('slider.edit');
            Route::post('/update/{id}', 'Backend\SliderController@update')->name('slider.update');
            Route::get('/delete/{id}', 'Backend\SliderController@delete')->name('slider.delete');
        });
    });
    // category
    Route::prefix('category')->group(function(){
        Route::get('category', 'Backend\CategoriesController@category')->name('category.view');
        Route::get('insertCategory', 'Backend\CategoriesController@insertCategory')->name('category.add');
        Route::post('insertcat','Backend\CategoriesController@insertcat')->name('category.store');
        Route::get('editCategory/{eid}', 'Backend\CategoriesController@editCategory')->name('category.edit');
        Route::post('updateCategory','Backend\CategoriesController@updateCategory')->name('category.update');
        Route::delete('deleteCategory/{did}','Backend\CategoriesController@deleteCategory')->name('category.delete');
    });

    // Sub category
    Route::prefix('subCategory')->group(function(){
        Route::get('subCategory','Backend\subCategoryController@subCategory')->name('subCategory.view');
        Route::get('insertSubCategory', 'Backend\subCategoryController@insertSubCategory')->name('subCategory.add');
        Route::post('insertSubcat', 'Backend\subCategoryController@insertSubcat')->name('subCategory.store');
        Route::get('editSubCategory/{id}', 'Backend\subCategoryController@editSubCategory')->name('subCategory.edit');
        Route::post('updateSubCategory','Backend\subCategoryController@updateSubCategory')->name('subCategory.update');
        Route::delete('deleteSubCategory/{did}','Backend\subCategoryController@deleteSubCategory')->name('subCategory.delete');
    });

    // expenseCategory
Route::prefix('expenseCategory')->group(function(){
    Route::get('/', 'Backend\expenseCategoryController@expenseCategory')->name('expenseCategory.view');
    Route::get('insertExpCat', 'Backend\expenseCategoryController@insertExpCat')->name('expenseCategory.add');
    Route::post('storeExpCat', 'Backend\expenseCategoryController@storeExp')->name('expenseCategory.store');
    Route::get('editExpCat/{id}', 'Backend\expenseCategoryController@editExpCat')->name('expenseCategory.edit');
    Route::put('updateExpCat/{id}', 'Backend\expenseCategoryController@updateExpCat')->name('expenseCategory.update');
    Route::delete('deleteExp/{did}','Backend\expenseCategoryController@deleteExp')->name('expenseCategory.delete');
});

// expense
Route::prefix('expense')->group(function(){
    Route::get('/', 'Backend\expenseController@expense')->name('expense.view');
    Route::get('insertExpense', 'Backend\expenseController@insertExpense')->name('expense.add');
    Route::post('storeExpense', 'Backend\expenseController@storeExpense')->name('expense.store');
    Route::get('editExpense/{id}', 'Backend\expenseController@editExpense')->name('expense.edit');
    Route::post('updateExpense','Backend\expenseController@updateExpense')->name('updateExpense');
    Route::delete('deleteExpense/{did}','Backend\expenseController@deleteexpense')->name('expense.delete');
});

    // logo
    Route::prefix('logo')->group(function(){
        Route::get('logo', 'Backend\LogoController@logo')->name('logo.view');
        Route::get('insertLogo', 'Backend\LogoController@insertLogo')->name('logo.add');
        Route::post('insertlog', 'Backend\LogoController@insertlog')->name('logo.store');
        Route::get('editLogo/{id}', 'Backend\LogoController@editLogo')->name('logo.edit');
        Route::post('updateLogo','Backend\LogoController@updateLogo')->name('logo.update');
        Route::delete('deleteLogo/{did}','Backend\LogoController@deleteLogo')->name('logo.delete');
    });

    //copyright
    Route::prefix('copyright')->group(function (){
        Route::get('/','Backend\CopyrightController@index')->name('copyright.view');
        Route::get('/add','Backend\CopyrightController@create')->name('copyright.add');
        Route::post('/add','Backend\CopyrightController@store')->name('copyright.store');
        Route::get('/edit','Backend\CopyrightController@edit')->name('copyright.edit');
        Route::post('/edit','Backend\CopyrightController@update')->name('copyright.update');
        Route::get('/{copyright}/destroy','Backend\CopyrightController@delete')->name('copyright.delete');
    });


    //Facebook Pixel setup Routing
    Route::get('/facebook-pixel','Backend\FacebookPixelController@index')->name('facebook.pixel');
    Route::get('/facebook-pixel/add','Backend\FacebookPixelController@add')->name('pixel.add');
    Route::post('/facebook-pixel/add','Backend\FacebookPixelController@store')->name('pixel.store');
    Route::get('/facebook-pixel/{pixel}/edit','Backend\FacebookPixelController@edit')->name('pixel.edit');
    Route::patch('/facebook-pixel/{pixel}/update','Backend\FacebookPixelController@update')->name('pixel.update');
    Route::delete('/facebook-pixel/{pixel}/delete','Backend\FacebookPixelController@delete')->name('pixel.delete');

     //shipping methods
     Route::prefix('shipping-methods')->group(function (){
        Route::get('/','Backend\ShippingMethodsController@index')->name('shipping.methods.view');
        Route::get('/add','Backend\ShippingMethodsController@create')->name('shipping.method.add');
        Route::post('/add','Backend\ShippingMethodsController@store')->name('shipping.method.store');
        Route::get('/{shipping}/edit','Backend\ShippingMethodsController@edit')->name('shipping.method.edit');
        Route::post('/{shipping}/edit','Backend\ShippingMethodsController@update')->name('shipping.method.update');
        Route::get('/{shipping}/destroy','Backend\ShippingMethodsController@delete')->name('shipping.method.delete');
    });


    //Useful links
    Route::prefix('useful-links')->group(function (){
        Route::get('/','Backend\UsefulLinksController@index')->name('useful.links.view');
        Route::get('/add','Backend\UsefulLinksController@create')->name('useful.links.add');
        Route::post('/add','Backend\UsefulLinksController@store')->name('useful.links.store');
        Route::get('/{useful}/edit','Backend\UsefulLinksController@edit')->name('useful.links.edit');
        Route::post('/{useful}/edit','Backend\UsefulLinksController@update')->name('useful.links.update');
        Route::delete('/{useful}/destroy','Backend\UsefulLinksController@delete')->name('useful.links.delete');
    });

    //Report page route
    Route::get('/report','Backend\ReportController@index')->name('sales.report');
    Route::post('/dateby','Backend\ReportController@dateBy');
    Route::get('/export', 'excelFile@export');




    // fallback route
    Route::fallback(function () {
        return view('admin.authentication.page404');
    });
}); 

// Super Admin role routes
Route::prefix('admin')->middleware('auth:admin', 'superAdmin')->group(function () {
    Route::get('admins', 'Backend\AdminController@index')->name('admin.index');
    Route::get('admins/create', 'Backend\AdminController@create')->name('admin.create');
    Route::post('admins', 'Backend\AdminController@store')->name('admin.store');
    Route::get('admins/{admin}/edit', 'Backend\AdminController@edit')->name('admin.edit');
    Route::put('admins/{admin}/update', 'Backend\AdminController@update')->name('admin.update');
    Route::delete('admins/{admin}/delete', 'Backend\AdminController@destroy')->name('admin.delete');
    Route::delete('admins/image/{admin}/delete', 'Backend\AdminController@deleteImage')->name('admin.image.delete');
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





// export
  



//Admin Routing Ends

    
