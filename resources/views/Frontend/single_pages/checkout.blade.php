@extends('Frontend.layouts.master')

@section('content')
            <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">Checkout </li>
                    </ul>
                </div>
            </div>
        </div>
        @php
            $contents=Cart::content();
        @endphp
        <div class="checkout-main-area pt-120 pb-120">
            <div class="container">
                {{-- <div class="customer-zone mb-20">
                    <p class="cart-page-title">Returning customer? <a class="checkout-click1" href="#">Click here to login</a></p>
                    <div class="checkout-login-info">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="sin-checkout-login">
                                        <label>Username or email address <span>*</span></label>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="sin-checkout-login">
                                        <label>Passwords <span>*</span></label>
                                        <input type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="button-remember-wrap">
                                <button class="button" type="submit">Login</button>
                                <div class="checkout-login-toggle-btn">
                                    <input type="checkbox">
                                    <label>Remember me</label>
                                </div>
                            </div>
                            <div class="lost-password">
                                <a href="#">Lost your password?</a>
                            </div>
                        </form>

                    </div>
                </div> --}}
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="checkout-wrap pt-30">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="billing-info-wrap mr-50">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-info mb-20">
                                                <label>First Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="name" value="{{ @$users->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-info mb-20">
                                                <label>Last Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="lname" value="{{ @$users->lname }}">
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Street Address <abbr class="required" title="required">*</abbr></label>
                                                <input class="billing-address" placeholder="House number and street name" type="text" name="address" value="{{ @$users->address }}">

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="city" value="{{ @$users->city }}">
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info mb-20">
                                                <label>Phone <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="phone" value="{{ @$users->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info mb-20">
                                                <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" name="email" value="{{ @$users->email }}">
                                            </div>
                                        </div>
                                    </div>


                                    {{--  <div class="checkout-account mt-25">
                                        <input class="checkout-toggle" type="checkbox">
                                        <span>Ship to a different address?</span>
                                    </div>
                                    <div class="different-address open-toggle mt-30">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info mb-20">
                                                    <label>First Name</label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info mb-20">
                                                    <label>Last Name</label>
                                                    <input type="text">
                                                </div>
                                            </div>


                                            <div class="col-lg-12">
                                                <div class="billing-info mb-20">
                                                    <label>Street Address</label>
                                                    <input class="billing-address" placeholder="House number and street name" type="text">

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-20">
                                                    <label>Town / City</label>
                                                    <input type="text">
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info mb-20">
                                                    <label>Phone</label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info mb-20">
                                                    <label>Email Address</label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                    <div class="additional-info-wrap">
                                        <label>Order notes</label>
                                        <textarea placeholder="Notes about your order, e.g. special notes for delivery. " name="notes"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="your-order-area">
                                    <h3>Your order</h3>
                                    <div class="your-order-wrap gray-bg-4">
                                        <div class="your-order-info-wrap">
                                            <div class="your-order-info">
                                                <ul>
                                                    <li>Product <span>Total</span></li>
                                                </ul>
                                            </div>
                                            @if (Auth::user())
                                            <div class="your-order-middle">

                                                @foreach ($showCart as $show)

                                                    <li> Product :{{ $show['product']['name'] }} <span> ({{ $show->qty }}x{{ $show['product']['price'] }} )</span></li>
                                                @endforeach
                                            </div>
                                            @php
                                            $subammount=0;
                                                foreach ($showCart as $show) {
                                                $subammount+=$show->subtotal;
                                                }
                                            @endphp
                                            <div class="your-order-info order-subtotal">
                                                <ul>
                                                    <li>Subtotal <span> {{ $subammount }} tk</span></li>
                                                </ul>
                                            </div>

                                            <div class="your-order-info order-total">
                                                <ul>
                                                    <li>Total <span>{{ $subammount +20}} tk </span></li>
                                                </ul>
                                            </div>
                                            @else
                                            <div class="your-order-middle">
                                                @foreach ($contents as $content)
                                                    <li> Product :{{ $content->name }} <span> ({{ $content->qty }}x{{ $content->price }} )</span></li>
                                                @endforeach
                                                <div class="your-order-info order-subtotal">
                                                     <ul>
                                                        <li>Subtotal <span> {{ Cart::subtotal() }} tk</span></li>
                                                    </ul>
                                                </div>

                                                <div class="your-order-info order-total">
                                                    <ul>
                                                        <li>Total <span>{{ Cart::total() }} tk </span></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            @endif


                                        </div>
                                        <div class="payment-method">
                                            {{-- <div class="pay-top sin-payment">
                                                <input id="payment_method_1" class="input-radio" type="radio" value="cheque" name="payment_method">
                                                <label for="payment_method_1"> Direct Bank Transfer </label>
                                                <div class="payment-box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
                                                </div>
                                            </div> --}}

                                            <div class="pay-top sin-payment">
                                                <input id="payment-method-3" class="input-radio" type="radio" value="cheque" name="payment">
                                                <label for="payment-method-3">Cash on delivery </label>
                                                <div class="payment-box payment_method_bacs">
                                                    {{--  <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>  --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="Place-order">
                                        {{--  <a href="">Place Order</a>  --}}
                                        <input type="submit" class="btn btn btn-danger" value="Place Order">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
@endsection

