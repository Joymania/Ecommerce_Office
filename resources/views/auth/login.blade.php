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
        width: 200px;
        height: 35px;

    }
</style>
<div class="login-register-area pt-115 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    @if(session()->has('reg_successful'))
                        <div class="alert not_hide alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('reg_successful') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session()->has('reset_successful'))
                        <div class="alert not_hide alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('reset_successful') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="login-register-tab-list nav">
                        <a href="{{route('login')}}">
                            <h4> login </h4>
                        </a>
                        <a href="{{route('register')}}">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
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
                                                <a href="{{ route('forgot.password') }}">Forgot Password?</a>
                                            </div>

                                            <button type="submit">Login</button>
                                        </div>
                                        <p style="text-align:left"> OR </p>
                                        <div class="social-login">
                                            <a href="{{url('login/facebook')}}" class="btn  facebook-btn social-btn" style="background-color:#3C589C"
                                                type="button"><span><i class="fab fa-facebook-f"></i> Sign in with
                                                    Facebook</span> </a>
                                            <a href="{{url('login/google')}}" class="btn google-btn social-btn" style="background-color: #DF4B3B"
                                                type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with
                                                    Google+</span> </a>
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
</div>
@endsection
