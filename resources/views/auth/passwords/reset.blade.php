@extends('auth.auth-master')

@section('content')
    <div class="login-register-area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <h3>Reset Password</h3>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">

                                        <form  method="post" action="{{ route('password.update') }}" >
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">

                                            <input name="email" placeholder="Email" type="email" class=" @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <input type="password" name="password" placeholder="Password" class=" @error('password') is-invalid @enderror" required autocomplete="new-password" autofocus>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class=" @error('password') is-invalid @enderror" required autocomplete="new-password" autofocus>

                                            <div class="button-box">
                                                <div class="login-toggle-btn">                         
                                                    <button type="submit">Reset Password</button>
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
    </div>
@endsection