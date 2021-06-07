@extends('Frontend.layouts.master')

@section('content')
    <div class="login-register-area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        @if(session()->has('message'))
                            <div class="alert not_hide alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session()->has('error_message'))
                            <div class="alert not_hide alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('error_message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="login-register-tab-list nav">
                            <h4> Give your phone number to get verification code </h4>
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

                                        <form action="{{ route('send.otp.forgot.pass') }}" method="post">
                                            @csrf

                                            <input name="phone" placeholder="Mobile No." type="number" class=" @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                                                               
                                            <div class="button-box">                   
                                                <button type="submit">Send Verification Code</button>
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