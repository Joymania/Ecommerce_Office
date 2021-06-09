<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\ShippingMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingMethodsController extends Controller
{
    public function index()
    {
        $shipping = ShippingMethods::all();
        // dd($shipping);
        return view('admin.shippingMethods.shipping-methods-view',compact('shipping'));
    }

    public function create()
    {
        return view('admin.shippingMethods.shipping-methods-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'cost' => 'required'
        ]);

        $data = new ShippingMethods();
        $data->name = $request->name;
        $data->cost = $request->cost;
        $data->save();
        return redirect()->route('shipping.methods.view')->with('success','Successfully Added');
    }

    public function edit(ShippingMethods $shipping)
    {
        return view('admin.shippingMethods.shipping-methods-edit',compact('shipping'));
    }

    public function update(Request $request, ShippingMethods $shipping)
    {
        $this->validate($request,[
            'name' => 'required',
            'cost' => 'required'
        ]);

        $data = $shipping;
        $data->name = $request->name;
        $data->cost = $request->cost;
        $data->save();
        return redirect()->route('shipping.methods.view')->with('success','Successfully Updated');
    }

    public function delete(ShippingMethods $shipping)
    {
        $shipping->delete();
        return redirect()->route('shipping.methods.view')->with('success','Successfully Deleted!');
    }
}
