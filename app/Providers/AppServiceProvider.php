<?php

namespace App\Providers;

use App\Model\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\wishlist;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\contacts;
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
        $this->wishlist_num = wishlist::all()->count();
        $this->cart_num = CartShopping::all()->count();
        $this->categories = category::with('sub_category')->get();
        $this->sales = Order::where('status',2)->orWhere('status',1)->count();
        $this->orders = Order::count();
        $this->totalSale = Order::where('status',1)->orWhere('status',2)->sum('subtotal');

        View::composer('Frontend.layouts.master', function ($view) {
            $view->with('wishlist_num' , $this->wishlist_num);
            $view->with('cart_num' , $this->cart_num);
            $view->with('categories' , $this->categories);

        });
        View::composer('Frontend.userProfile.master', function ($view) {
            $view->with('wishlist_num' , $this->wishlist_num);
            $view->with('cart_num' , $this->cart_num);
            $view->with('categories' , $this->categories);
        });

        View::composer('admin.layout.sidebar',function ($view){
           $view->with('sales', $this->sales);
           $view->with('orders',$this->orders);
           $view->with('totalSale',$this->totalSale);
        });

    }
}
