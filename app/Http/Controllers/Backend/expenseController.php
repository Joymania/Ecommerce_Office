<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Expense;
use App\Model\expenseCategory;
use App\Model\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class expenseController extends Controller
{
    //expense
    public function expense()
    {
        $lists = Expense::with('expenseCategory')->get();
        $admins = Admin::find(Auth::id());
    	return view('admin.expense.expense',compact('lists' ,'admins'));
    }

    // insertExpense
    public function insertExpense()
    {
        $categories = expenseCategory::all();
        return view('admin.expense.insertExpense',compact('categories'));
    }

    // storeExpense
    function storeExpense(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'amount' => 'required',
        ],
        // error message
        [
            'category_id.required' => 'category name is required',
            'amount.required' => 'amount is required',
        ]);

        Expense::create($request->all());

        return redirect()->route('expense.view')->with('success_msg','Successfully Added!!!');
    }

    // editExpense
    function editExpense($id)
    {
    	$categories = expenseCategory::all();
    	$edits = Expense::findOrFail($id);
    	return view('admin.expense.editExpense',compact('categories','edits'));
    }

    // updateExpense
    public function updateExpense(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'amount' => 'required',
        ],
        // error message
        [
            'category_id.required' => 'category name is required',
            'amount.required' => 'amount is required',
        ]);


        Expense::findOrFail($request->id)->update([
            'category_id'=>$request-> category_id,
    		'amount'=>$request-> amount,
            'note'=>$request-> note,
    		'expense_by'=>$request-> expense_by,
    	]);

        return redirect()->route('expense.view')->with('success_msg','Successfully Updated!!!');
    }

    //  deleteexpense
    public function deleteexpense($did)
    {
        Expense::findOrFail($did)->delete();
    	return redirect()->route('expense.view')->with('success_msg','Successfully Deleted!!!');
    }







}
