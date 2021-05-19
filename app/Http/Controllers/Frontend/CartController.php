<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\color;
use App\Model\cupon;
use App\Model\product;
use App\Model\size;
use App\Model\wishlist;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Session;


class CartController extends Controller
{


    public function addtoCart(Request $request){

         /*$this->validate($request,[
             'size_id'=>'required',
             'color_id'=>'required'
             ]);*/
        $product=product::where('id',$request->id)->first();
        $product_size=size::where('id',$request->size_id)->first();
        $product_color=color::where('id',$request->color_id)->first();
        if($product->promo_price){
            $subtotal=$request->qty * $product->promo_price;
        }
        else{
            $subtotal=$request->qty * $product->price;
        }


        if(Auth::user()){

            $idauth = Auth::id();
            $identity=$request->id;
            $sizeID=$request->size_id;
            $colorId=$request->color_id;
            $cartCheck=CartShopping::where('user_id',$idauth)->where('product_id',$identity)->where('product_size',$sizeID)->where('product_color',$colorId)->first();

            if($cartCheck==NULL){
            $cart_add=new CartShopping();
            $cart_add->user_id=$idauth;
            $cart_add->product_id=$product->id;
            $cart_add->product_size=$request->size_id;
            $cart_add->product_color=$request->color_id;
            $cart_add->qty=$request->qty;
            $cart_add->subtotal=$subtotal;
            $cart_add->save();

        }
        else{
            return redirect()->route('show.cart');
        }

        }
        else{
            if(!empty($product->promo_price)){
                $price=$product->promo_price;
            }
            else{
                $price=$product->price;
            }

            $subtotal=$request->qty * $price;
            
             Cart::add([
            'id'=>$product->id,
            'qty'=>$request->qty,
            'price'=>$price,
            'subtotal'=>$subtotal,
            'promo_price'=>$product->promo_price,
            'name'=>$product->name,
            'weight'=>550,
            'options'=>[
                 'size_id' =>$request->size_id,
                 'size_name' => $product_size ? $product_size->name : null,
                 'color_id' =>$request->color_id,
                 'color_name' => $product_color ? $product_color->name :null,
                'image'=>$product->image
            ]

        ]);

        }

        return redirect()->route('show.cart')->with('success','Product added Successfully.');
    }

    public function showCart(){
       
        // if(Auth::user()){
        //     $idauth=Auth::id();
        // }
        $data['cartpage']=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $id = Auth::id();
            if($id){
            $data['showCart']=CartShopping::with('product','color','size')->where(function($querry)use($id) {
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
    public function deletewishlist($id){
        $data=wishlist::find($id);
        $data->delete();
        return redirect()->back();
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
        $id = Auth::id();
            if($id){
            $showCart=CartShopping::with('product')->where(function($querry)use($id) {
                $querry->where('user_id',$id)->where('status','0');
            })->get();

        }
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $check=cupon::where('cupon',$request->cupon)->first();
        //dd($check);
        $discount=0;
        if($check!=NULL){
            $discount=$check->discount;

        }
        $key='cartcupon-'.auth()->id();

        //Session::forget($key);
        Session::push($key,$discount);
        return redirect()->back();
        // return view('Frontend.single_pages.checkout',compact('check','cartpage','showCart') );



    }


}
