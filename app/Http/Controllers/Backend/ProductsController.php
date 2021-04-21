<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\brand;
use App\Model\category;
use App\Model\color;
use App\Model\product;
use App\Model\size;
use App\Model\tag;
use App\Model\sub_category;
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

        $categories = category::all();
        $brands = brand::all();
        $tags = tag::all();
        $colors = color::all();
        $sizes = size::all();
        $sub_category = sub_category::all();
        return view('admin.products.add-product',compact('categories','brands','tags','colors','sizes','sub_category'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'brand_id' => 'required',
            'tag_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'short_desc' => 'max:255',
            'image' => 'required',
            'stock' => 'required'
        ]);

        $extension = $request->image->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $request->image->move('upload/products_images',$filename);
        
        $product = new product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->tag_id = $request->tag_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->image = $filename;
        $product->stock = $request->stock;
        $product->save();
        $product->colors()->sync([$request->color_id]);
        $product->sizes()->sync([$request->size_id]);
        return redirect()->route('products.list');

    }

}
