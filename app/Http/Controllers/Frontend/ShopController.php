<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $categories = category::with('sub_category')->get();
        $products = product::latest()->paginate(12);
        return view('Frontend.single_pages.shop', compact('products','cartpage','categories'));
    }
}
