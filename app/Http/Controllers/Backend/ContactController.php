<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function view(){
        $data['alldata']=contacts::all();
        return view('admin.Contact.contact_view',$data);
    }
    public function add(){
        return view('admin.Contact.contact-add');
    }

    public function store(Request $request){

        $this->validate($request,[
            'address' => 'required|max:255',
            'mobile_no' => 'required|max:15',
            'email' => 'required|max:100'
        ]);
          
        $data=new contacts();
        //$data->created_by=Auth::user()->id;
        $data->address=$request->address;
        $data->mobile_no=$request->mobile_no;
        $data->email=$request->email;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->youtube=$request->youtube;
        $data->instagram=$request->instagram;
        $data->pioneer=$request->pioneer;
        $data->save();
        return redirect()->route('contact.view')->with('success_msg', 'Contact Added Successfully.');
    }

    public function edit($id){
        $editdata=contacts::find($id);
        return view('admin.Contact.contact-add',compact('editdata'));

    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'address' => 'required|max:255',
            'mobile_no' => 'required|max:15',
            'email' => 'required|max:100'
        ]);

        $data=contacts::find($id);
        //$data->updated_by=Auth::user()->id;
        $data->address=$request->address;
        $data->mobile_no=$request->mobile_no;
        $data->email=$request->email;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->youtube=$request->youtube;
        $data->instagram=$request->instagram;
        $data->pioneer=$request->pioneer;
        $data->save();
        return redirect()->route('contact.view')->with('success_msg', 'Contact Updated Successfully.');
    }

    public function delete($id){
        $data=contacts::find($id);
        $data->delete();
        return redirect()->route('contact.view')->with('success_msg', 'Contact Deleted Successfully.');
    }
}
