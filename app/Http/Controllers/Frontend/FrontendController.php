<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data['sliders']=Slider::all();
        return view('Frontend.layouts.home',$data);
    }
}
