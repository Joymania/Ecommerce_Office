<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Model\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function view(){
        $data['alldata']=color::all();
        return view('admin.Color.color-view',$data);
    }

    public function add(){
        return view('admin.Color.color-add');
    }

    public function store(Request $request){
        $this->validate($request,[
                'name' => 'required|unique:colors,name',
                ]);
            $data=new color();
            $data->name=$request->name;
            $data->save();
            return redirect()->route('color.view')->with('success', 'Data Stored Successfully.');
        }

        public function edit($id){
            $editdata=color::find($id);
            return view('admin.Color.color-add',compact('editdata'));

        }
        public function update(ColorRequest $request, $id){
            $data=color::find($id);

            $data->name=$request->name;
            $data->save();
            return redirect()->route('color.view')->with('success', 'Data Updated Successfully.');
        }

        public function delete($id){
            $data=color::find($id);
            $data->delete();
            return redirect()->route('color.view')->with('success', 'Data Deleted Successfully.');
        }
}
