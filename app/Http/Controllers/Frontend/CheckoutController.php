<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\Order;
use App\Model\OrderProduct;
use App\User;
use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
        $data['logos']=logo::first();
        $data['categories']=category::all();
        $data['contacts']=contacts::first();
        $data['users']=User::find(1);
        return view('Frontend.single_pages.checkout',$data);
    }

    public function store(Request $request){
       $order=Order::create([
        'user_id'=>auth()->user()? auth()->user()->id : null,
        'biling_fname'=>$request->fname,
        'biling_lname'=>$request->lname,
        'biling_address'=>$request->address,
        'biling_city'=>$request->city,
        'biling_phone'=>$request->phone,
        'biling_email'=>$request->email,
        'biling_notes'=>$request->notes,
        'payment'=>$request->payment,
       ]);

        foreach(Cart::content() as $content){

            OrderProduct::create([
                'order_id'=>$order->id,
                'product_id'=>$content->id,
                'qty'=>$content->qty,
                // 'size'=>$content->options->size_id,
                // 'color'=>$content->options->color_id

            ]);
        }
        return redirect()->back();
    }
    public function showTrack(){
        $data['logos']=logo::first();
        $data['categories']=category::all();
        $data['contacts']=contacts::first();
        return view('Frontend.single_pages.tracking',$data);
    }

    public function track(Request $request){
        $data['logos']=logo::first();
        $data['categories']=category::all();
        $data['contacts']=contacts::first();
            $data['orders']=Order::where('id',$request->order_id)->with('products')->first();
            return view('Frontend.single_pages.order_tracking',$data);
           //$email=$request->email;
           //dd($email);
           //$orders=Order::with('products')->find('khorshedicepust@gmail.com');
        //    dd($orders);
        //     foreach ($orders->products as $value) {
        //         echo $value['pivot']['order_id'];
        //     }

    }


}
