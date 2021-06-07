@extends('Frontend.layouts.master')

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
                            <!-- show message  -->
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">

                                        <form action="{{ route('password.email') }}" method="post">
                                            @csrf

                                            <input name="email" placeholder="Email" type="email" class=" @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                                                               
                                            <div class="button-box">                   
                                                <button type="submit">Send Password Reset Link</button>
                                                <div class="bottom login-toggle-btn">
                                                    <span class="helper-text">Know your password? <a href="{{route('login')}}" style="float:none">Login</a></span>
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