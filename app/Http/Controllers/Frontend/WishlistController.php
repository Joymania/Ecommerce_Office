<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\CartShopping;
use App\Model\category;
use App\Model\contacts;
use App\Model\logo;
use App\Model\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addtoWishlist($id){
        if(Auth::check()){
            $wishchk=wishlist::where('product_id',$id)->get()->toArray();
            if($wishchk==NULL){
                $wishlist=new wishlist();
                $wishlist->user_id=Auth::id();
                $wishlist->product_id=$id;
                $wishlist->save();
                return redirect()->back();
            }
            else{
                return redirect()->back();
            }

        }
        else{
            return redirect()->route('login');
        }
    }
    public function index(){
        if(Auth::user()){
        $data['cartpage']=CartShopping::with('product')->where('user_id',Auth::id())->where('status','0')->get();
        $id=Auth::id();
        $data['wishlist']=wishlist::with('product')->where(function ($querry) use($id){
            $querry->where('user_id',$id)->where('status','0');
        })->get();

        return view('Frontend.single_pages.wishlist',$data);
        }
        else{
            return redirect()->route('login');
        }

    }
}
