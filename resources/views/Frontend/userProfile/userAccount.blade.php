@extends('Frontend.userProfile.master')

@section('content')

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
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
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('user-logout-form').submit();"><i class="fa fa-sign-out"></i> Logout
                                </a>
                                <form id="user-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>

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
                                            <p>Hello, <strong>{{$user->name}}</strong> <strong></strong><a href="" class="logout"> </a></p>
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
                                                       
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->id}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        @if ($order->status==0)
                                                            <td>Pending</td>
                                                        @elseif ($order->status==1)
                                                            <td>Accepted</td>
                                                        @elseif ($order->status==2)
                                                            <td>Delivered</td>
                                                        @else <td></td>
                                                        @endif
                                                        
                                                        <td class="actions"><a href="{{ route('orderDetails',$order->id) }}">
                                                            <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-"
                                                            data-toggle="tooltip" data-original-title="Details"><i class="icon-eye" aria-hidden="true"></i></a>
                                                        </td>
                                                       
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
                                        <p class="saved-message">You have used <strong>Bkash</strong> as your payment method.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Billing Address</h3>
                                        
                                        <address>
                                            <p><strong>{{$user->name}}</strong></p>
                                           
                                            <p>{{$user->address}}</p>
                                            <p>Mobile: {{$user->phone}}</p>
                                            
                                        </address>
                                        
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form method="POST" action="{{ route('userUpdate') }}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Full Name</label>
                                                    <input name="name" type="text" id="display-name" value="{{$user->name}}" required/>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>
                                                    <input name="email" type="email" id="email" value="{{$user->email}}" required/>
                                                </div>
                                                
                                                <div class="single-input-item">
                                                    <label for="address" class="required">Address</label>
                                                    <input name="address" type="text" id="address" value="{{$user->address}}"/>
                                                </div>

                                                <div class="single-input-item">
                                                    <label for="phone" class="required">Mobile</label>
                                                    <input name="phone" type="text" id="phone" value="{{$user->phone}}"/>
                                                </div>

                                                <div class="form-group">
                                                    <div>
                                                        <label class="fancy-radio">
                                                            <input name="gender" value="male" type="radio" {{$user->gender == 'male'?"checked":null}}>
                                                            <span><i></i>Male</span>
                                                        </label>
                                                        <label class="fancy-radio">
                                                            <input name="gender" value="female" type="radio" {{ $user->gender == 'female'? "checked" : null}}>
                                                            <span><i></i>Female</span>
                                                        </label>
                                                    </div>
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