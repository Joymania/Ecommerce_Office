<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use App\User;
use App\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class userAccountController extends Controller
{
    Public Function userAccount()
    {
        $id = Auth::id();
        $logo = logo::all()->last();
        $categories = category::with('sub_category','product')->take(-4)->get();
        $contact = contacts::all()->last();
        $user = User::find(Auth::id());
        $orders = Order::all()->where('user_id' , $id);

        return view('Frontend.userProfile.userAccount', compact('categories' , 'logo' , 'contact' , 'user' , 'orders'));
    }

    public function userUpdate(Request $request)
    {
        // to update admin
        $user = User::find(Auth::id());

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            // if requested email and admin email same, no validation applied
            'email' => ($request->email != $user->email ? 'required|email|unique:users,email,':''),
            // if the password field is blank, no validation applied
            'password' => ($request->password!=''?'min:6|confirmed':''),
            'address' => 'max:255',
            'phone' => ''
        ]);

        //  if validation fails
        if($validator->fails()){
            $erorrs = ['message' => 'Validation error!',
                       'errors' => ['name' => $validator->errors()->get('name'),
                                    'email' => $validator->errors()->get('email'),
                                    'password' => $validator->errors()->get('password'),
                                    'address' => $validator->errors()->get('address')
                                    ]
                    ];     
            return redirect()->route('userAccount')->withInput()->with(['errors' => $erorrs]);
        }
          //  insert data ........
          $user->name = $request->name;
          $user->email = $request->email;
          $user->address = $request->address;
          $user->phone = $request->phone;

          // if there is password & not blank then insert password
        if($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
 
        $user->save();

        session()->flash('success_msg' , 'Updated successfully');
        return back();

    }

    public function orderDetails($id){
        $data['order']=Order::find($id);          
        $data['product']=Order::where('id',$id)->with('products','color','size')->first();
        //return $data['product'];
        return view('Frontend.userProfile.orderDetails',$data);
    }
}