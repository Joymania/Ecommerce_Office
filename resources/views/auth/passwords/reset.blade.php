@extends('Frontend.layouts.master')

@section('content')
    <div class="login-register-area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        @if(session()->has('error_message'))
                            <div class="alert not_hide alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('error_message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="login-register-tab-list nav">
                            <h3>Reset Password</h3>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">

                                        <form  method="post" action="{{ route('reset.password') }}" >
                                            @csrf

                                            <input type="hidden" name="token" value="password_reset">

                                            <input name="phone" placeholder="Mobile No." type="number" class=" @error('phone') is-invalid @enderror" value="{{ $phone ?? old('phone') }}" required autocomplete="phone" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <input type="password" name="password" placeholder="Password (minimum 8 characters)" class=" @error('password') is-invalid @enderror" required autocomplete="new-password" autofocus>

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