@extends('admin.layout.authentication')
@section('title', 'Login')
@section('pageTitle') <a href="{{url('/admin/login')}}">Login</a> @endsection


@section('content')

<div class="vertical-align-wrap">
	<div class="vertical-align-middle auth-main">
		<div class="auth-box">
            <div class="top">
                <img src="{{url('/')}}/assets/img/logo-white.svg" alt="Lucid">
            </div>
			<div class="card">
                <div class="header">
                    <p class="lead">Login to your account</p>

                    @if(session()->has('errors'))

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Your credentials does not match!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                </div>
                <div class="body">
                    <form class="form-auth-small" action="{{route('admin.login')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input type="email" name="email" class="form-control" id="signin-email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Remember me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                        <div class="bottom">
                            <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{route('admin.password.request')}}">Forgot password?</a></span>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>

@stop
