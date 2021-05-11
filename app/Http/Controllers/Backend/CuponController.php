<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function view(){
        $data['alldata']=cupon::all();
        return view('admin.Cupon.cupon-view',$data);
    }

    public function add(){
        return view('admin.Cupon.cupon-add');
    }

    public function store(Request $request){
        $this->validate($request,[
                'cupon' => 'required|unique:cupons,cupon',
                ]);
            $data=new cupon();
            $data->cupon=$request->cupon;
            $data->discount=$request->discount;
            $data->save();
            return redirect()->route('cupon.view')->with('success', 'Cupon Stored Successfully.');
        }

        public function delete($id){
            $data=cupon::find($id);
            $data->delete();
            return redirect()->route('cupon.view')->with('success', 'Cupon Deleted Successfully.');
        }
}
