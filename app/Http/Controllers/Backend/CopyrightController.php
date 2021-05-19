<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Copyright;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CopyrightController extends Controller
{
    public function index()
    {
        $copyright = Copyright::first();
        return view('admin.copyright.copyright-view',compact('copyright'));
    }

    public function create()
    {
        return view('admin.copyright.copyright-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        $data = new Copyright();
        $data->title = $request->title;
        $data->created_by = Auth::id();
        $data->save();
        return redirect()->route('copyright.view')->with('success','Successfully Added');
    }

    public function edit()
    {
        $editdata = Copyright::first();
        return view('admin.copyright.copyright-add',compact('editdata'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $data = Copyright::first();
        $data->title = $request->title;
        $data->created_by = Auth::id();
        $data->save();
        return redirect()->route('copyright.view')->with('success','Successfully Updated');
    }

    public function delete(Copyright $copyright)
    {
        $copyright->delete();
        return redirect()->route('copyright.view')->with('success','Successfully Deleted!');
    }
}
