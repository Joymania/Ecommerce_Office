<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\product;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index(){
        $data['sliders']=DB::table('products')->orderBy('created_at','desc')->take(2)->get();
        return view('Frontend.layouts.home',$data);
    }
}
