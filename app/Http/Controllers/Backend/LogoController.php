<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\logo;

class LogoController extends Controller
{
    // logo
    public function logo()
    {
        $view_logos = logo::all();
    	return view('admin.logo.logo', compact('view_logos'));
    }

    // insertLogo
    public function insertLogo()
    {
        return view('admin.logo.insertLogo');
    }

    // insertlog
    public function insertlog(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,JPG',
        ],
        [
            'image.required' => 'Only excepts jpg, jpeg , png formate',
        ]);

       //image insert
       $image= $request->file('image'); //('image') is form field name
       $image_name=hexdec(uniqid());
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/admin/image/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);

      //end

       //whole form insert in db
       $state = logo::insert([
           'created_by'=>$request-> created_by,
           'updated_by'=>$request-> updated_by,
           'image'=> $image_url,
       
       
       ]); 

       return back();
    }

    // editLogo
    public function editLogo($id)
    {
        $edits = logo::findOrFail($id);
    	return view('admin.logo.editLogo', compact('edits'));
    }

    // updateLogo
    function updateLogo(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png,JPG',
        ]);


    	$old_img = $request->old_image; //taking the old image address
    	//image insert
    	$image= $request->file('image'); //('image') is form field name
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/admin/image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name); 

        //  //end

        unlink($old_img); //deleting old image

        //whole form insert in db
        logo::findOrFail($request->id)->update([
            'image'=> $image_url,
    	]); 

    	return redirect()->route('logo.view')->with('success','Successfully Deleted!!!');
    }

    // deleteLogo
    public function deleteLogo($id)
    {
        logo::findOrFail($id)->delete();
    	return redirect()->route('logo.view')->with('success','Successfully Deleted!!!');
    }
}
