@php
    $prefix=Request::route()->getPrefix();
    //$route=Route::current()->getName();
@endphp

<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ (!empty(auth()->user()->image)) ? url('upload/admins/'.auth()->user()->image):url('upload/noImage.jpg') }}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ auth()->user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="{{route('admin.profile')}}"><i class="icon-user"></i>My Profile</a></li>
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
                    <h6>{{session('sales')}}</h6>
                </li>
                <li class="col-4">
                    <small>Order</small>
                    <h6>{{session('orders')}}</h6>
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
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                            <a href="#Dashboard" class="has-arrow"><i class="icon-home"></i> <span>Dashboard</span></a>
                            <ul>
                                <li class="{{ Request::segment(2) === 'ecommerce' ? 'active' : null }}"><a href="{{route('admin.dashboard')}}">eCommerce</a></li>
                                <li class=""><a href="{{route('contact.view')}}">Contact</a></li>
                                <li class=""><a href="{{route('cupon.view')}}">Cupon</a></li>

                                <li class="{{ Request::segment(4) === 'expenseCategory' ? 'active' : null }}"><a href="{{route('expenseCategory.view')}}">Expense Category</a></li>
                                <li class="{{ Request::segment(4) === 'expense' ? 'active' : null }}"><a href="{{route('expense.view')}}">Expense</a></li>
                                <li class="{{ Request::segment(4) === 'logo' ? 'active' : null }}"><a href="{{route('logo.view')}}">Logo</a></li>

                            </ul>
                        </li>

                        <li class="{{ Request::segment(1) === 'products' ? 'active' : null }}">
                            <a href="#Products" class="has-arrow"><i class="icon-basket-loaded"></i> <span>Products</span></a>
                            <ul>
                                <li class=""><a href="{{route('products.list')}}">Products List</a></li>
                                <li class=""><a href="{{route('products.sizes')}}">Size List</a></li>
                                <li class=""><a href="{{route('tags.list')}}">Tags</a></li>
                                <li class="{{ Request::segment(4) === 'category' ? 'active' : null }}"><a href="{{route('category.view')}}">Category</a></li>
                                <li class="{{ Request::segment(4) === 'subCategory' ? 'active' : null }}"><a href="{{route('subCategory.view')}}">Sub-Category</a></li>
                                <li class="{{ Request::segment(3) === 'brand' ? 'active' : null }}"><a href="{{route('brand.view')}}">Brands</a></li>
                                <li class="{{ Request::segment(4) === 'color' ? 'active' : null }}"><a href="{{route('color.view')}}">Colors</a></li>
                            </ul>
                        </li>

                        <li class="{{ Request::segment(1) === 'orders' ? 'active' : null }}">
                            <a href="#Orders" class="has-arrow"><i class="icon-notebook"></i> <span>Orders</span></a>
                            <ul>
                                <li class=""><a href="{{route('order.view')}}">Order</a></li>
                            </ul>
                        </li>

                        <li class="{{ Request::segment(1) === 'users' ? 'active' : null }}">
                            <a href="#Users" class="has-arrow"><i class="icon-users"></i> <span>Users</span></a>
                            <ul>
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
