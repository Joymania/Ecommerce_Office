<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\product;
use App\Model\Slider;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\review;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{

    public function index(){


         $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        // dd($cartpage->product->image);
        //  finding popular categories
        $prod = DB::table('order_product')->select('product_id', DB::raw('SUM(qty) as total_sales'))->groupBy('product_id')->orderByRaw('total_sales DESC')->limit(10)->get();

        $prod_id = array();
        foreach( $prod as $row){
            array_push( $prod_id , $row->product_id);
        }

        $cat = DB::table('products')->select('category_id')->whereIn('id', $prod_id)->get();

        $cat_id = array();
        foreach( $cat as $row){
            array_push( $cat_id , $row->category_id);
        }
        $popular_categories = category::find($cat_id);


        $data['sliders']=DB::table('products')->orderBy('created_at','desc')->take(2)->get();
        $logos = logo::all()->last();
        $categories = category::with('sub_category','product')->take(4)->get();
        $contacts = contacts::all()->last();

        // only flash deal products
        $date = Carbon::today()->toDateString();
        $products = product::where('end_date', '>=', $date)->with('reviews')->get();

        return view('Frontend.layouts.home', $data, compact('categories' , 'logos' , 'contacts' ,'products', 'popular_categories','cartpage' ));
    }


    public function contact()
    {
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        $products = product::all();
        return view('Frontend.layouts.contact' , compact('logos' , 'categories' , 'contacts' , 'products'));
    }

    public function aboutUs()
    {
        $logos = logo::all()->last();
        return view('Frontend.single_pages.about_us', compact('logos'));
    }


}
