<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function ecommerce(){
        return view('admin.dashboard.ecommerce');
    }
}
