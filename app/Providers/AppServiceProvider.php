<?php

namespace App\Providers;

use App\Model\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\wishlist;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\logo;
use App\Model\Admin;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {     
       
        View::composer('Frontend.layouts.master', function ($view) {
            $view->with('wishlist_num' , wishlist::all()->count());
            $view->with('cart_num' , CartShopping::all()->count());
            $view->with('categories' , category::with('sub_category')->get());

        });
        View::composer('Frontend.userProfile.master', function ($view) {
            $view->with('wishlist_num' , wishlist::all()->count());
            $view->with('cart_num' , CartShopping::all()->count());
            $view->with('categories' , category::with('sub_category')->get());
        });

        View::composer('admin.layout.sidebar',function ($view){
           $view->with('sales', Order::where('status',2)->orWhere('status',1)->count());
           $view->with('orders', Order::count());
           $view->with('totalSale', Order::where('status',1)->orWhere('status',2)->sum('subtotal'));
        });

        View::composer('admin.layout.navbar',function ($view){
            $view->with('logo', logo::orderByDesc('id')->first());
            $admin = Admin::find(Auth::id());
            session()->put('admin',$admin);
        });
    }
}
