<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\product;
use App\Model\size;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('admin.products.products-list',compact('products'));
    }

    public function create()
    {
        return view('admin.products.add-product');
    }

    public function productSizeList()
    {
        $sizes = size::all();
        return view('admin.products.products-sizes',compact('sizes'));
    }

}
