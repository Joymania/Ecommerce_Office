<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferProductsController extends Controller
{
    public function index()
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $products = product::where('promo_price' , '!=','null')->paginate(12);
        $categories = category::with('sub_category')->get();
        return view('Frontend.single_pages.offer-products',compact('cartpage','products','categories'));
    }

    public function priceFilter(Request $request)
    {
        $first = $request->first;
        $second = $request->second;
        if ($second != ''){
            $products = product::with('reviews')->where('promo_price','!=','null')
                ->where('price','<=',$second)
                ->where('price','>=',$first)->get();
        }else{
            $products = product::where('promo_price','!=','null')
                        ->where('price','>=',$first)->get();
        }

        return response()->json($products,200);
    }

    public function ajaxSearch(Request $request)
    {
        $products = product::with('reviews')->where('promo_price','!=','null')
                    ->where('name','LIKE','%'.$request->search.'%')->get();
        return response()->json($products, 200);
    }

    public function categoryProducts(Request $request)
    {
        $products = product::with('reviews')->join('categories','products.category_id','categories.id')
            ->where('products.promo_price','!=','null')
            ->where('categories.name','=',$request->category)
            ->select('products.name','products.price','products.id','products.image','products.promo_price')->get();
        return response()->json($products,200);
    }
}
