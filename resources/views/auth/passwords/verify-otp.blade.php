@extends('Frontend.layouts.master')

@section('content')
    <div class="login-register-area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        @if(session()->has('message'))
                            <div class="alert not_hide alert-success alert-dismissible fade show" role="alert">
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
                            <h4> Phone Verification </h4>                           
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">

                                        <form  method="post" action="{{ route('verify.otp.forgot.pass') }}" >
                                            @csrf

                                            <input name="code" placeholder="Verification Code" type="text" class=" @error('code') is-invalid @enderror" value="{{ old('code') }}" required autocomplete="otp" autofocus>

                                            @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="button-box">
                                                <div class="login-toggle-btn">                                  <button type="submit">Verify</button>
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