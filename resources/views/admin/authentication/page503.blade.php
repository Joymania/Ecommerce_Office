@extends('admin.layout.authentication')
@section('title', '503')


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
                            <span class="number">Error 5<i class="fa fa-smile-o"></i>3 </span> <br>
                            <span>Please try after some time</span>
                        </span>
                    </h3>
                </div>
                <div class="body">
                    <p>This site is getting up in few minutes.</p>
                    <p><a href="{{route('dashboard.analytical')}}" class="btn btn-primary"><i class="fa fa-home"></i> <span>Home</span></a></p>
                </div>
            </div>
		</div>
	</div>
</div>

@stop
