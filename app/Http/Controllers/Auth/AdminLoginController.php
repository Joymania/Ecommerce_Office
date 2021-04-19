<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function logout(Request $request)
    {
        $this->guard()->logout();

        /*** to prevent admin logout to logout user also and vice versa***/
        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin/login');
    }


    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);
        
    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     }
    //     return $this->sendFailedLoginResponse($request);
    // }

    
    // public function login(Request $request)
    // {
    //   // Validate the form data
    //   $this->validate($request, [
    //     'email'   => 'required|email',
    //     'password' => 'required|min:6'
    //   ]);
    //   // Attempt to log the user in
    //   if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
    //     // if successful, then redirect to their intended location
    //     return redirect()->intended(route('admin.dashboard'));
    //   } 
    //   // if unsuccessful, then redirect back to the login with the form data
    //   return redirect()->back()->withInput($request->only('email', 'remember'));
    // }
    
    // public function logout()
    // {
    //     Auth::guard('admin')->logout();
    //     return redirect(route('admin.login'));
    // }

}