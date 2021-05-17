<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Expense;
use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $dateToday = Carbon::today()->toDateString();
        $date7days = Carbon::today()->subDay(7)->toDateString();

        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth();
        $data['sale7Days'] = Order::join('order_product','order_product.order_id','orders.id')
                        ->whereDate('orders.created_at','<=',$dateToday)
                        ->whereDate('orders.created_at','>=',$date7days)
                        ->whereIn('orders.status',[1,2])
                        ->sum('qty');
        $data['sale30Days'] = Order::join('order_product','order_product.order_id','orders.id')
                        ->whereBetween('orders.created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                        ->whereIn('orders.status',[1,2])
                        ->sum('qty');
        $data['saleToday'] = Order::join('order_product','order_product.order_id','orders.id')
            ->whereDate('orders.created_at',$dateToday)
            ->whereIn('orders.status',[1,2])
            ->sum('qty');
        $data['expenseToday'] = Expense::whereDate('created_at', $dateToday)->sum('amount');
        $data['expense7Day'] = Expense::whereDate('created_at','<=',$dateToday)->whereDate('created_at','>=',$date7days)->sum('amount');
        $data['expense30Day'] = Expense::whereBetween('created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])->sum('amount');

        $data['todaySellingAmount '] = Order::whereDate('created_at',$dateToday)
                                    ->whereIn('status',[1,2])
                                    ->sum('subtotal');
        $data['last7daySellingAmount'] = Order::whereDate('created_at','<=',$dateToday)
                                        ->whereDate('created_at','>=',$date7days)
                                        ->whereIn('status',[1,2])
                                        ->sum('subtotal');
        $data['last1monthSellingAmount'] = Order::whereBetween('created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                                            ->whereIn('status',[1,2])
                                            ->sum('subtotal');

        //return $lastDayofPreviousMonth;
        return view('admin.reports.report',compact('data'));
    }
}
