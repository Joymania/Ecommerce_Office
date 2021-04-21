<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\product; 
use App\Model\category;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($id) 
    {
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        $product = product::find($id);
        return view('Frontend.single_pages.product-details' , compact('logos' , 'categories' , 'contacts' , 'product'));
    }
}
