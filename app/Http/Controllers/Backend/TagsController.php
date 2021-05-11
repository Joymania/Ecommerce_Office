<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = tag::all();
        return view('admin.tags.tags-view', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.tags-add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:tags,name'
        ]);
        tag::create($request->all());
        return redirect()->route('tags.list')->with('success','Successfully Added!!!');
    }

    public function edit(tag $tag)
    {
        return view('admin.tags.tags-edit',compact('tag'));
    }

    public function update(Request $request, tag $tag)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name,'.$tag->id
        ]);

        $tag->update($request->all());
        return redirect()->route('tags.list')->with('success','Successfully update!!!');
    }

    public function destroy(tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.list')->with('success','Successfully deleted!!!');
    }
}
