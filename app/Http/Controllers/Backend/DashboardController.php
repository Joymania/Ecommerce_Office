<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Expense;
use App\Model\Order;
use App\Model\product;
use App\Model\review;
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
        session()->put('admin',$admin);
        //$sales = Order::where('status',2)->orWhere('status',1)->count();
        $sales = Order::join('order_product','orders.id','order_product.order_id')
                    ->whereIn('orders.status',[1,2])
                    ->sum('order_product.qty');
        $orders = Order::count();
       /* session()->put('sales',$sales);
        session()->put('orders',$orders);
        session()->put('revenue',$data['totalSales']);*/
        $customers = User::count();
        $recentOrders = Order::with('products')->latest()->get();
        $data['pending'] = Order::where('status',0)->count();
        $data['completed'] = Order::where('status',2)->count();
        $data['processing'] = Order::where('status',1)->count();
        $data['customerSatisfaction'] = review::count();
        $data['totalItems'] = product::count();
        $data['totalExpense'] = Expense::sum('amount');
        $totalPurchase = product::select(DB::raw('SUM(buying_price * stock) as total_purchase'))->first();
        $data['totalPurchase'] = $totalPurchase->total_purchase;

        /*$data['totalSales'] = Order::sum('subtotal');*/
        $data['totalSales'] = Order::where('status',1)->orWhere('status',2)->sum('subtotal');
        /*$sum = 0;
        if (count($a) > 0){
            foreach ($a as $row){
                $b = str_replace(',','',$row->subtotal);
                $sum = $sum + (float)$b;
            }
        }*/

        $data['netProfit'] = $data['totalSales'] - $data['totalExpense']-$data['totalPurchase'];

        $a = DB::table('order_product')
           ->select('product_id',DB::raw('SUM(qty) as total_sales'))
           ->groupBy('product_id')
           ->orderByRaw('product_id DESC')->limit(5)->get();
        $b = array();
        foreach ($a as $row)
        {
            array_push($b,$row->product_id);
        }
        $tsp = product::orderBy('id','DESC')->find($b);
        return view('admin.dashboard.ecommerce',
            compact('admin','sales','orders','customers','recentOrders','tsp','a','data'));
    }
}
