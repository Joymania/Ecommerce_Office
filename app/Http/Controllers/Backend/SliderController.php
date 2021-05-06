<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function view(){
        $data['alldata']=slider::all();
        return view('admin.Slider.slider-view',$data);
    }
    public function add(){
        return view('admin.Slider.slider-add');
    }

    public function store(Request $request){

        $data=new slider();
        $data->short_title=$request->short_title;
        $data->long_title=$request->long_title;
        if($request->file('image')){
            $file=$request->file('image');
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images '),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('slider.view')->with('success', 'Data Store Successfully.');
    }

    public function edit($id){
        $editdata=slider::find($id);
        return view('admin.Slider.slider-add',compact('editdata'));

    }
    public function update(Request $request, $id){
        $data=slider::find($id);
        $data->short_title=$request->short_title;
        $data->long_title=$request->long_title;
        if($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('upload/Slider_images/'.$data->image));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/Slider_images/'),$filename);
            $data['image']=$filename;
        }
        $data->save();
        return redirect()->route('slider.view')->with('success', 'Data Updated Successfully.');
    }

    public function delete($id){
        $data=slider::find($id);
        if(file_exists('upload/Slider_images/' . $data->image)AND !empty($data->image)){
            @unlink(public_path('upload/Slider_images/' . $data->image));
        }
        $data->delete();
        return redirect()->route('slider.view')->with('success', 'Data Deleted Successfully.');
    }
}
