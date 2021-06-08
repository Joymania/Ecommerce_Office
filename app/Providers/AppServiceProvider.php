<?php

namespace App\Providers;

use App\Model\Copyright;
use App\Model\FacebookPixel;
use App\Model\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\wishlist;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\logo;
use App\Model\Admin;
use App\Model\contacts;
use App\Model\UsefulLinks;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
            $view->with('wishlist_num' , wishlist::where('user_id', Auth::id())->count());
            $view->with('cart_num' , CartShopping::where('user_id', Auth::id())->count());
            $view->with('categories' , category::with('sub_category')->get());
            $view->with('logos' , logo::orderByDesc('id')->first());
            $view->with('contacts', contacts::orderByDesc('id')->first());
            $view->with('usefuls' , UsefulLinks::all());
            $view->with('pixel',FacebookPixel::first());
        });

        View::composer('Frontend.userProfile.master', function ($view) {
            $view->with('wishlist_num' , wishlist::where('user_id', Auth::id())->count());
            $view->with('cart_num' , CartShopping::where('user_id', Auth::id())->count());
            $view->with('categories' , category::with('sub_category')->get());
            $view->with('logos' , logo::orderByDesc('id')->first());
            $view->with('contacts', contacts::orderByDesc('id')->first());
            $view->with('usefuls' , UsefulLinks::all());
            $view->with('pixel',FacebookPixel::first());
        });

        View::composer('admin.layout.sidebar',function ($view){
            $sales = Order::join('order_product','orders.id','order_product.order_id')
                ->whereIn('orders.status',[1,2])
                ->sum('order_product.qty');
           $view->with('sales', $sales);
           $view->with('orders', Order::count());
           $view->with('totalSale', Order::whereIn('status',[1,2])->sum('subtotal'));
        });

        View::composer('admin.layout.navbar',function ($view){
            $view->with('logo', logo::orderByDesc('id')->first());
            $admin = Admin::find(Auth::id());
            session()->put('admin',$admin);
            $today = Carbon::today()->toDateTimeString();
            $admin->notifications()->where('read_at', '<', $today)->delete();
        });

        View::composer('Frontend.layouts.footer',function ($view){
           $copyright = Copyright::first();
           $view->with('copyright',$copyright);
           $view->with('contacts', contacts::orderByDesc('id')->first());
        });

        View::composer('Frontend.userProfile.master',function ($view){
            $copyright = Copyright::first();
            $view->with('copyright',$copyright);
        });
    }
}
