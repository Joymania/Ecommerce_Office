<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\CartShopping;
use App\Model\ShippingMethods;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Notifications\OrderNotification;
use App\User;
use Illuminate\Http\Request;
use Cart;
use Dotenv\Validator;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;
Use Session;

class CheckoutController extends Controller
{
    public function index(Request $request){
        
        $cart = CartShopping::where('user_id',Auth::id())->where('status','0')->update(['shipping_method_id' => $request->shipping_method]);
        // $cart->shipping_method_id = $request->shipping_method;
        // $cart->save();

        $data['users']=Auth::user();

        $data['cartpage']=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();

        $id = Auth::id();

            if($id){
            $data['showCart']=CartShopping::with('product')->where(function($querry)use($id) {
                $querry->where('user_id',$id)->where('status','0');
            })->get();
        }
        return view('Frontend.single_pages.checkout',$data);

}

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'payment'=>'required'
        ]);

         if(Auth::user()){
             $idauth=Auth::id();
             $cartsubtotal=CartShopping::where('user_id',$idauth)->get();
             $subtotal=0;

             foreach($cartsubtotal as $cart){
                if($cart->product->promo_price){
                    $total = $cart->product->promo_price * $cart->qty;
                }
                else  
                    $total = $cart->product->price * $cart->qty;

                $subtotal+=$total;
             }
             $key='cartcupon-'.auth()->id();
             if(Session::has($key)){
                //  dd(Session::get('cartcupon'));


                 $subtotal=$subtotal-Session::get($key)[0];
             }
            //  add shipping cost
             $subtotal+= $cartsubtotal['0']->shippingMethod->cost;
         }
         else{
             $subtotal=Cart::subtotal();
         }

       $order=Order::create([
        'user_id'=>auth()->user()? auth()->user()->id : null,
        'biling_fname'=>$request->name,
        'biling_lname'=>$request->lname,
        'biling_address'=>$request->address,
        'biling_city'=>$request->city,
        'biling_phone'=>$request->phone,
        'biling_email'=>$request->email,
        'biling_notes'=>$request->notes,
        'payment'=>$request->payment,
        'subtotal'=>$subtotal,
        'shipping_method_id'=>$cartsubtotal['0']->shippingMethod->id,
        'transaction'=>$request->transaction,
        'bkash_mobile'=>$request->bkash_mobile,
       ]);
       if(Auth::user()){
        $idauth=Auth::id();
        $cartShop=CartShopping::where('user_id',$idauth)->where('status','0')->get();

        //dd($cartShop[0]->product_id);
        foreach($cartShop as $confirmOrder){
            OrderProduct::create([
                'order_id'=>$order->id,
                'product_id'=>$confirmOrder->product_id,
                'qty'=>$confirmOrder->qty,
                'size_id'=>$confirmOrder->product_size,
                'color_id'=>$confirmOrder->product_color,
            ]);
            $confirmOrder->delete();
            Session::forget('cartcupon-'.auth()->id());

        }


    }
    else{
        foreach(Cart::content() as $content){

            OrderProduct::create([
                'order_id'=>$order->id,
                'product_id'=>$content->id,
                'qty'=>$content->qty,
                'size_id'=>$content->options->size_id,
                'color_id'=>$content->options->color_id
            ]);
        }
        Cart::destroy();
    }
    $name=$request->name;
    $admin = Admin::all();
    Notification::send($admin, new OrderNotification($name));

        return redirect()->route('frontsite')->with('success', 'Your Order has been placed Successfully.');
    }
    public function showTrack(){
        $data['cartpage']=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        return view('Frontend.single_pages.tracking',$data);
    }

    public function track(Request $request){
        $id=Auth::id();
        $data['cartpage']=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $data['orders']=Order::where('user_id',$id)->where('id',$request->order_id)->where('biling_email',$request->email)->first();
        return view('Frontend.single_pages.order_tracking',$data);

    }


}
