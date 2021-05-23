@extends('Frontend.userProfile.master')

@section('content')
<style type="text/css">
    .media{
        display: block;
    }
    .media-body>input{
        background: none;
        border: none;
        margin: 10px 0;
        padding: 0;
    }
    .delete-btn{
        margin-bottom: 30px;
    }
</style>


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
        @if(Session::get('success'))
        <div class="alert text-white container" style="background: #6f50a7;">
           {{ Session::get('success') }}
        </div>
      @endif

      @if(Session::get('error'))
      <div class="alert text-white container" style="background: #eb1034;">
         {{ Session::get('success') }}
      </div>
    @endif

      {{-- @if(Session::get('error'))
      <div class="alert bg-danger">
         {{ Session::get('success') }}
      </div>
    @endif --}}

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
                                            <table class="table table-bordered js-basic-example dataTable" id="DataTables_Table_0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order Code</th>
                                                         <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->order_code}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        @if ($order->status==0)
                                                            <td>Pending</td>
                                                        @elseif ($order->status==1)
                                                            <td>Accepted</td>
                                                        @elseif ($order->status==2)
                                                            <td>Delivered</td>
                                                        @else <td></td>
                                                        @endif

                                                        <td class="actions">
                                                            <a href="{{ route('orderDetails',$order->id) }}">
                                                                <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-"
                                                                data-toggle="tooltip" data-original-title="Details">
                                                                    <i class="icon-eye" aria-hidden="true"></i>
                                                                </button>
                                                            </a>
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
                                    <div class="myaccount-content" id="userUpdate">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form" >

                                            <form method="POST" action="{{ route('userUpdate') }}" enctype="multipart/form-data" >
                                                @csrf

                                                <!-- user img start-->
                                                <div class="row clearfix">
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <div class="body">
                                                            <h5>Profile Photo</h5>
                                                            <div class="media photo">
                                                                <div class="media-left m-r-15">
                                                                    <img src="{{ (!empty($user->image)) ? url('upload/users/'.$user->image):url('upload/noImage.jpg') }}" class="user-photo media-object" alt="User" width="140px" height="140px">
                                                                </div>
                                                                <div class="media-body">

                                                                    <input name="image" type="file" id="filePhoto" class="@error('image') is-invalid @enderror">
                                                                    <div>
                                                                        @error('image')
                                                                            <span class="" role="alert" style="color: red">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <!-- delete image -->
                                                                <div hidden> {{$route = route('userAccount.image.delete',$user->id)}}</div>
                                                                <div class="delete-btn">
                                                                <a class="btn-sm btn-danger" href="{{ route('userAccount.image.delete',$user->id) }}"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                                                                    confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">
                                                                    Delete Image
                                                                </a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                </div>

                                                <!-- user img end -->

                                                <div class="single-input-item">
                                                    <label for="display-name" class="required">Full Name</label>
                                                    <input name="name" class="@error('name') is-invalid @enderror" type="text" id="display-name" value="{{old('name',$user->name)}}" required/>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>

                                                    <input name="email" type="email" id="email" class="@error('email') is-invalid @enderror"  value="{{old('email',$user->email)}}" required/>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="single-input-item">
                                                    <label for="address" class="required">Address</label>
                                                    <input name="address" type="text" id="address" class="@error('address') is-invalid @enderror"  value="{{old('address',$user->address)}}"/>
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="single-input-item">
                                                    <label for="phone" class="required">Mobile/Phone</label>
                                                    <input name="phone" type="text" id="phone" class="@error('phone') is-invalid @enderror"  value="{{old('phone',$user->phone)}}"/>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <fieldset>
                                                    <legend>Gender</legend>
                                                    <div>
                                                        <label class="">
                                                            <input name="gender" value="male" type="radio" {{$user->gender == 'male'?"checked":null}}>
                                                            <span><i></i>Male</span>
                                                        </label>
                                                        <label class="">
                                                            <input name="gender" value="female" type="radio" {{ $user->gender == 'female'? "checked" : null}}>
                                                            <span><i></i>Female</span>
                                                        </label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Password change</legend>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New Password</label>
                                                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror

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
                                            <form id="delete-form" method="POST"  class="d-none">
                                                    @csrf
                                                    @method('DELETE')
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

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">

@endsection

@section('scripts')
    {{--jquery Data table assest--}}
    <script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

@endsection
