<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function productSizeList()
    {
        $sizes = size::all();
        return view('admin.products.products-sizes',compact('sizes'));
    }

    public function createSize()
    {
        return view('admin.products.add-product-size');
    }

    public function storeSize(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'size' => 'required'
        ]);
        size::create($request->all());
        return redirect()->route('products.sizes')->with('success','Size Successfully Added');
    }

    public function editSize(size $size)
    {
        return view('admin.products.edit-product-size',compact('size'));
    }

    public function updateSize(Request $request, size $size)
    {
        $this->validate($request, [
            'name' => 'required|unique:sizes,name,'.$size->id,
            'size' => 'required'
        ]);
        $size->update($request->all());

        return redirect()->route('products.sizes')->with('success',"Size Successfully Updated");
    }

    public function destroySize(size $size)
    {
        $size->delete();
        return redirect()->route('products.sizes')->with('success',"Size Successfully Deleted!");

    }
}
