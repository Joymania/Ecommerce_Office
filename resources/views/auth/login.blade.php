@extends('Frontend.layouts.master')

@section('content')
<style>
    .social-login {
        margin: 0 auto;
    }

    .social-btn {
        font-size: 15px;
        font-weight: 50;
        color: white;
        height: 35px;

    }
</style>
<div class="login-register-area pt-115 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" id="login" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <!-- login tab -->
                        <div id="lg1" class="tab-pane active">

                            <!-- registration msg -->
                            <div class="alert not_hide alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                <strong id="reg_successful"></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- reset msg -->
                            <div class="alert not_hide alert-success alert-dismissible fade show" role="alert" style="display: none;">
                                <strong id="reset_successful"></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="login-form-container">
                                <div class="login-register-form">

                                    <form action="{{ route('login') }}" method="post">
                                        @csrf

                                        <input name="phone" placeholder="Mobile No." type="number"
                                            class=" @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                            required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <input type="password" name="password" placeholder="Password"
                                            class=" @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" required autocomplete="password" autofocus>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label for="remember">Remember me</label>
                                                <a id="fp">Forgot Password?</a>
                                            </div>

                                            <button id="login" type="submit">Login</button>
                                        </div>
                                        <p style="text-align:left"> OR </p>
                                        <div class="social-login">
                                            <a href="{{url('login/facebook')}}" class="btn  facebook-btn social-btn my-2" style="background-color:#3C589C"
                                                type="button"><span><i class="fab fa-facebook-f"></i> Sign in with
                                                    Facebook</span> </a>
                                            <a href="{{url('login/google')}}" class="btn google-btn social-btn" style="background-color: #DF4B3B"
                                                type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- register tab -->
                        <div id="lg2" class="tab-pane">

                            <div class="alert not_hide alert-warning alert-dismissible fade show" role="alert" style="display: none;">
                                <strong id="sending_error"></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="login-form-container">
                                <div class="login-register-form">

                                    <form  method="post" id="registerForm" >
                                        @csrf
                                        
                                        <div class="form-group">
                                            <input name="name" placeholder="Name" type="text" id="reg_name" value="{{ old('name') }}" class="form-control" required autocomplete="name" autofocus>

                                            <strong><span id="reg_name_error" class="invalid-feedback" role="alert">
                                            </span> </strong>
                                        </div>

                                        <div class="form-group">
                                            <input id="reg_phone" class="form-control" name="phone" placeholder="Mobile no." type="number" id="reg_phone" pattern="[0-9]{11}" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                            <strong><span id="reg_phone_error" class="invalid-feedback" role="alert">
                                            </span> </strong>
                                        </div>

                                        <div class="form-group">
                                            <input id="reg_password" class="form-control" type="password" name="password" placeholder="Password (minimum 8 characters)" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

                                            <strong><span id="reg_password_error" class="invalid-feedback" role="alert">
                                            </span> </strong>
                                        </div>

                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input name="remember" id="remember1" type="checkbox">
                                                <label for="remember">Remember me</label>
                                            
                                            <button type="submit">Register</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============ modal ============ -->

    <div class="modal fade" id="otp-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content m-auto" id="modal-content" style="width: 50%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Phone Verification</h5>
                </div>
                <div class="modal-body m-0">
                    <!-- alert start-->
                    <div class="alert-success">
                        <span class="text-center mt-2" id="code_sent" style="padding: 10px 0"></span>
                    </div>
                    <div class="alert-warning">
                        <span class="text-center mt-2" id="code_invalid" style="padding: 10px 0"></span>
                    </div>
                    <div class="alert-warning">
                        <span class="text-center mt-2" id="verification-error" style="padding: 10px 0"></span>
                    </div>
                    <!-- alert end-->


                    <label for="code"></label>
                    <input type="text" class="mb-2 form-control" name="code" id="code" placeholder="verification code" autocomplete="off">
                    <button type="button" id="verify" class="btn btn-primary mt-2">Verify</button>

                    <button type="button" id="fp_verify" class="btn btn-primary mt-2">Verify</button>

                    <button type="button" id="resend" class="btn btn-primary mt-2" disabled>Resend code</button>

                    <button type="button" id="fp_resend" class="btn btn-primary mt-2" disabled>Resend code</button>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal: forgot password -->
    <div class="modal fade" id="fp-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content m-auto" id="" style="width: 50%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Give your phone number to get verification code</h5>
                </div>
                <div class="modal-body m-0">

                    <!-- alert start-->
                    <div class="alert-warning my-2" style="display: none;">
                        <span class="text-center mt-2" id="fp_phone_invalid" style="padding: 10px"></span>
                    </div>
                    <div class="alert-warning my-2" style="display: none;">
                        <span class="text-center mt-2" id="fp_sending_error" style="padding: 10px"></span>
                    </div>
                    <!-- alert end-->

                    <form id="fp-form" method="post">
                        @csrf

                        <input name="phone" id="fp-phone" placeholder="Mobile No." type="number" class="form-control" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        <strong><span id="fp_phone_error" class="invalid-feedback" role="alert">
                        </span> </strong>
                                                            
                        <div class="button-box">                   
                            <button class="btn btn-sm btn-danger my-3" type="submit">Send Verification Code</button>
                            <div class="bottom login-toggle-btn">
                                <span class="helper-text mt-3">Know your password? <a href="{{route('login')}}" style="float:none " > <u>Login </u></a></span>
                            </div>
                        </div>
                    </form>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal: reset password -->
    <div class="modal fade" id="reset-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content m-auto" id="" style="width: 50%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Password Reset</h5>
                </div>
                <div class="modal-body m-0">

                    <!-- alert start-->
                    <div class="alert-warning my-2" style="display: none;">
                        <span class="text-center mt-2" id="reset_error" style="padding: 10px"></span>
                    </div>
                    <!-- alert end-->

                    <form id="reset-form" method="post">
                        @csrf

                        <input name="phone" id="reset_phone" placeholder="Mobile No." type="number" class="form-control" value="{{ old('phone') }}" required autocomplete="phone" autofocus readonly>
                        <br>
                        <div class="">
                            <input id="reset_password" class="form-control" type="password" name="password" placeholder="Password (minimum 8 characters)" value="{{ old('password') }}" required autocomplete="new-password" autofocus>
                            <br>
                            <strong><span id="reset_password_error" class="invalid-feedback" role="alert">
                            </span> </strong>
                        </div>
                       
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>
                        
                        <div class="button-box">
                            <div class="login-toggle-btn">                         
                                <button class="btn btn-primary btn-sm mt-3" type="submit">Reset Password</button>
                            </div>
                        </div>
                    </form>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="reset-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content m-auto" id="" style="width: 50%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
                </div>
                <div class="modal-body m-0">
                    <!-- alert start-->
                    <div class="alert-warning">
                        <span class="text-center mt-2" id="reset_error" style="padding: 10px 0"></span>
                    </div>
                    <!-- alert end-->

                    <form  id="reset_form">
                        @csrf

                        <input type="hidden" name="token" value="password_reset">

                        <input id="reset_phone" name="phone" placeholder="Mobile No." type="number" class="form-control" value="{{ $phone ?? old('phone') }}" required autocomplete="phone" autofocus disabled>

                        <div class="form-group">
                            <input id="reset_password" class="form-control" type="password" name="password" placeholder="Password (minimum 8 characters)" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

                            <strong><span id="reset_password_error" class="invalid-feedback" role="alert">
                            </span> </strong>
                        </div>

                        <input type="password" name="password_confirmation" placeholder="Confirm Password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

                        <div class="button-box">
                            <div class="login-toggle-btn">                         
                                <button type="submit">Reset Password</button>
                            </div>
                        </div>
                    </form>
                    
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}



</div>
@endsection
@section('scripts')
 <script src="{{ asset('js/login-register.js')}}"></script>
@endsection
