<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\CartShoppingProduct;
use App\Model\category;
use App\Model\color;
use App\Model\contacts;
use App\Model\cupon;
use App\Model\logo;
use App\Model\Order;
use App\Model\product;
use App\Model\size;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;


class CartController extends Controller
{


    public function addtoCart(Request $request){

        //dd($id);
        // $this->validate($request,[
        //     'size_id'=>'required',
        //     'color_id'=>'required'
        // ]);
        $product=product::where('id',$request->id)->first();
        $product_size=size::where('id',$request->size_id)->first();
        $product_color=color::where('id',$request->color_id)->first();


        Cart::add([
            'id'=>$product->id,
            'qty'=>$request->qty,
            'price'=>$product->price,
            'name'=>$product->name,
            'weight'=>550,
            'options'=>[
                // 'size_id' =>$request->size_id,
                // 'size_name' =>$product_size->name,
                // 'color_id' =>$request->color_id,
                // 'color_name' =>$product_color->name,
                'image'=>$product->image

            ]

        ]);

        $subtotal=$request->qty * $product->price;

            $idauth = Auth::id();
            if($idauth){
            $cart_add=new CartShopping();
            $cart_add->user_id=$idauth;
            $cart_add->product_id=$product->id;
            $cart_add->product_size=$product_size;
            $cart_add->product_color=$product_color;
            $cart_add->qty=$request->qty;
            $cart_add->subtotal=$subtotal;
            $cart_add->save();

            }

        return redirect()->route('show.cart')->with('success','Product added Successfully.');
    }

    public function showCart(){
        $data['logos']=logo::first();
        $data['categories']=category::all();
        $data['contacts']=contacts::first();
        $id = Auth::id();
            if($id){
            $data['showCart']=CartShopping::with('product')->where(function($querry)use($id) {
                $querry->where('user_id',$id)->where('status','0');
            })->get();

        }

        return view('Frontend.single_pages.shopping-cart',$data);

    }

    public function updateCart(Request $request){
        if($request->id){
            $id=$request->id;
            $cart_add=CartShopping::find($id);
            $cartprice=$cart_add->subtotal/$cart_add->qty;
            $cart_add->qty=$request->qty;
            $cart_add->subtotal=$request->qty * $cartprice;
            $cart_add->save();

        }
    if($request->rowId){
         Cart::update($request->rowId, $request->qty);
    }

        return redirect()->route('show.cart');
    }

    public function deleteCart($rowId){

        Cart::remove($rowId);
        return redirect()->route('show.cart')->with('success','Product removed Successfully.');
    }
    public function deleteAuthCart($id){
        $data=CartShopping::find($id);
        $data->delete();
        return redirect()->route('show.cart')->with('success','Product removed Successfully.');
    }

    public function destroyCart(){
        Cart::destroy();
        return redirect()->route('show.cart');
    }
    public function destroyAauthCart($id){
        $cart=CartShopping::where('user_id',$id)->get();
        foreach($cart as $cart){
            $cart->delete();
        }
        return redirect()->route('show.cart')->with('success','Product removed Successfully.');

    }
    public function applyCuppon(Request $request){
        $check=cupon::where('cupon',$request->cupon)->first();
        $cart=Cart::subtotal();

        if($check){
           Session::put('cupon', [
               'cupon'=> $request->cupon,
               'discount'=> $check->discount,
               'blance'=>$cart - $check->discount,
           ]);
           return redirect()->back();

        }

        return redirect()->back()->with('error','Invalid Cupon!');
    }


}
