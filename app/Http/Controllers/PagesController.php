<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function profile1(){
        return view('admin.pages.profile1');
    }
}
