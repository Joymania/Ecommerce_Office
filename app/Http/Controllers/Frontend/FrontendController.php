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

        $data['sliders']=Slider::all();
        $products = product::all();
        return view('Frontend.layouts.home',$data,compact('products'));
    }
}
