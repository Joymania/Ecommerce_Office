<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\brand;
use App\Model\category;
use App\Model\product;
use App\Model\review;
use App\Model\size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\lessThanOrEqual;

class SearchController extends Controller
{
    public function searchResults(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        if (empty($category)){
            $products = product::where('name','LIKE','%'.$search.'%')->paginate(12);

        }else if (empty($category) && empty($search)){
            return back();
        }else{
            $products = DB::table('products')
                ->join('categories','products.category_id','=','categories.id')
                ->where('products.name','LIKE','%'.$search.'%')
                ->where('categories.name',$category)
                ->select('products.name','products.price','products.id')->paginate(12);
        }
        return view('Frontend.product-list.products',compact('products'));
    }


    public function filteredResult(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $first = $request->first;
        $second = $request->second;

        if (empty($category)){
            $products = product::where('name','LIKE','%'.$search.'%')
                ->where('products.price','<=',$second)
                ->where('products.price','>=',$first)->get();

        }else if (empty($search)){
            $products = DB::table('products')
                ->join('categories','products.category_id','=','categories.id')
                ->where('categories.name',$category)
                ->where('products.price','<=',$second)
                ->where('products.price','>=',$first)->get();
        }else{
            $products = DB::table('products')
                ->join('categories','products.category_id','=','categories.id')
                ->where('products.name','LIKE','%'.$search.'%')
                ->where('categories.name',$category)
                ->where('products.price','<',$second)
                ->where('products.price','>',$first)->get();
        }

        return response()->json($products,200);
    }
}
