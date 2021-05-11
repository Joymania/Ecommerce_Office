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
        $list = sub_category::with('category')->get();
    	return view('admin.subCategory.subCategory',compact('list'));
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
        $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required',
        ]);

        sub_category::insert([
    		'sub_category_name' => $request->sub_category_name,
    		'category_id' => $request->category_id,
    	]);

    	return redirect()->route('subCategory.view')->with('success_msg','Sub-Category Created successfully!');
    }

    // editSubCategory
    function editSubCategory($id)
    {
    	$categories = category::all();
    	$edits = sub_category::find($id);
    	return view('admin.subCategory.editSubCategory',compact('categories','edits'));
    }

    // updateSubCategory
    function updateSubCategory(Request $request)
    {
        // validation
        $this->validate($request,[
            'category_id' => 'required',
            'sub_category_name' => 'required',
        ]);
        sub_category::findOrFail($request->id)->update([
            'sub_category_name'=>$request-> sub_category_name,
    		'category_id'=>$request-> category_id,
    	]);

        return redirect()->route('subCategory.view')->with('success_msg','Sub-Category Updated Successfully!');
    }

    // deleteSubCategory
    public function deleteSubCategory($did)
    {
        sub_category::findOrFail($did)->delete();
    	return redirect()->route('subCategory.view')->with('success_msg','Sub-Category Successfully deleted!');
    }





    // end
}
