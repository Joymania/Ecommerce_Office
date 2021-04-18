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
        $this->validate($request,[
            'size_id'=>'required',
            'color_id'=>'required'
        ]);
        $product=product::where('id',$request->id)->first();

        Cart::add([
            'id'=>$product->id,
            'qty'=>$request->qty,
            'price'=>$product->price,
            'name'=>$product->name,
            'weight'=>550,
            'options'=>[
                'image'=>$product->image

            ]

        ]);
        return redirect()->route('show.cart')->with('success','Product added Successfully.');
    }
    public function showCart(){
        return view('Frontend.single_pages.shopping-cart');
    }

    public function updateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
        return redirect()->route('show.cart')->with('success','Product updated Successfully.');

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
        if($check){
            $request->session()->put('cupon', [
                'cupon'=>$request->cupon,
                'discount'=>$check->discount,
                'balance'=>Cart::subtotal() - $check->discount,
            ]);
        }
        return redirect()->back();
    }


}
