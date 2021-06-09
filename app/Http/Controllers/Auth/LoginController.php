<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Model\CartShopping;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'phone';
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, User $user)
    {
        $email =$request->input('email');
        $user = User::where('email',$email)->first();
        $user->status = '1';
        $user->save();

        $carts = Cart::content();
        foreach($carts as $cart){
            $idauth = Auth::id();
            $identity= $cart->id;
            $sizeID= $cart->options['size_id'];
            $colorId= $cart->options['color_id'];

            $cartCheck= CartShopping::where('user_id',$idauth)->where('product_id',$identity)->where('product_size',$sizeID)->where('product_color',$colorId)->first();

            if($cartCheck==NULL){
            $cart_add= new CartShopping();
            $cart_add->user_id = Auth::id();
            $cart_add->product_id = $cart->id;
            $cart_add->product_size = $cart->options->size_id;
            $cart_add->product_color= $cart->options->color_id;
            $cart_add->qty= $cart->qty;
            $cart_add->subtotal= $cart->subtotal;
            $cart_add->save();
            }
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request, User $user)
    {
        // update user->status to 0 just before logout
        $user = User::find(Auth::id());
        $user->status = '0';
        $user->save();

        $this->guard()->logout();

        /***  to prevent admin/user logout to logout both admin and user at the same time ***/
        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $check = User::where('email', $user->email)->first();

        if ($check) {
            Auth::login($check);
            $this->authenticatedSocial();
            return redirect()->intended($this->redirectPath());
        } else {
            $data = new User();
            $data->name = $user->name;
            $data->email = $user->email;
            $data->image = $user->avatar;
            $data->password= bcrypt(uniqid());
            $data->save();
            Auth::login($data);
            $this->authenticatedSocial();
            return redirect()->intended($this->redirectPath());
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $check = User::where('email', $user->email)->first();

        if ($check) {
            Auth::login($check);
            $this->authenticatedSocial();
            return redirect()->intended($this->redirectPath());
        } else {
            $data = new User();
            $data->name = $user->name;
            $data->email = $user->email;
            $data->image = $user->avatar;
            $data->password= bcrypt(uniqid());
            $data->save();
            Auth::login($data);
            $this->authenticatedSocial();
            return redirect()->intended($this->redirectPath());
        }
    }

    /**
     * The user has been authenticated by soicialite
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticatedSocial()
    {
        $user = User::where('id', Auth::id())->first();
        $user->status = '1';
        $user->save();

        $carts = Cart::content();
        foreach($carts as $cart){
            $idauth = Auth::id();
            $identity= $cart->id;
            $sizeID= $cart->options['size_id'];
            $colorId= $cart->options['color_id'];

            $cartCheck= CartShopping::where('user_id',$idauth)->where('product_id',$identity)->where('product_size',$sizeID)->where('product_color',$colorId)->first();

            if($cartCheck==NULL){
            $cart_add= new CartShopping();
            $cart_add->user_id = Auth::id();
            $cart_add->product_id = $cart->id;
            $cart_add->product_size = $cart->options->size_id;
            $cart_add->product_color= $cart->options->color_id;
            $cart_add->qty= $cart->qty;
            $cart_add->subtotal= $cart->subtotal;
            $cart_add->save();
            }
        }
    }


}
