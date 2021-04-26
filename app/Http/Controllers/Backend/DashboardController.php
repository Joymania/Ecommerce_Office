<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Order;
use App\Model\product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class DashboardController extends Controller
{
    public function ecommerce()
    {
        $admin = Admin::find(Auth::id());
        $sales = Order::where('status',1)->count();
        $orders = Order::where('status',0)->count();
        session()->put('sales',$sales);
        session()->put('orders',$orders);
        $customers = User::count();
        $recentOrders = Order::with('products')->latest()->limit(5)->get();
        //$newOrders = Order::with('products')->where('status',0)->latest()->limit(5)->get();

       $a = DB::table('order_product')
           ->select('product_id',DB::raw('SUM(qty) as total_sales'))
           ->groupBy('product_id')
           ->orderByRaw('product_id DESC')->limit(5)->get();

       $b = array();
        foreach ($a as $row)
        {
            array_push($b,$row->product_id);
        }
        $tsp = product::find($b);
        return view('admin.dashboard.ecommerce',
            compact('admin','sales','orders','customers','recentOrders','tsp','a'));
    }
}
