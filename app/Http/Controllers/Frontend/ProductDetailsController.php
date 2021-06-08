<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\OrderProduct;
use App\Model\product;
use App\Model\review;
use App\Model\product_color;
use App\Model\product_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $product = product::find($id);
        $reviews = review::where('product_id',$id)->get();
        $reviews1 = review::where('product_id',$id)->limit(3)->get();
        $colors= product_color::where('product_id',$product->id)->get();
        $sizes=product_size::where('product_id',$product->id)->get();
        $orders = OrderProduct::where('product_id',$id)->count();
      if (sizeof($reviews) > 0){
            $ratingCount = $reviews->count();
            $sum = $reviews->sum('rating');
            $rating = ceil($sum/$ratingCount);
        }else{
            $ratingCount = 0;
            $rating = 0;
        }

        return view('Frontend.single_pages.product-details' , compact('product', 'rating', 'ratingCount','reviews','colors','sizes','cartpage','orders','reviews1'));

    }
    
    //index_ajax
    public function index_ajax($id)
    {
        $cartpage = CartShopping::with('product')->where('user_id', Auth::id())->where('status', '0')->get();
        $product = product::find($id);
        $reviews = review::where('product_id', $id)->get();
        $reviews1 = review::where('product_id', $id)->limit(3)->get();
        $colors = product_color::where('product_id', $product->id)->get();
        $sizes = product_size::join('sizes', 'sizes.id', 'product_sizes.size_id')->where('product_id', $product->id)->get();
        $orders = OrderProduct::where('product_id', $id)->count();
        if (sizeof($reviews) > 0) {
            $ratingCount = $reviews->count();
            $sum = $reviews->sum('rating');
            $rating = ceil($sum / $ratingCount);
        } else {
            $ratingCount = 0;
            $rating = 0;
        }
        $response = [
            'product' => $product,
            'reviews' => $reviews,
            'colors' => $colors,
            'sizes'  => $sizes,
            'orders' => $orders,
            'rating' => $rating,
            'ratingCount' => $ratingCount

        ];
        return response()->json($response);
    }

    public function reviewsWithoutLimit($id)
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $product = product::find($id);
        $reviews = review::where('product_id',$id)->get();
        $reviews1 = review::where('product_id',$id)->get();
        $colors=product_color::where('product_id',$product->id)->get();
        $sizes=product_size::join('sizes','sizes.id','product_sizes.id')
                    ->where('product_sizes.product_id',$product->id)->get();
        $orders = OrderProduct::where('product_id',$id)->count();
        if (sizeof($reviews) > 0){
            $ratingCount = $reviews->count();
            $sum = $reviews->sum('rating');
            $rating = ceil($sum/$ratingCount);
        }else{
            $ratingCount = 0;
            $rating = 0;
        }
        return view('Frontend.single_pages.product-details' ,
            compact( 'cartpage', 'product',
                'rating', 'ratingCount','reviews','colors','sizes','orders','reviews1'));
    }
}
