<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\product;
use App\User;
use App\Model\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store($prod_id, Request $request)
    {
        $this->validate($request,[
            'rating' => 'required',
            'review' => 'max:255'
        ]);

        $review = new review();
        $user = User::find(Auth::id());

        $review->product_id = $prod_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->name = $user->name;
        $review->email = $user->email;
        $review->save();


        $reviews = review::where('product_id',$prod_id)->get();

        if (sizeof($reviews) > 0){
              $ratingCount = $reviews->count();
              $sum = $reviews->sum('rating');
              $avg_rating = $sum/$ratingCount;
        }
        else{
              $ratingCount = 0;
              $avg_rating = 0;
        }
        // return $avg_rating;
        $product = product::find($prod_id);
        $product->avg_rating = $avg_rating;
        $product->save();

        return redirect()->back()->with(['status' => 'You have reviewed it!']);
    }
}
