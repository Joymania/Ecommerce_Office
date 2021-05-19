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

class ProductBySubcatController extends Controller
{
    public function productByCat($id)
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $categories = category::with('sub_category')->get();
        $products = product::where('sub_category_id' , $id)->paginate(12);
        $subCatId = $id;
        return view('Frontend.layouts.productByCat', compact( 'categories' ,
            'products','cartpage','subCatId'));
    }

    public function priceFilter(Request $request,$id)
    {
        $first = $request->first;
        $second = $request->second;
        if ($second != ''){
            /*$products = product::with('reviews')->where('products.price','<=',$second)
                ->where('products.price','>=',$first)->get();*/
            $products = product::with('reviews')->join('sub_categories','sub_categories.id','=','products.sub_category_id')
                ->where('products.price','<=',$second)
                ->where('products.price','>=',$first)
                ->where('sub_categories.id',$id)
                ->select('products.id','products.name','products.price','products.image',
                    'products.promo_price','products.avg_rating')->get();
        }else{
            //$products = product::with('reviews')->where('products.price','>=',$first)->get();
            $products = product::with('reviews')->join('sub_categories','sub_categories.id','=','products.sub_category_id')
                ->where('products.price','>=',$first)
                ->where('sub_categories.id',$id)
                ->select('products.id','products.name','products.price','products.image',
                    'products.promo_price','products.avg_rating')->get();
        }

        return response()->json($products,200);
    }
}
