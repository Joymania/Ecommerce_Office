@extends('admin.layout.authentication')
@section('title', 'Forget Password')
@section('pageTitle') <a href="">Forgot Password</a> @endsection

@section('content')

<div class="vertical-align-wrap">
	<div class="vertical-align-middle auth-main">
		<div class="auth-box">
            <div class="top">
                <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Lucid">
            </div>
			<div class="card">
                <div class="header">
                    <p class="lead">Recover my password</p>
                </div>
                <div class="body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-auth-small" method="post" action="{{ route('admin.password.email') }}">
                        @csrf

                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email">

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Send Password Reset Link</button>
                        <div class="bottom">
                            <span class="helper-text">Know your password? <a href="{{route('admin.login')}}">Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>

@stop
