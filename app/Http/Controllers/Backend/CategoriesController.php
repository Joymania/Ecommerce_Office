<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.categories-view',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.categories-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name'
        ]);
        category::create($request->all());
        return redirect()->route('categories.list');
    }

    public function edit(category $category)
    {
        return view('admin.categories.categories-edit',compact('category'));
    }

    public function update(Request $request, category $category)
    {
        $this->validate($request,[
           'name' => 'required|unique:categories,name,'.$category->id
        ]);
        $category->update($request->all());
        return redirect()->route('categories.list')->with('success','Successfully Update!!!');
    }

    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('categories.list')->with('delete','Successfully deleted!!!');
    }
}
