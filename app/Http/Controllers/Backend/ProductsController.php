<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\brand;
use App\Model\category;
use App\Model\color;
use App\Model\product;
use App\Model\size;
use App\Model\tag;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {

        return view('admin.products.products-list');
    }

    public function create()
    {
        $products = product::all();
        $categories = category::all();
        $brands = brand::all();
        $tags = tag::all();
        $colors = color::all();
        return view('admin.products.add-product',compact('products','categories','brands','tags','colors'));
    }

    public function productSizeList()
    {
        $sizes = size::all();
        return view('admin.products.products-sizes',compact('sizes'));
    }

}
