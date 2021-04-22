<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\sub_category;
use App\Model\contacts;
use App\Model\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userAccountController extends Controller
{
    Public Function userAccount()
    {
        $logos = logo::all()->last();
        $categories = category::with('sub_category','product')->take(-4)->get();
        $contacts = contacts::all()->last();
        return view('Frontend.userProfile.userAccount', compact('categories' , 'logos' , 'contacts'));
    }
}
