<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\product;
use Illuminate\Http\Request;

use Notification;

class OrderController extends Controller
{
    public function view(){
        $data['alldata']=Order::all();
        $data['admin']=Admin::where('role','0')->first();
        //dd($data['alldata']);
        return view('admin.Order.order-view',$data);
    }

    public function details($id){
        $data['order']=Order::find($id);
        $data['admin']=Admin::where('role','0')->first();
        //$data['product']=Order::where('id',$id)->with('products')->first();
        $data['product']=OrderProduct::where('order_id',$id)->with('color','size','order_detail','product')->get();

        //dd($data['product']) ;
        // $notification = auth()->user()->notifications()->find($notificationid);
        // if ($notification) {
        //     $notification->markAsRead();
        // }
        return view('admin.Order.order-details',$data);
    }
    public function notifynav($id, $n_id)
    {
        
        //return $n_id;
        $notification = auth()->user()->unreadNotifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
        $data['order'] = Order::find($n_id);
        $data['admin'] = Admin::where('role', '0')->first();
        $data['product'] = OrderProduct::where('order_id', $n_id)->with('color', 'size', 'order_detail', 'product')->get();
        return view('admin.Order.order-details', $data);
    }

    public function delete($id){
        $data=Order::find($id);
        if ($data->status == 1){
            $order = Order::with('products')->find($id);

            foreach ($order->products as $row)
            {
                $pro = product::find($row->id);
                $pro->stock = $pro->stock + $row->pivot->qty;
                $pro->save();
            }
        }
        $data->delete();
        return redirect()->route('order.view')->with('success', 'Data Deleted Successfully.');
    }

    public function status($id){
        $order=Order::where('id',$id)->first();
        $product=Order::with('products')->find($id);
        $order->status=1;
        foreach($product->products ?? [] as $delete){
            $id=$delete->id;
            $pro = product::find($id);
            $delete['stock']=$delete['stock']-$delete['pivot']['qty'];
            $pro->stock=$delete['stock'];
            $pro->save();
        }
        $order->save();
        return redirect()->back();
    }
    public function deliveryStatus($id){
        $order=Order::where('id',$id)->first();
        $order->status=2;
        $order->save();

        return redirect()->back();
    }
    public function returnPending($id){
        $order = Order::where('id', $id)->first();
        $order->status = 0;
        $order->save();

        /*Adding Ordered product quantity to  the stock*/
        $order1 = Order::with('products')->find($id);
        foreach ($order1->products as $row)
        {
            $pro = product::find($row->id);
            $pro->stock = $pro->stock + $row->pivot->qty;
            $pro->save();
        }
        /*end*/

        return redirect()->back();
    }
}
