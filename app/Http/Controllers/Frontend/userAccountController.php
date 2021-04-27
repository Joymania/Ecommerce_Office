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
        $logos = logo::all()->last();
        $categories = category::with('sub_category','product')->take(-4)->get();
        $contacts = contacts::all()->last();
        $users = User::find(Auth::id());
        $order = Order::all()->where('user_id' , $id);
        return view('Frontend.userProfile.userAccount', compact('categories' , 'logos' , 'contacts' , 'users' , 'order'));
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
            'password' => ($request->password!=''?'min:6|confirmed':'')
        ]);

        //  if validation fails
        if($validator->fails()){
            $erorrs = ['message' => 'Validation error!',
                       'errors' => ['name' => $validator->errors()->get('name'),
                                    'email' => $validator->errors()->get('email'),
                                    'password' => $validator->errors()->get('password')
                                    ]
                    ];     
            return redirect()->route('Frontend.userProfile.userAccount')->withInput()->with(['errors' => $erorrs]);
        }
          //  insert data ........
          $user->name = $request->name;
          $user->email = $request->email;

          // if there is password & not blank then insert password
        if($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
 

        $user->save();

        session()->flash('success_msg' , 'Updated successfully');
        return back();

    }

    


}