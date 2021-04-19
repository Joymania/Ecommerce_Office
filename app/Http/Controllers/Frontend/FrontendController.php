<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use App\Model\category;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){   
        $sliders=Slider::all();
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        return view('Frontend.layouts.home', compact('sliders' , 'categories' , 'logos' , 'contacts'));
    }

    public function productByCat($id)
    {
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        return view('Frontend.layouts.productByCat' , compact('logos' , 'categories' , 'contacts'));
    }

    public function contact()
    {
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        return view('Frontend.layouts.contact' , compact('logos' , 'categories' , 'contacts'));
    }
    

    
}
