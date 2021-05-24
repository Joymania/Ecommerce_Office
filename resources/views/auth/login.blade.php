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

                                        <input name="email" placeholder="Email" type="email"
                                            class=" @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                            required autocomplete="email" autofocus>

                                        @error('email')
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
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
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
