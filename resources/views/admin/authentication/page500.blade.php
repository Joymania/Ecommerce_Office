@extends('admin.layout.authentication')
@section('title', '500')


@section('content')

<div class="vertical-align-wrap">
	<div class="vertical-align-middle auth-main">
		<div class="auth-box">
            <div class="top">
                <img src="{{url('/')}}/assets/img/logo-white.svg" alt="Lucid">
            </div>
			<div class="card">
                <div class="header">
                    <h3>
                        <span class="clearfix title">
                            <span class="number">500</span> <br>
                            <span>Internal Server Error</span>
                        </span>
                    </h3>
                </div>
                <div class="body">
                    <p>Apparently we're experiencing an error. But don't worry, we will solve it shortly.
                        <br>Please try after some time.</p>
                    <p><a href="{{route('dashboard.analytical')}}" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a></p>
                </div>
            </div>
		</div>
	</div>
</div>

@stop
