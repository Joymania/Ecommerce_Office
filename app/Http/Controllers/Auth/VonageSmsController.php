<?php
  
namespace App\Http\Controllers\Auth;
   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\User;
use Nexmo\Laravel\Facade\Nexmo;
  
class VonageSmsController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function send(Request $request)
    {
            $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            
        try{
            $code = (string)rand(10000,99999);
            $phone = "+88".$request->phone;
            Cache::add($code, $phone, 120);  //cache for 2 minutes
            // dd($code);
            
            /****  temporarily stop sending sms ******/

            // $nexmo = app('Nexmo\Client');

            // $nexmo->message()->send([
            //     'to'   => $phone,
            //     'from' => '+8801521215287',  
            //     'text' => 'Your verification code is '. $code
            // ]);

            Session::put([$phone => [
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation
            ]]);
            

        } catch(Exception $e){
            $message = 'Error sending verification code. Please try again.';
            return redirect()->back()->with(['message' => $message]);
        }
        // code sent successful
        //  get the code without sending sms
        $message = 'Verification code has been sent to your number. Please verifiy.'. $code;

        return redirect()->route('verify.form')->with(['message' => $message]);
    }

    public function verifyForm()
    {
        return view('auth.verify-otp');
    }


    public function verifyOtp(Request $request)
    {
        try{
            $phone = Cache::get($request->code);
            if($phone == null){
                $error_message = "Verification code does not match or expired!";
                return redirect()->back()->with(['error_message' => $error_message]);
            }

            $user = Session::get($phone);
           
        } catch(Exception $e){
            $error_message = "Verification code does not match or expired!";
            return redirect()->back()->with(['error_message' => $error_message]);
        }

        try{
             // save user into db
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->phone = $user['phone'];
            $new_user->password = bcrypt( $user['password'] );
            $new_user->save();

            return redirect()->route('login')->with(['reg_successful' => 'You have successfully registered.Please Login.']);

        } catch(Exception $e){
            return redirect()->route('register')->with(['reg_error' => 'Registration Error.Please try agian.']);
        }
       

    }

    // ===========================================================================================

    public function forgotPasswordForm()
    {
        return view('auth.passwords.forgot-password');
    }

    public function sendOtpForgotPass(Request $request)
    {
        $this->validate($request, [ 
            'phone' => ['required', 'digits:11'],
        ]);

        $user = User::where('phone', $request->phone)->first();

        if($user){
            try{
                $code = (string)rand(10000,99999);
                $phone = "+88".$request->phone;
                Cache::add($code, $phone, 120);  //cache for 2 minutes

                /****  temporarily stop sending sms ******/

                // $nexmo = app('Nexmo\Client');

                // $nexmo->message()->send([
                //     'to'   => $phone,
                //     'from' => '+8801521215287',  
                //     'text' => 'Your verification code is '. $code
                // ]);

                Session::put([$phone => $request->phone]);
                
            } catch(Exception $e){
                $message = 'Error sending verification code. Please try again.';
                return redirect()->back()->with(['message' => $message]);
            }

            // code sent successful
            // get the code without sending sms
            $message = 'Verification code has been sent to your number. Please verifiy.'. $code;

            return redirect()->route('verify.form.forgot.pass')->with(['message' => $message]);
            
        }
        // if phone num is not found
        else {
            $message = 'Mobile number is not found!';
            return redirect()->back()->with(['error_message' => $message]);
        }
    }

    public function verifyFormForgotPass(){
        return view('auth.passwords.verify-otp');
    }

    public function verifyOtpForgotPass(Request $request)
    {
        try{
            $phone = Cache::get($request->code);
            if($phone == null){
                $error_message = "Verification code does not match or expired!";
                return redirect()->back()->with(['error_message' => $error_message]);
            }

            $phone = Session::get($phone);
           
        } catch(Exception $e){
            $error_message = "Verification code does not match or expired!";
            return redirect()->back()->with(['error_message' => $error_message]);
        }

        return view('auth.passwords.reset', compact('phone'));
    }

    public function resetPassword(Request $request){
        $this->validate($request, [
            'phone' => ['required', 'digits:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::where('phone', $request->phone)->first();
        
        if($user){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('login')->with(['reset_successful' => 'Your password reset done! Please Login.']);

        } else{
            $message = 'Mobile number is not found!';
            return redirect()->back()->with(['error_message' => $message]);
        }

    }
}