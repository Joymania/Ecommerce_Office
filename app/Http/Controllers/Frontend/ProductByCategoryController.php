<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\product;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;


class ProductByCategoryController extends Controller
{ 
    public function productByCategory($id)
    {
        $logos = logo::all()->last();
        $contacts = contacts::all()->last();
        $products = product::where('category_id' , $id)->get();
        return view('Frontend.layouts.productByCat', compact('logos' , 'contacts' , 'products'));
    }   
}
