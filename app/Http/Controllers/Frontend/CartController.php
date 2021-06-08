<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\color;
use App\Model\cupon;
use App\Model\product;
use App\Model\product_color;
use App\Model\product_size;
use App\Model\ShippingMethods;
use App\Model\size;
use App\Model\wishlist;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Session;

class CartController extends Controller
{
     public function addtoCart(Request $request){

        $cartCount = 0;
        $product=product::where('id',$request->id)->first();
        $pro_size=product_size::where('product_id',$request->id)->first();
        $pro_color=product_color::where('product_id',$request->id)->first();
        // $product_size=size::where('id',$request->size_id)->first();
        // $product_color=color::where('id',$request->color_id)->first();
        $pro_size_name=0;
        $pro_color_name=0;
        if($pro_size!=NULL){
            $pro_size_name = size::where('id', $pro_size->size_id)->first();
        }
        if($pro_color!= NULL){
            $pro_color_name = color::where('id', $pro_color->color_id)->first();
        }

        if($product->promo_price){
            $subtotal=1 * $product->promo_price;
        }
        else{
            $subtotal=1 * $product->price;
        }

        if(Auth::user()){

            $idauth = Auth::id();
            $identity=$request->id;
            $sizeID=$request->size_id;
            $ajaxsizeID=0;
            $ajaxcolorId=0;
            if($pro_size!=NULL){
               $ajaxsizeID = $pro_size->size_id;
            }
            $colorId=$request->color_id;
            if($pro_color!=NULL){
              $ajaxcolorId = $pro_color->color_id;
            }

            $cartCheck=CartShopping::where('user_id',$idauth)->where('product_id',$identity)->where('product_size',$sizeID)->where('product_color',$colorId)->first();
            $cartajax=CartShopping::where('user_id', $idauth)->where('product_id', $identity)->first();

            if($cartajax==NULL){
                $flag = 1;
            $cart_add=new CartShopping();
            $cart_add->user_id=$idauth;
            $cart_add->product_id=$product->id;
                //$cart_add->product_size=$request->size_id;
                if($pro_size!=NULL){
                    $cart_add->product_size = $pro_size->size_id;
                }
                if($pro_color!=NULL){
                    $cart_add->product_color = $pro_color->color_id;
                }
                //$cart_add->product_color=$request->color_id;

                //$cart_add->qty=$request->qty;
                $cart_add->qty = 1;
            $cart_add->subtotal=$subtotal;
            $cart_add->save();
        }
        else{
                // return redirect()->route('show.cart');

                $cartajax = CartShopping::where('user_id', $idauth)->where('product_id', $identity)->first();
                $cartajax->qty=$cartajax->qty+1;
                $cartajax->save();
        }
            $cartCount = CartShopping::where('user_id', $idauth)->count();

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
                //'qty'=>$request->qty,
                'qty' =>1,
            'price'=>$price,
            'subtotal'=>$subtotal,
            'promo_price'=>$product->promo_price,
            'name'=>$product->name,
            'weight'=>550,
            'options'=>[
                    //'size_id' =>$request->size_id,
                    'size_id' => $pro_size ? $pro_size->size_id :null,
                 'size_name' => $pro_size_name ? $pro_size_name->name : null,
                    //  'color_id' =>$request->color_id,
                    'color_id' => $pro_color ? $pro_color->color_id :null,
                 'color_name' => $pro_color_name ? $pro_color_name->name :null,
                'image'=>$product->image
            ]

        ]);
             $cartCount = Cart::content()->count();

        }
        if(Auth::user()){
            //$id = Auth::id();
            $data['cartpage'] = CartShopping::with('product')->where('user_id', Auth::id())->where('status', '0')->get();
            $data['cart_num']=CartShopping::where('user_id', Auth::id())->count();
            $minicart = view('Frontend.layouts.minicart',$data)->render();
        }
        else{
            $minicart=view('Frontend.layouts.minicart')->render();
        }




        //return redirect()->route('show.cart')->with('success2','Product added Successfully.');
        return response()->json([
        'success'=>'Cart added Successfully.',
        'minicart'=>$minicart,
        'cartCount' => $cartCount,
        //  'pro_size'=> $pro_size_name,
        //  'pro_color'=> $pro_color_name
         ]);
    }
    
     public function addtoCartAjax(Request $request)
    {
        $cartCount = 0;
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
                $cartCount = CartShopping::where('user_id',$idauth)->count();
            }
            else{
                $cartajax = CartShopping::where('user_id', $idauth)->where('product_id', $identity)->first();
                $cartajax->qty=$cartajax->qty+ (int)$request->qty;
                $cartajax->save();
                $cartCount = CartShopping::where('user_id',$idauth)->count();
                //return response()->json(['cartCount' => $cartCount], 200);
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
            $cartItems = Cart::content();
            $flag = 0;
            $rowId = '';
            foreach ($cartItems as $row){
                if ($row->id == $request->id && $row->options->size_id == $request->size_id && $row->options->color_id == $request->color_id){
                    $flag = 1;
                    $rowId = $row->rowId;
                    break;
                }

            }

            if ($flag == 0) {
                Cart::add([
                    'id' => $product->id,
                    'qty' => (int)$request->qty,
                    'price' => $price,
                    'subtotal' => $subtotal,
                    'promo_price' => $product->promo_price,
                    'name' => $product->name,
                    'weight' => 550,
                    'options' => [
                        'size_id' => $request->size_id ? $request->size_id : null,
                        'size_name' => $product_size ? $product_size->name : null,
                        'color_id' => $request->color_id ? $request->color_id : null,
                        'color_name' => $product_color ? $product_color->name : null,
                        'image' => $product->image
                    ]

                ]);
            }else{
                $pro = Cart::get($rowId);
                Cart::update($rowId, [
                    'id' => $product->id,
                    'qty' => (int)$pro->qty + (int)$request->qty,
                    'price' => $price,
                    'subtotal' => $subtotal,
                    'promo_price' => $product->promo_price,
                    'name' => $product->name,
                    'weight' => 550,
                    'options' => [
                        'size_id' => $request->size_id ? $request->size_id : null,
                        'size_name' => $product_size ? $product_size->name : null,
                        'color_id' => $request->color_id ? $request->color_id : null,
                        'color_name' => $product_color ? $product_color->name : null,
                        'image' => $product->image
                    ]
                ]);
            }

            $cartCount = Cart::content()->count();
        }
        if(Auth::user()){
            //$id = Auth::id();
            $data['cartpage'] = CartShopping::with('product')->where('user_id', Auth::id())->where('status', '0')->get();
            $data['cart_num']=CartShopping::where('user_id', Auth::id())->count();
            $minicart = view('Frontend.layouts.minicart',$data)->render();
        }
        else{
            $minicart=view('Frontend.layouts.minicart')->render();
        }

        return response()->json([
            'minicart'=>$minicart,
            'cartCount' => $cartCount,
        ]);
    }
    

    public function showCart(){

        // if(Auth::user()){
        //     $idauth=Auth::id();
        // }
        $data['shipping'] = ShippingMethods::all();
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
            return response()->json([
                'total' => $cart_add->subtotal,
            ]);
        }
    if($request->rowId){
         Cart::update($request->rowId, $request->qty);
            return response()->json([
                'total' => Cart::subtotal(),
            ]);
    }

        //return redirect()->route('show.cart');
        // return response()->json([
        //     'success' => Cart::subtotal(),
        //     //  'pro_size'=> $pro_size_name,
        //     //  'pro_color'=> $pro_color_name
        // ]);
    }
    public function cartadd(Request $request){
        $product = product::where('id', $request->id)->first();
        $product_size = size::where('id', $request->size_id)->first();
        $product_color = color::where('id', $request->color_id)->first();
        if ($product->promo_price) {
            $subtotal = $request->qty * $product->promo_price;
        } else {
            $subtotal = $request->qty * $product->price;
        }


        if (Auth::user()) {

            $idauth = Auth::id();
            $identity = $request->id;
            $sizeID = $request->size_id;
            $colorId = $request->color_id;
            $cartCheck = CartShopping::where('user_id', $idauth)->where('product_id', $identity)->where('product_size', $sizeID)->where('product_color', $colorId)->first();

            if ($cartCheck == NULL) {
                $cart_add = new CartShopping();
                $cart_add->user_id = $idauth;
                $cart_add->product_id = $product->id;
                $cart_add->product_size = $request->size_id;
                $cart_add->product_color = $request->color_id;
                $cart_add->qty = $request->qty;
                $cart_add->subtotal = $subtotal;
                $cart_add->save();
            } else {
                return redirect()->route('show.cart');
            }
        } else {
            if (!empty($product->promo_price)) {
                $price = $product->promo_price;
            } else {
                $price = $product->price;
            }

            $subtotal = $request->qty * $price;

            Cart::add([
                'id' => $product->id,
                'qty' => $request->qty,
                'price' => $price,
                'subtotal' => $subtotal,
                'promo_price' => $product->promo_price,
                'name' => $product->name,
                'weight' => 550,
                'options' => [
                    'size_id' => $request->size_id,
                    'size_name' => $product_size ? $product_size->name : null,
                    'color_id' => $request->color_id,
                    'color_name' => $product_color ? $product_color->name : null,
                    'image' => $product->image
                ]

            ]);
        }

        return redirect()->route('show.cart')->with('success2', 'Product added Successfully.');

    }
    // public function cartupdate(Request $request)
    // {
    //     if ($request->id) {
    //         $id = $request->id;
    //         $cart_add = CartShopping::find($id);

    //         $cartprice = $cart_add->subtotal / $cart_add->qty;
    //         $cart_add->qty = $request->qty;
    //         $cart_add->subtotal = $request->qty * $cartprice;
    //         $cart_add->save();
    //     }
    //     if ($request->rowId) {
    //         Cart::update($request->rowId, $request->qty);
    //     }

    //     return redirect()->route('show.cart');
    // }

    public function deleteCart($rowId){

        Cart::remove($rowId);
        return redirect()->route('show.cart')->with('success1','Product removed Successfully.');
    }
    public function deletewishlist($id){
        $data=wishlist::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function deleteAuthCart($id){
        $data=CartShopping::find($id);
        $data->delete();
        return redirect()->route('show.cart')->with('success1','Product removed Successfully.');
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
        return redirect()->route('show.cart')->with('success1','Product removed Successfully.');

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
