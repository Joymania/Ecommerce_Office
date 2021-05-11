<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function view(){
        $data['alldata']=Brand::all();
        $data['admin']=Admin::where('role','0')->first();
        return view('admin.brand.brand-view',$data);
    }

    public function add(){
        return view('admin.brand.brand-add');
    }

    public function store(Request $request){
        $this->validate($request,[
                'name' => 'required|unique:brands,name',
                ]);
            $data=new Brand();
            $data->name=$request->name;
            $data->save();
            return redirect()->route('brand.view')->with('success', 'Data Stored Successfully.');
        }

        public function edit($id){
            $editdata=Brand::find($id);
            $admin=Admin::where('role','0')->first();
            return view('admin.brand.brand-add',compact('editdata','admin'));

        }
        public function update(BrandRequest $request, $id){
            $data=Brand::find($id);

            $data->updated_by=Auth::user()->id;
            $data->name=$request->name;
            $data->save();
            return redirect()->route('brand.view')->with('success', 'Data Updated Successfully.');
        }

        public function delete($id){
            $data=Brand::find($id);
            $data->delete();
            return redirect()->route('brand.view')->with('success', 'Data Deleted Successfully.');
        }
}
