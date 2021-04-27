<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view(){
        $data['alldata']=Order::all();
        //dd($data['alldata']);
        return view('admin.Order.order-view',$data);
    }

        public function details($id){
            $data['order']=Order::find($id);
            $data['product']=Order::where('id',$id)->with('products','color','size')->first();
            //return $data['product'];
            return view('admin.Order.order-details',$data);

        }

        public function delete($id){
            $data=Order::find($id);
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
}
