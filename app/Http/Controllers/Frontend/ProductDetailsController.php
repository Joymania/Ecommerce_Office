<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        $product = product::find($id);
        return view('Frontend.single_pages.product-details',compact('product'));
    }
}
