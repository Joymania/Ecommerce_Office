<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request; 
use App\Model\category;
use App\Model\sub_category;

class subCategoryController extends Controller
{
    //subCategory
    public function subCategory()
    {
        $lists = sub_category::with('category')->get();
    	return view('admin.subCategory.subCategory',compact('lists'));
    }

    // insertSubCategory
    public function insertSubCategory()
    {
        $categories = category::all();
        return view('admin.subCategory.insertSubCategory',compact('categories'));
    }

    // insertSubcat
    function insertSubcat(Request $request)
    {
        $state = sub_category::insert([
    		'sub_category_name'=>$request-> sub_category_name,
    		'category_id'=>$request-> category_id,
        
        
    	]); 

    	return back();
    }

    // editSubCategory
    function editSubCategory($id)
    {
    	$cats = category::all();
    	$edits = sub_category::findOrFail($id);
    	return view('admin.subCategory.editSubCategory',compact('cats','edits'));
    }

    // updateSubCategory
    function updateSubCategory(Request $request)
    {
        // validation
        $request->validate([
            'sub_category_name' => 'required|max:255',
        ],
        // error message
        [
            'sub_category_name.required' => 'category name is required',
        ]);


        sub_category::findOrFail($request->id)->update([
            'sub_category_name'=>$request-> sub_category_name,
    		'category_id'=>$request-> category_id,
    	]); 

        return redirect()->route('subCategory.view')->with('success','Successfully Update!!!');
    }

    // deleteSubCategory
    public function deleteSubCategory($did)
    {
        sub_category::findOrFail($did)->delete();
    	return redirect()->route('subCategory.view')->with('delete','Successfully deleted!!!');
    }





    // end
}
