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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
      
        $category = new category();
        $category->name = $request-> name;

        // if there is file in image field
        if($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('upload/categories'), $filename);
            $category->image = $filename;
        }
        $category->save();

    	return redirect()->route('category.view')->with('success_msg','Created successfully!');
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
         // validation
         $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $category = category::findOrFail($request->id);
        $category->name = $request-> name;

        // if there is file in image field
        if($request->hasFile('image')) {
            // remove image
            $this->removeImage($category);

            $file = $request->file('image');
            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('upload/categories'), $filename);
            $category->image = $filename;
        }

        $category->save();

        return redirect()->route('category.view')->with('success_msg','Successfully Updated!');
    }

    // deleteCategory

    public function deleteCategory($did)
    {
        $category = category::findOrFail($did);
        $this->removeImage($category);
        $category->delete();
    	return redirect()->route('category.view')->with('success_msg','Successfully Deleted!');
    }

    private function removeImage($category)
    {
        if($category->image != "" && \File::exists('upload/categories/' . $category->image)) {
            @unlink(public_path('upload/categories/' . $category->image));
        }
    }


}






