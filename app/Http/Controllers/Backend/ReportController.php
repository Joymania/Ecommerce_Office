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
        $dateToday = Carbon::today();
        $date7days = Carbon::today()->subDay(6);
        $date30days = Carbon::today()->subDay(30);
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonthsNoOverflow();

        $lastDayofPreviousMonth = Carbon::now()->subMonthsNoOverflow()->endOfMonth();
        $data['sale7Days'] = Order::join('order_product','order_product.order_id','orders.id')
                        ->where('orders.created_at','>=',$date7days)
                        ->sum('qty');
        $data['sale30Days'] = Order::join('order_product','order_product.order_id','orders.id')
                        ->whereBetween('orders.created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                        ->sum('qty');
        $data['saleToday'] = Order::join('order_product','order_product.order_id','orders.id')
            ->where('orders.created_at',$dateToday)
            ->sum('qty');
        $data['expenseToday'] = Expense::where('created_at', $dateToday)->sum('amount');
        $data['expense7Day'] = Expense::where('created_at','>=',$date7days)->sum('amount');
        $data['expense30Day'] = Expense::whereBetween('created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])->sum('amount');


        //return $firstDayofPreviousMonth . " " .$lastDayofPreviousMonth;
        return view('admin.reports.report',compact('data'));
    }
}
