<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Model\CartShopping;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
    
        return view('auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'digits:11', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            // 'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        // // update user->status to 1 after login
        // $user = User::find(Auth::id());
        // $user->status = '1';
        // $user->save();

        // $carts = Cart::content();
        // foreach($carts as $cart){
        //     $idauth = Auth::id();
        //     $identity= $cart->id;
        //     $sizeID= $cart->options['size_id'];
        //     $colorId= $cart->options['color_id'];

        //     $cartCheck= CartShopping::where('user_id',$idauth)->where('product_id',$identity)->where('product_size',$sizeID)->where('product_color',$colorId)->first();

        //     if($cartCheck==NULL){
        //     $cart_add= new CartShopping();
        //     $cart_add->user_id = Auth::id();
        //     $cart_add->product_id = $cart->id;
        //     $cart_add->product_size = $cart->options->size_id;
        //     $cart_add->product_color= $cart->options->color_id;
        //     $cart_add->qty= $cart->qty;
        //     $cart_add->subtotal= $cart->subtotal;
        //     $cart_add->save();
        //     }
        // }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        // dd(session('url.intended'));
        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect()->intended($this->redirectPath());
    }
}
