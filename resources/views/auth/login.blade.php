@extends('Frontend.layouts.master')

@section('content')
<style>
    .social-login {
        margin: 0 auto;
    }

    .social-btn {
        font-size: 1.3rem;
        font-weight: 100;
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
                            <a href="http://127.0.0.1:8000/login">
                                <h4> login </h4>
                            </a>
                            <a href="http://127.0.0.1:8000/register">
                                <h4> register </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">

                                        <form action="http://127.0.0.1:8000/login" method="post">
                                            <input type="hidden" name="_token"
                                                value="W23YH5c4fBgmksoJ5ErxaxwZ9pZQOHUjUQKYq6Ll">
                                            <input name="email" placeholder="Email" type="email" class=" " value="" required
                                                autocomplete="email" autofocus>


                                            <input type="password" name="password" placeholder="Password" class=" " value=""
                                                required autocomplete="password" autofocus>


                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" name="remember" id="remember">
                                                    <label for="remember">Remember me</label>
                                                    <a href="http://127.0.0.1:8000/password/reset">Forgot Password?</a>
                                                </div>

                                                <button type="submit">Login</button>
                                            </div>
                                            <br>
                                            <p style="text-align:left"> OR </p>
                                            <div class="social-login">
                                                <a href="http://127.0.0.1:8000/login/facebook"
                                                    class="btn  facebook-btn social-btn" style="background-color:#3C589C"
                                                    type="button"><span><i class="fab fa-facebook-f"></i> Sign in with
                                                        Facebook</span> </a>
                                                <a href="http://127.0.0.1:8000/login/google"
                                                    class="btn google-btn social-btn" style="background-color: #DF4B3B"
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
