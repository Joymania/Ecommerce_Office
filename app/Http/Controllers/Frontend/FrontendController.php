<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\product;
use App\Model\Slider;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function index(){   
        $data['sliders']=DB::table('products')->orderBy('created_at','desc')->take(2)->get();
        $logos = logo::all()->last();
        $categories = category::with('sub_category','product')->take(-4)->get();
        $contacts = contacts::all()->last();
        $products = product::all();
        return view('Frontend.layouts.home', $data, compact('categories' , 'logos' , 'contacts' ,'products' ));
    }
 

    public function contact()
    {
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        $products = product::all();
        return view('Frontend.layouts.contact' , compact('logos' , 'categories' , 'contacts' , 'products'));
    }

}
