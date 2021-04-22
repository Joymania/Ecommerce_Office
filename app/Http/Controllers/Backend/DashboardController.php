<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function ecommerce()
    {
        $admin = Admin::find(Auth::id());
        return view('admin.dashboard.ecommerce', compact('admin'));
    }
}
