@extends('admin.layout.authentication')
@section('title', 'Register')


@section('content')

<div class="vertical-align-wrap">
	<div class="vertical-align-middle auth-main">
		<div class="auth-box">
            <div class="top">
                <img src="{{url('/')}}/assets/img/logo-white.svg" alt="Lucid">
            </div>
			<div class="card">
                <div class="header">
                    <p class="lead">Create an account</p>
                </div>
                <div class="body">
                    <form class="form-auth-small">
                        <div class="form-group">
                            <label for="signup-email" class="control-label sr-only">Email</label>
                            <input type="email" class="form-control" id="signup-email" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label for="signup-password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control" id="signup-password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                        <div class="bottom">
                            <span class="helper-text">Already have an account? <a href="{{route('authentication.login')}}">Login</a></span>
                        </div>
                    </form>
                    <div class="separator-linethrough"><span>OR</span></div>
                    <button class="btn btn-signin-social"><i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook</button>
                    <button class="btn btn-signin-social"><i class="fa fa-twitter twitter-color"></i> Sign in with Twitter</button>
                </div>
            </div>
		</div>
	</div>
</div>

@stop
