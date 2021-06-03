<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\FacebookPixel;
use Illuminate\Http\Request;

class FacebookPixelController extends Controller
{
    public function index()
    {
        $data = FacebookPixel::first();
        return view('admin.facebook-pixel.facebook-pixel-view',compact('data'));
    }

    public function add()
    {
        return view('admin.facebook-pixel.facebook-pixel-add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'facebook_name' => 'required',
           'pixel_name' => 'required',
           'pixel_id' => 'required'
        ]);

        FacebookPixel::create($request->all());
        return redirect()->route('facebook.pixel')->with('success','Facebook Pixel Added Successfully');
    }

    public function edit(FacebookPixel $pixel)
    {
        return view('admin.facebook-pixel.facebook-pixel-edit',compact('pixel'));
    }

    public function update(Request $request, FacebookPixel $pixel)
    {
        $this->validate($request, [
            'facebook_name' => 'required',
            'pixel_name' => 'required',
            'pixel_id' => 'required'
        ]);

        $pixel->facebook_name = $request->facebook_name;
        $pixel->pixel_name = $request->pixel_name;
        $pixel->pixel_id = $request->pixel_id;
        $pixel->save();
        return redirect()->route('facebook.pixel')->with('Successfully Updated!!');
    }

    public function delete(FacebookPixel $pixel)
    {
        $pixel->delete();
        return back()->with('success','Successfully Deleted');
    }
}
