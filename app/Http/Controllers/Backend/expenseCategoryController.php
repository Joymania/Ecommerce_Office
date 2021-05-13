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
        $this->validate($request, [
            'name' => 'required|unique:expense_categories|max:255',
        ]);
            
        // inserting into database
        expenseCategory::insert([
    		'name'=>$request-> name,
    	]);
    	return redirect()->route('expenseCategory.view')->with('success_msg','Successfully Added!');
    }

     // edit Expense Category
     public function editExpCat($id)
     {
        $expCat = expenseCategory::find($id);
        return view('admin.expense.editExpCat', compact('expCat'));
     }

     // update expense category
     public function updateExpCat(Request $request, $id)
     { 
        $expenseCategory = expenseCategory::find($id);
        // validation
        $this->validate($request, [
            'name' => strtolower($request->name) == strtolower($expenseCategory->name) ? '' : 'required|unique:expense_categories|max:255',
        ]);
        
        $expenseCategory->name = $request->name;
        $expenseCategory->save();

    	return redirect()->route('expenseCategory.view')->with('success_msg','Successfully updated!');
    }

    // deleteExp
    public function deleteExp($did)
    {
        expenseCategory::findOrFail($did)->delete();
    	return redirect()->route('expenseCategory.view')->with('success_msg','Successfully Deleted!');
    }


}
