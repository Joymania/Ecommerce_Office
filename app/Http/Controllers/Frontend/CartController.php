<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\color;
use App\Model\cupon;
use App\Model\product;
use App\Model\size;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function addtoCart(Request $request){
        // $this->validate($request,[
        //     'size_id'=>'required',
        //     'color_id'=>'required'
        // ]);
        $product=product::where('id',$request->id)->first();
        // $product_size=size::where('id',$request->size_id)->first();

        // $product_color=color::where('id',$request->color_id)->first();

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
        return redirect()->route('show.cart')->with('success','Product added Successfully.');
    }
    public function showCart(){
        return view('Frontend.single_pages.shopping-cart');
    }

    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
        return redirect()->route('show.cart');
    }

    public function deleteCart($rowId){
        Cart::remove($rowId);
        return redirect()->route('show.cart')->with('success','Product removed Successfully.');
    }

    public function destroyCart(){
        Cart::destroy();
        return redirect()->route('show.cart');
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
