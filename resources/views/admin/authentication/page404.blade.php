@extends('admin.layout.authentication')
@section('title', '404')
@section('pageTitle') '404' @endsection

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
                            <span class="number left">404</span> <span class="text">Oops! <br/>Page Not Found</span>
                        </span>
                    </h3>
                </div>
                <div class="body">
                    <p>The page you were looking for could not be found, please <a href="javascript:void(0);">contact us</a> to report this issue.</p>
                    <div class="margin-top-30">
                        <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fa fa-arrow-left"></i> <span>Go Back</span></a>
                        <a href="{{route('admin.dashboard')}}" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

@stop
