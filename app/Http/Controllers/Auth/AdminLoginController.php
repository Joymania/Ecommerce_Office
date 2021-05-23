<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;   

    protected $redirectTo = '/admin/dashboard';

    public function showLoginForm()
    {
      return view('admin.authentication.login');
    }
    
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request)
    {
        $email =$request->input('email');
        $admin = Admin::where('email',$email)->first();
        $admin->status = '1';
        $admin->save();
    }

    public function logout(Request $request, Admin $admin)
    {
        // update user->status to 0 just before logout
        $admin = Admin::find(Auth::id());
        $admin->status = '0';
        $admin->save(); 

        $this->guard()->logout(); 

        /*** to prevent admin/user logout to logout both admin and user at the same time ***/
        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin/login');
    } 

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin/dashboard';
    }

}