<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\brand;
use App\Model\category;
use App\Model\color;
use App\Model\product;
use App\Model\size;
use App\Model\SubImage;
use App\Model\tag;
use App\Model\sub_category;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;



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
            'name' => 'required',
            'price' => 'required',
            'short_desc' => 'max:255',
            'image' => 'required',
            'stock' => 'required',
            'stock_warning' => 'required'
        ]);

        $extension = $request->image->getClientOriginalExtension();
        $filename = rand(10000,99999).time().'.'.$extension;
        $request->image->move('upload/products_images',$filename);
        $request->image = $filename;
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
        $product->stock_warning = $request->stock_warning;
        $product->save();

        if ($request->color_id){
            $product->colors()->sync([$request->color_id]);
        }
        if ($request->size_id){
            $product->sizes()->sync([$request->size_id]);
        }

        if($request->hasfile('images'))
        {
           $product_id = product::select('id')->latest('id')->first();
            foreach($request->file('images') as $image)
            {
                $name = rand(10000,99999).time().'.'.$image->getClientOriginalExtension();
                $image->move('upload/products_images/sub_images',$name);
                $subImages = new SubImage();
                $subImages->product_id = $product_id->id;
                $subImages->image = $name;
                $subImages->save();
            }
        }

        return redirect()->route('products.list');
    }

    public function edit(product $product)
    {

        $categories = category::all();
        $brands = brand::all();
        $tags = tag::all();
        $colors = color::all();
        $sizes = size::all();
        $sub_category = sub_category::all();
        return view('admin.products.edit-product',
            compact('product','categories','brands','tags','colors','sizes','sub_category'));
    }

    public function update(Request $request, product $product)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'brand_id' => 'required',
            'tag_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'short_desc' => 'max:255',
            'stock' => 'required',
        ]);

        if ($request->hasFile('image')){
            unlink("upload/products_images/$request->old_image");
            $extension = $request->image->getClientOriginalExtension();
            $filename = rand(10000,99999).time().'.'.$extension;
            $request->image->move('upload/products_images',$filename);
            $product->image = $filename;
            $product->save();
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->tag_id = $request->tag_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->stock = $request->stock;
        $product->stock_warning = $request->stock_warning;
        $product->save();
        return redirect()->route('products.list');
    }

    public function destroy(product $product)
    {
        unlink("upload/products_images/$product->image");
        $subImages = SubImage::where('product_id',$product->id)->get();
        if (sizeof($subImages) > 0){
            foreach ($subImages as $row){
                unlink("upload/products_images/sub_images/$row->image");
            }
        }

        $product->delete();
        return redirect()->route('products.list')->with('delete','successfully deleted!!');
    }

}
