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
            'short_desc' => 'required|max:255',
            'image' => 'required',
            'stock' => 'required',
            'stock_warning' => 'required',
            'buying_price' => 'required'
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
        $product->buying_price = $request->buying_price;

        if($request->promo == 1){
            $product->promo_price = $request->promo_price;
            $product->start_date = $request->start_date;
            $product->end_date = $request->end_date;
        }

        $product->save();

        if (!empty($request->color_id) > 0){
            $product->colors()->attach($request->color_id);
        }
        if (!empty($request->size_id) > 0){
            $product->sizes()->attach($request->size_id);
        }

        if($request->hasfile('images'))
        {
           $product_id = product::select('id')->latest('id')->first();
            $i = 0;
            foreach($request->file('images') as $image)
            {
                $name = rand(10000,99999).time().'.'.$image->getClientOriginalExtension();
                $image->move('upload/products_images/sub_images',$name);
                $subImages = new SubImage();
                $subImages->product_id = $product_id->id;
                $subImages->image = $name;
                if (!empty($request->color[$i])){
                    $subImages->color_id = $request->color[$i];
                }
                $subImages->save();
                $i++;
            }
        }

        return redirect()->route('products.list')->with('success_msg','Product added Successfully');
    }

    public function edit(product $product)
    {
        // dd($product);
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
            'tag_id' => '',
            'name' => 'required',
            'price' => 'required',
            'short_desc' => 'required|max:255',
            'stock' => 'required',
            'buying_price' => 'required',
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


        if($request->promo == 1){
            $product->promo_price = $request->promo_price;
            $product->start_date = $request->start_date;
            $product->end_date = $request->end_date;
            $product->save();
        }
        else {
            $product->promo_price = null;
            $product->start_date = null;
            $product->end_date = null;
            $product->save();
        }

        $product->save();

        if($request->hasfile('images'))
        {
            // $product_id = $product->id;

            $subImages = SubImage::where('product_id',$product->id)->get();
            if (sizeof($subImages) > 0){
                foreach ($subImages as $row){
                    unlink("upload/products_images/sub_images/$row->image");
                    $row->delete();
                }
            }

            $i = 0;
            foreach($request->file('images') as $image)
            {
                $name = rand(10000,99999).time().'.'.$image->getClientOriginalExtension();
                $image->move('upload/products_images/sub_images',$name);
                $subImages = new SubImage();
                $subImages->product_id = $product->id;
                $subImages->image = $name;
                if (!empty($request->color[$i])){
                    $subImages->color_id = $request->color[$i];
                }
                $subImages->save();
                $i++;
            }
        }

        $product->colors()->detach();
        if (!empty($request->color_id) > 0){
            $product->colors()->attach($request->color_id);
        }
        $product->sizes()->detach();
        if (!empty($request->size_id) > 0){
            $product->sizes()->attach($request->size_id);
        }
        return redirect()->route('products.list')->with('success_msg','Product Successfully updated');
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
        SubImage::where('product_id',$product->id)->delete();
        $product->colors()->detach();
        $product->sizes()->detach();
        $product->delete();
        return redirect()->route('products.list')->with('success_msg','Product Successfully deleted!');
    }

}
