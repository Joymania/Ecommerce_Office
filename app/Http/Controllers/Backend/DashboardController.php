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
        $revenue = Order::sum('subtotal');
        session()->put('sales',$sales);
        session()->put('orders',$orders);
        session()->put('revenue',$revenue);
        $customers = User::count();
        $recentOrders = Order::with('products')->latest()->get();
        $data['pending'] = Order::where('status',0)->count();
        $data['completed'] = $sales;
        $data['processing'] = Order::where('status',1)->count();
        $data['customerSatisfaction'] = review::count();
        $data['totalProducts'] = product::sum('stock');
        $data['totalExpense'] = Expense::sum('amount');
        $data['totalPurchase'] = product::sum('buying_price');
        $data['totalSales'] = Order::sum('subtotal');
        $data['netProfit'] = $revenue - $data['totalExpense']-$data['totalPurchase'];

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
