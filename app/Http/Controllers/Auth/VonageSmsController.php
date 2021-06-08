<?php
  
namespace App\Http\Controllers\Auth;
   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'phone' => ['required','digits:11', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->fails()){
            return response([
                'error' => ['message' => 'Validation error!',
                            'name' => $validator->errors()->get('name'),
                            'phone' => $validator->errors()->get('phone'),
                            'password' => $validator->errors()->get('password')]
            ], 422);
        }
            
        try{
            $code = (string)rand(10000,99999);
            $phone = "+88".$request->phone;
            Cache::add($code, $phone, 120);  //cache for 2 minutes

            /****  temporarily stop sending sms
            please uncomment below ******/

            // $nexmo = app('Nexmo\Client');

            // $nexmo->message()->send([
            //     'to'   => $phone,
            //     'from' => '+8801500010000',  
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
            return response()->json([ 'error' => [ 'sending_error' => $message]], 500);
        }

        //  get the code without sending sms
        // please remove the $code below $message
        $message = 'Verification code has been sent to your number. Please verifiy.'. $code;

        return response()->json(['response' => ['code_sent' => $message]], 200);
    }

    public function verifyOtp(Request $request)
    {

        try{
            $phone = Cache::get($request->code);
            if($phone == null){
                $error_message = "Verification code does not match or expired!";
                return response()->json([ 'error' => [ 'code_invalid' => $error_message,
                ]], 422);
            }

            $user = Session::pull($phone);

        } catch(Exception $e){
            $error_message = "Verification code does not match or expired!";
            return response()->json([ 'error' => [ 'code_invalid' => $error_message,]], 422);
        }

        try{
             // save user into db
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->phone = $user['phone'];
            $new_user->password = bcrypt( $user['password'] );
            $new_user->save();

            $reg_successful = 'You have successfully registered.Please Login';
            return response()->json(['response' => ['reg_successful' => $reg_successful]], 200);

        } catch(Exception $e){
            // return redirect()->route('register')->with(['reg_error' => 'Registration Error.Please try agian.']);
            $reg_error = 'Registration Error.Please try agian.';
            return response()->json([ 'error' => ['reg_error' => $reg_error]], 500);

        }
       

    }

    // ===========================================================================================

    public function sendOtpForgotPass(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'digits:11']
        ]);
        if($validator->fails()){
            return response(['error' => ['message' => 'Validation error!',
                            'phone' => $validator->errors()->get('phone')]
            ], 422);
        }

        $user = User::where('phone', $request->phone)->first();

        if($user){
            try{
                $code = (string)rand(10000,99999);
                $phone = "+88".$request->phone;
                Cache::add($code, $phone, 120);  //cache for 2 minutes

                /****  temporarily stop sending sms
                please uncomment below ******/

                // $nexmo = app('Nexmo\Client');

                // $nexmo->message()->send([
                //     'to'   => $phone,
                //     'from' => '+8801500010000',  
                //     'text' => 'Your verification code is '. $code
                // ]);

                Session::put([$phone => $request->phone]);
                
            } catch(Exception $e){
                $message = 'Error sending verification code. Please try again.';
                return response([ 'error' => ['sending_error' => $message]], 500);
            }

            // get the code without sending sms
            // please remove the $code below $message
            $message = 'Verification code has been sent to your number. Please verifiy.'. $code;

            return response()->json(['response' => ['code_sent' => $message]], 200);
            
        }
        // if phone num is not found
        else {
            $message = 'Mobile number is not found!';
            return response( ['error' => ['phone_invalid' => $message]], 422);
        }
    }

    public function verifyOtpForgotPass(Request $request)
    {
        try{
            $phone = Cache::get($request->code);
            if($phone == null){
                $error_message = "Verification code does not match or expired!";
                return response()->json([ 'error' => [ 'code_invalid' => $error_message,
                ]], 422);
            }

            $phone = Session::get($phone);
           
        } catch(Exception $e){
            $error_message = "Verification code does not match or expired!";
            return response()->json([ 'error' => [ 'code_invalid' => $error_message,]], 422);
        }

        $uniqid = uniqid();
        Session::put([$uniqid => $phone]);

        return response()->json(['response' => ['uniqid' => $uniqid]], 200);
    }

    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        
        if($validator->fails()){
            return response(['error' => 
                ['message' => 'Validation error!',
                'password' => $validator->errors()->get('password')
            ]], 422);
        }

        $phone = Session::get($request->uniqid);
        $user = User::where('phone', $phone)->first();
        
        if($user){
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json([ 'response' => ['reset_successful' => 'Your password reset done! Please Login.']], 201);

        } else{
            $message = 'Mobile number is not found!';
            return response( ['error' => ['phone_invalid' => $message]], 422);
        }

    }
}