<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Expense;
use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
  

    function dateBy(Request $request)
    {
     if($request->ajax())
     {
        
      if($request->from_date != '' && $request->to_date != '')
      {

       $data = Order::join('users','orders.user_id','users.id')
       ->join('order_product','order_product.order_id','orders.id')
       ->select('orders.*','users.name','users.email','order_product.qty')     
       ->whereBetween('date',array($request->from_date, $request->to_date))     

       ->whereIn('orders.status',[1,2])
       ->get();

      }
  
      else
      {
        $data = Order::join('users','orders.user_id','users.id')
        ->join('order_product','order_product.order_id','orders.id')
        ->select('orders.*','users.name','users.email','order_product.qty')     
        ->whereIn('orders.status',[1,2])
        ->get();

      }

      return response($data);
     }

    }



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

                        $seven = Order::join('users','orders.user_id','users.id')
                        ->join('order_product','order_product.order_id','orders.id')
                        ->select('orders.*','users.name','users.email','order_product.qty')     
                        ->whereDate('orders.created_at','<=',$dateToday)
                        ->whereDate('orders.created_at','>=',$date7days)
                        ->whereIn('orders.status',[1,2])                       
                        ->get();
            
        $data['sale30Days'] = Order::join('order_product','order_product.order_id','orders.id')
                        ->whereBetween('orders.created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                        ->whereIn('orders.status',[1,2])
                        ->sum('qty');

                        $last = Order::join('users','orders.user_id','users.id')
                        ->join('order_product','order_product.order_id','orders.id')
                        ->select('orders.*','users.name','users.email','order_product.qty')   
                        ->whereBetween('orders.created_at',[$firstDayofPreviousMonth,$lastDayofPreviousMonth])
                        ->whereIn('orders.status',[1,2])
                        ->get();

        $data['saleToday'] = Order::join('order_product','order_product.order_id','orders.id')
            ->whereDate('orders.created_at',$dateToday)
            ->whereIn('orders.status',[1,2])
            ->sum('qty');

                        $today = Order::join('users','orders.user_id','users.id')
                        ->join('order_product','order_product.order_id','orders.id')
                        ->select('orders.*','users.name','users.email','order_product.qty')    
                        ->whereDate('orders.created_at',$dateToday)
                        ->whereIn('orders.status',[1,2])
                        ->get();


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

         $data['all'] = Order::whereIn('status',[1,2])
                        ->sum('subtotal');
        $data['alle'] = Expense::sum('amount');

        $data['allp'] = Order::join('order_product','order_product.order_id','orders.id')
        ->whereIn('orders.status',[1,2])
        ->sum('qty');

        //return $lastDayofPreviousMonth;
        return view('admin.reports.report',compact('data','today','seven','last'));

    }
}
