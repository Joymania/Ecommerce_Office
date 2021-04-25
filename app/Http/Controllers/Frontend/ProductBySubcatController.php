<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\product;
use App\Model\category;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductBySubcatController extends Controller
{ 
    public function productByCat($id)
    {
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        $products = product::all()->where('sub_category_id' , $id);
        return view('Frontend.layouts.productByCat', compact('logos' , 'categories' , 'contacts' , 'products'));
    }
    
    // product

    
}
