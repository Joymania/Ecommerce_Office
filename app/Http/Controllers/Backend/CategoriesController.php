<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
 
    //category
    public function category()
    {
        $view_cats = category::all();
    	return view('admin.category.category', compact('view_cats'));
    }

    // insertCategory
    public function insertCategory() 
    {
        return view('admin.category.insertCategory');
    }

    // insertcat
    public function insertcat(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ], 
        // error message 
        [
            'name.unique' => 'Category name must be unique',
            'name.required' => 'category name is required',
        ]);
    
    // inserting into database
    	category::insert([
    		'name'=>$request-> name,
    	]); 
    	return back();
    }
    // editCategory
    public function editCategory($eid)
    {
        $edits = category::findOrFail($eid);
    	return view('admin.category.editCategory', compact('edits'));
    }

    // updateCategory
   function updateCategory(Request $request)
    {
        category::findOrFail($request->id)->update([
            'name'=>$request-> name,
          ]); 
  
          return redirect()->route('category.view')->with('success','Successfully Update!!!');
    }

    // deleteCategory
 
    public function deleteCategory($did)
    {
        category::findOrFail($did)->delete();
    	return redirect()->route('category.view')->with('success','Successfully Deleted!!!');
    }




}






