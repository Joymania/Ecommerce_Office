<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $logos = logo::orderByDesc('id')->first();
        $contacts = contacts::all()->last();
        $categories = category::with('sub_category')->get();
        $products = product::latest()->paginate(12);
        return view('Frontend.single_pages.shop', compact('products','logos' , 'contacts' ,'cartpage','categories'));
    }
}
