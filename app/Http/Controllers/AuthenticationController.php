<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(){
        return view('admin.authentication.login');
    }

    public function register(){
        return view('admin.authentication.register');
    }

    public function lockscreen(){
        return view('admin.authentication.lockscreen');
    }

    public function forgotPassword(){
        return view('admin.authentication.forgot-password');
    }

    public function page404(){
        return view('admin.authentication.page404');
    }

    public function page403(){
        return view('authentication.page403');
    }

    public function page500(){
        return view('authentication.page500');
    }

    public function page503(){
        return view('authentication.page503');
    }
}
