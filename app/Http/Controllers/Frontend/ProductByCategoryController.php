<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\product;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductByCategoryController extends Controller
{
    public function productByCategory($id)
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $products = product::where('category_id' , $id)->paginate(12);
        $categories = category::with('sub_category')->get();
        $catId = $id;
        return view('Frontend.layouts.productByCat', compact('products','cartpage','categories','catId'));
    }

    public function priceFilter(Request $request,$id)
    {
        $first = $request->first;
        $second = $request->second;
        if ($second != ''){
            /*$products = product::with('reviews')->where('products.price','<=',$second)
                ->where('products.price','>=',$first)->get();*/
            $products = product::with('reviews')->join('categories','categories.id','=','products.category_id')
                            ->where('products.price','<=',$second)
                            ->where('products.price','>=',$first)
                            ->where('categories.id',$id)
                    ->select('products.id','products.name','products.price','products.image',
                    'products.promo_price','products.avg_rating')->get();
        }else{
           //$products = product::with('reviews')->where('products.price','>=',$first)->get();
            $products = product::with('reviews')->join('categories','categories.id','=','products.category_id')
                ->where('products.price','>=',$first)
                ->where('categories.id',$id)
                ->select('products.id','products.name','products.price','products.image',
                    'products.promo_price','products.avg_rating')->get();
        }

        return response()->json($products,200);
    }
}
