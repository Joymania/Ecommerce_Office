z@extends('admin.layout.authentication')
@section('title', 'Reset Password')
@section('pageTitle') <a href="">Reset Password</a> @endsection

@section('content')

<div class="vertical-align-wrap">
	<div class="vertical-align-middle auth-main">
		<div class="auth-box">
            <div class="top">
                <img src="{{ asset('assets/img/logo-white.svg') }}" alt="Lucid">
            </div>
			<div class="card">
                <div class="header">
                    <p class="lead">Reset password</p>
                </div>

                <div class="card-body">
                    <form class="form-auth-small" method="POST" action="{{ route('admin.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="control-label sr-only">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus  placeholder="Email" id="email">

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus  placeholder="Password (minimum 8 characters)" id="password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label sr-only">Confirm Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" autofocus  placeholder="Confirm Password" id="password-confirm">
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">RESET PASSWORD</button>
                    </form>
                </div>

            </div>
		</div>
	</div>
</div>
@stop
