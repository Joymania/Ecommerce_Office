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
        $sales = Order::where('status',2)->count();
        $orders = Order::count();
        session()->put('sales',$sales);
        session()->put('orders',$orders);

        $customers = User::count();
        $recentOrders = Order::with('products')->latest()->get();
        $data['pending'] = Order::where('status',0)->count();
        $data['completed'] = $sales;
        $data['processing'] = Order::where('status',1)->count();
        $data['customerSatisfaction'] = review::count();
        $data['totalItems'] = product::count();
        $data['totalExpense'] = Expense::sum('amount');
        $totalPurchase = product::select(DB::raw('SUM(buying_price * stock) as total_purchase'))->first();
        $data['totalPurchase'] = $totalPurchase->total_purchase;

        /*$data['totalSales'] = Order::sum('subtotal');*/
        $a = Order::select('subtotal')->where('status',1)->get();
        $sum = 0;
        if (count($a) > 0){
            foreach ($a as $row){
                $b = str_replace(',','',$row->subtotal);
                $sum = $sum + (float)$b;
            }
        }
        $data['totalSales'] = $sum;
        $data['netProfit'] = $sum - $data['totalExpense']-$data['totalPurchase'];
        session()->put('revenue',$sum);

        $a = DB::table('order_product')
           ->select('product_id',DB::raw('SUM(qty) as total_sales'))
           ->groupBy('product_id')
           ->orderByRaw('total_sales DESC')->limit(5)->get();

       $b = array();
        foreach ($a as $row)
        {
            array_push($b,$row->product_id);
        }
        $tsp = product::find($b);
        return view('admin.dashboard.ecommerce',
            compact('admin','sales','orders','customers','recentOrders','tsp','a','data'));
    }
}
