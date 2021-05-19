<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
    public function searchResults(Request $request)
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $search = $request->search;
        $category = $request->category;
        $categories = category::all();
        $products = product::where('name','LIKE','%'.$search.'%')->paginate(12);
        return view('Frontend.product-list.products',compact('products','categories','cartpage'));
    }


    public function filteredResult(Request $request)
    {
        $first = $request->first;
        $second = $request->second;
        if ($second != ''){
        $products = product::with('reviews')->where('products.price','<=',$second)
            ->where('products.price','>=',$first)->get();
        }else{
            $products = product::with('reviews')->where('products.price','>=',$first)->get();
        }

        return response()->json($products,200);
    }

    public function ajaxSearch(Request $request)
    {
        $products = product::with('reviews')->where('name','LIKE','%'.$request->search.'%')->get();
        return response()->json($products, 200);
    }

    public function categoryProducts(Request $request)
    {
        $products = product::with('reviews')->join('categories','products.category_id','categories.id')
                        ->where('categories.name','=',$request->category)
                        ->select('products.name','products.price','products.id','products.image','products.promo_price','avg_rating')->get();
        return response()->json($products,200);
    }
}
