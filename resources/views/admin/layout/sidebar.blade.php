@php
    $prefix=Request::route()->getPrefix();
    //$route=Route::current()->getName();
@endphp

<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('assets/img/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Alizee Thomas</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="{{route('pages.profile1')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="{{--{{route('app.inbox')}}--}}"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('admin.logout')}}"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Sales</small>
                    <h6>456</h6>
                </li>
                <li class="col-4">
                    <small>Order</small>
                    <h6>1350</h6>
                </li>
                <li class="col-4">
                    <small>Revenue</small>
                    <h6>$2.13B</h6>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i class="icon-question"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                            <a href="#Dashboard" class="has-arrow"><i class="icon-home"></i> <span>Dashboard</span></a>
                            <ul>
                                <li class=""><a href="{{route('products.list')}}">Products List</a></li>
                                <li class=""><a href="{{route('products.sizes')}}">Size List</a></li>
                                <li class="{{ Request::segment(2) === 'ecommerce' ? 'active' : null }}"><a href="{{route('admin.dashboard')}}">eCommerce</a></li>
                                <li class="{{ Request::segment(3) === 'brand' ? 'active' : null }}"><a href="{{route('brand.view')}}">Brands</a></li>
                                <li class="{{ Request::segment(4) === 'color' ? 'active' : null }}"><a href="{{route('color.view')}}">Colors</a></li>
                                <li class="{{ Request::segment(4) === 'slider' ? 'active' : null }}"><a href="{{route('slider.view')}}">Slider</a></li>
                                <li class="{{ Request::segment(3) === 'admins' ? 'active' : null }}"><a href="{{route('admin.index')}}">Admins</a></li>
                                <li class="{{ Request::segment(3) === 'users' ? 'active' : null }}"><a href="{{route('users.index')}}">Users</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
