<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\product;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use Illuminate\Support\Facades\Auth;

class ProductByCategoryController extends Controller
{
    public function productByCategory($id)
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $logos = logo::all()->last();
        $contacts = contacts::all()->last();
        $products = product::where('category_id' , $id)->get();
        return view('Frontend.layouts.productByCat', compact('logos' , 'contacts' , 'products','cartpage'));
    }
}
