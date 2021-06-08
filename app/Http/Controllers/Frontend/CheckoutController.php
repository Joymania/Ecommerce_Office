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
use Carbon\Carbon;

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
        // dd($request->all());

        //  unique order code
        // function generateRandomString($length = 25) {
        //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //     $charactersLength = strlen($characters);
        //     $randomString = '';
        //     for ($i = 0; $i < $length; $i++) {
        //         $randomString .= $characters[rand(0, $charactersLength - 1)];
        //     }
        //     return $randomString;
        // }
        $count = 0;
        $order_code = uniqid();

        while(true){
            $same = Order::where('order_code', $order_code)->first();
            if($same){
                $order_code = $order_code.(++$count);
            }
            else{
                break;
            }
        }


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
             $subtotal+= $cartsubtotal['0']->shippingMethod ? $cartsubtotal['0']->shippingMethod->cost : 0;
         }
         else{
             $subtotal=Cart::subtotal();
         }
                 $dateToday = Carbon::today()->toDateString();


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
        'shipping_method_id'=> $cartsubtotal['0']->shippingMethod ? $cartsubtotal['0']->shippingMethod->id : null,
        'transaction'=>$request->transaction,
        'bkash_mobile'=>$request->bkash_mobile,
        'date'=>$dateToday,
        'order_code' => $order_code
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
        /*$id=Auth::id();
        $data['cartpage']=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $data['orders']=Order::where('user_id',$id)->where('id',$request->order_id)->where('biling_email',$request->email)->first();
        if($data['orders']==NULL){
            $notification = array(
                'message' => 'Data not Found!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }

        return view('Frontend.single_pages.order_tracking', $data);*/
        $data = Order::select('status')->where('user_id',Auth::id())
                            ->where('order_code',$request->order_code)->first();
        return response()->json($data,200);

    }


}
