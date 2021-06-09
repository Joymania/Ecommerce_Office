<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
            @if(!empty($logo))
                <a href="{{ route('admin.dashboard') }}"><img src="{{ asset($logo->image) }}" alt="Lucid Logo" class="img-responsive logo" style=" max-width:200px; max-height:50px; " ></a>
            @else
                <a href="{{--{{route('dashboard.ecommerce')}}--}}"><img src="{{ asset('assets/img/logo.svg') }}" alt="Lucid Logo" class="img-responsive logo"></a>
            @endif
        </div>

        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>

            <a href="/" class="btn btn-primary mt-2 ml-5"><i class="fa fa-shopping-bag"></i><span> Visit shop</span></a>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="">{{session('admin')->unreadNotifications->count() }}</span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li class="header"><strong>You have {{ session('admin')->unreadNotifications->count() }} new Notifications</strong></li>
                                @foreach (session('admin')->unreadNotifications as $notification)
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-info text-warning"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text"><strong>{{ $notification->data['name'] }}</strong> {{ $notification->data['text'] }}</p>
                                                <span class="timestamp">{{ $notification->created_at }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach


                            <li class="footer"><a href="{{ route('markasRead') }}" class="more">Mark all as Read</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="icon-equalizer"></i></a>
                        <ul class="dropdown-menu user-menu menu-icon">
                            <li class="menu-heading">ACCOUNT SETTINGS</li>
                            <li><a href="javascript:void(0);"><i class="icon-note"></i> <span>Basic</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li>
                            <li class="menu-heading">BILLING</li>
                            <li><a href="javascript:void(0);"><i class="icon-credit-card"></i> <span>Payments</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-printer"></i> <span>Invoices</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-refresh"></i> <span>Renewals</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.logout')}}" class="icon-menu"><i class="icon-login"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
