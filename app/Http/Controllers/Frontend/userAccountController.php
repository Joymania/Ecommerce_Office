<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\OrderProduct;
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
        $cartpage=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $user = User::all()->find($id);
        // $categories = category::with('sub_category','product')->take(-4)->get();
        $orders = Order::all()->where('user_id' , $id);
        $OrderProduct = OrderProduct::with('product')->find($id);

        // $id = Auth::id();
        // $logo = logo::orderByDesc('id')->first();
        // $categories = category::with('sub_category','product')->take(-4)->get();
        // $contact = contacts::all()->last();
        // $user = User::find(Auth::id());
        // $orders = Order::all()->where('user_id' , $id);

        return view('Frontend.userProfile.userAccount', compact('user' , 'orders' , 'OrderProduct','cartpage'));
    }

    public function userUpdate(Request $request)
    {
        // to update admin
        $user = User::find(Auth::id());

        $this->validate($request, [
            'name' => 'required|max:100',
            // if requested email and user email same, no validation applied
            'email' => ($request->email != $user->email ? 'email|unique:users,email,':''),
            // if requested phone and user phoe same, no validation applied
            'phone' => ($request->phone != $user->phone ? 'unique:users,phone|digits:11,':''),
            // if the password field is blank, no validation applied
            'password' => ($request->password!=''?'min:8|confirmed':''),
            'status' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'max:10',
            'address' => 'max:255',
        ]);

          //  insert data ........
          $user->name = $request->name;
          $user->email = $request->email;
          $user->address = $request->address;
          $user->phone = $request->phone;
          $user->gender = $request->gender;

          // if there is password & not blank then insert password
        if($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        //  if there is image
        if($request->hasFile('image')) {

            // remove image
            $this->removeImage($user);

            $file = $request->file('image');

            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('upload/users'), $filename);

            $user->image = $filename;
        }

        $user->save();

        session()->flash('success_msg' , 'Updated successfully');
        return back();

    }
    public function deleteImage(User $user)
    {
        // remove image
        $this->removeImage($user);
        $user->image = null;
        $user->save();
        return redirect()->back()->with("success_msg", ' Image Deleted successfully');
    }

    private function removeImage($user)
    {
        if($user->image != "" && \File::exists('upload/users/' . $user->image)) {
            @unlink(public_path('upload/users/' . $user->image));
        }
    }

    public function orderDetails($id){
        $data['order']=Order::find($id);
        // $data['product']=Order::where('id',$id)->with('products','color','size')->first();
        $data['product']=OrderProduct::where('order_id',$id)->with('color','size','order_detail','product')->get();
        $data['logos'] = logo::orderByDesc('id')->first();
        $data['cartpage'] = CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        return view('Frontend.userProfile.orderDetails',$data);
    }

}
