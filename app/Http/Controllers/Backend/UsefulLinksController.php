<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\UsefulLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsefulLinksController extends Controller
{
    public function index()
    {
        $usefuls = UsefulLinks::all();
        return view('admin.useful_links.useful-links-view',compact('usefuls'));
    }

    public function create()
    {
        return view('admin.useful_links.useful-links-add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'link' => 'required'
        ]);

        $data = new UsefulLinks();
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('useful.links.view')->with('success_msg','Successfully Added');
    }

    public function edit(UsefulLinks $useful)
    {
        return view('admin.useful_links.useful-links-edit',compact('useful'));
    }

    public function update(Request $request, UsefulLinks $useful)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'link' => 'required'
        ]);

        $data = $useful;
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('useful.links.view')->with('success_msg','Successfully Updated');
    }

    public function delete(UsefulLinks $useful)
    {
        $useful->delete();
        return redirect()->route('useful.links.view')->with('success_msg','Successfully Deleted!');
    }
}
