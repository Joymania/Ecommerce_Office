<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\product;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use Illuminate\Support\Facades\Auth;

class ProductBySubcatController extends Controller
{
    public function productByCat($id)
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $logos = logo::all()->last();
        $categories = category::with('sub_category')->get();
        $contacts = contacts::all()->last();
        $products = product::where('sub_category_id' , $id)->paginate(12);
        return view('Frontend.layouts.productByCat', compact('logos' , 'categories' , 'contacts' , 'products','cartpage'));
    }
}
