@extends('Frontend.layouts.master')

@section('content')

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">my account </li>
            </ul>
        </div>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success_msg') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
        @endif
        @if(session()->has('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors['message'] }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('errors'))
         {{--dd($errors['errors']--}}
        @endif
    </div>
</div>
<!-- my account wrapper start -->
<div class="my-account-wrapper pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                    Method</a>
                                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                <a href=""><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Hello, <strong>{{$users->name}}</strong> (If Not <strong>Tuntuni !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                        </div>

                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order as $orders)
                                                    <tr>
                                                        <td>{{$orders->id}}</td>
                                                        <td>{{$orders->created_at}}</td>
                                                        @if ($orders->status==0)
                                                        <td>Pending</td>
                                                        @elseif ($orders->status==1)
                                                        <td>Accepted</td>
                                                        @endif
                                                        <td></td>
                                                        <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Payment Method</h3>
                                        <p class="saved-message">You have used <strong>{{$orders->payment}}</strong> as your payment method.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Billing Address</h3>
                                        <address>
                                            <p><strong>{{$users->name}}</strong></p>
                                            @foreach($order as $ord)
                                            <p>{{$ord->biling_address}}<br>
                                                {{$ord->biling_city}}</p>
                                            <p>Mobile: {{$ord->biling_phone}}</p>
                                            @endforeach
                                        </address>
                                        <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit Address</a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form method="POST" action="{{ route('userUpdate', $users->id) }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Full Name</label>
                                                    <input name="name" type="text" id="display-name" value="{{$users->name}}"/>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>
                                                    <input name="email" type="email" id="email" value="{{$users->email}}" />
                                                </div>
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New Password</label>
                                                                <input name="password" type="password" class="form-control" placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm New Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn ">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>

@endsection
