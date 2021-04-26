<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\expenseCategory;
use App\Model\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class expenseCategoryController extends Controller
{
    //expenseCategory
    public function expenseCategory()
    {
        $view_cats = expenseCategory::all();
        $admins = Admin::find(Auth::id());
    	return view('admin.expense.expenseCategory', compact('view_cats' , 'admins'));
    }
    // insertExpCat
    public function insertExpCat()
    {
        return view('admin.expense.insertExpCat');
    }
    // storeExp
    public function storeExp(Request $request)
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
        expenseCategory::insert([
    		'name'=>$request-> name,
    	]);
    	return back();
    }

    // deleteExp
    public function deleteExp($did)
    {
        expenseCategory::findOrFail($did)->delete();
    	return redirect()->route('expenseCategory.view')->with('success','Successfully Deleted!!!');
    }


}
