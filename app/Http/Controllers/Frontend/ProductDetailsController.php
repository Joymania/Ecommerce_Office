<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\product;
use App\Model\review;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        $categories = category::all();
        $product = product::find($id);
        $reviews = review::where('product_id',$id)->get();
        if (sizeof($reviews) > 0){
            $ratingCount = $reviews->count();
            $sum = $reviews->sum('rating');
            $rating = $sum/$ratingCount;
        }else{
            $ratingCount = 0;
            $rating = 0;
        }

        return view('Frontend.single_pages.product-details',
            compact('product','rating','ratingCount','reviews','categories'));
    }
}
