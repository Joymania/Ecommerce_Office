@extends('Frontend.layouts.master')

    @section('content')

    <style type="text/css">
        .sss{
            float: left;
        }
        .s888{
            height: 40px;
            border: 1px solid black;
        }

    </style>

              <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="icon_close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        @php
                        $contents=Cart::content();
                        $total=0;
                    @endphp
                        @foreach ($contents as $content)
                            <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{asset('/upload/products_images/'.$content->options->image) }}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">{{ $content->name }}</a></h4>
                                <span> {{ $content->qty }} × {{ $content->price }}	</span>
                            </div>
                            <div class="cart-delete">
                                <a href="{{ route('delete.cart',$content->rowId) }}">×</a>
                            </div>
                        </li>
                        @php
                        $total+=$content->subtotal;
                    @endphp
                        @endforeach
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>{{ $total }}</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="cart.html">view cart</a>
                        <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">Cart Page </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            {{-- <th>Size</th>
                                            <th>Color</th> --}}
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $contents=Cart::content();
                                            $total=0;
                                        @endphp
                                        @foreach ($contents as $content)
                                            <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="{{ asset('upload/products_images/'.$content->options->image) }}" width="80px" height="100px" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{ $content->name }}</a></td>
                                            <td class="product-price-cart"><span class="amount">{{ $content->price }}</span></td>
                                            <td class="product-quantity pro-details-quality">

                                                <form method="post" action="{{ route('update.cart') }}" >
                                                    @csrf
                                                      <div>
                                                            <div class="cart-plus-minus" >
                                                                <input class="cart-plus-minus-box" type="text" name="qty" value="{{ $content->qty }}">
                                                            </div>
                                                            <input type="hidden" name="rowId" value="{{ $content->rowId }}">
                                                              <div class="float-right">
                                                            <input type="submit" value="Update" class="cart">


                                                        </div>
                                                        </div>


                                                </form>


                                            </td>
                                            <td class="product-subtotal">{{ $content->subtotal }}</td>
                                            <td class="product-remove">
                                                <a href="{{ route('delete.cart',$content->rowId) }}"><i class="icon_close"></i></a>


                                            </td>
                                        </tr>
                                        @php
                                            $total+=$content->subtotal;
                                        @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="#">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <a href="{{ route('destroy.cart') }}">Clear Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">

                            {{-- @if (Session::has('cupon'))

                            @else --}}
                            <div class="col-lg-4 col-md-6">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                    </div>
                                    {{--  @if (Session::has('cupon'))

                                    @else  --}}
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form method="POST" action="{{ route('apply.cuppon') }}">
                                            @csrf
                                            <input type="text" required name="cupon">
                                            <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                    {{--  @endif  --}}
                                </div>
                            </div>
                            {{-- @endif --}}
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>

                                    @if (Session::has('cupon'))
                                    <h5>Total products <span>{{ Session::get('cupon')['blance']}}</span></h5>
                                    @else
                                     <h5>Total products <span>{{ Cart::priceTotal() }}</span></h5>
                                    @endif





                                    <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                            <li><input type="checkbox"> Express <span>$30.00</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>
                                    <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe-area bg-gray pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="section-title">
                            <h2>keep connected</h2>
                            <p>Get updates by subscribe our weekly newsletter</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Enter your email address" name="EMAIL" value="">
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
        <!-- mini cart start -->

