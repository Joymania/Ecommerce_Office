@extends('Frontend.layouts.master')

@section('content')

{{-- <style type="text/css">
        .sss{
            float: left;
        }
        .s888{
            height: 40px;
            border: 1px solid black;
        }

    </style> --}}

<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="icon_close"></i></a>
        <div class="cart-content">
            <h3>Shopping Cart</h3>

            @php
            $total=0;
            @endphp
            @if(Auth::user())
                <ul>
                    @foreach ($cartpage as $cart)
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#"><img src="{{ asset('upload/products_images/'.$cart->product->image) }}" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="#">{{ $cart->product->name }}</a></h4>
                            @if ($cart->product->promo_price)
                            <span> {{ $cart->qty }} × {{ $cart->product->promo_price }} tk </span>
                            @else
                            <span> {{ $cart->qty }} × {{ $cart->product->price }} tk </span>
                            @endif

                        </div>
                        <div class="cart-delete">
                            <a href="{{ route('delete.authcart',$cart->id) }}">×</a>
                        </div>
                    </li>
                    @php
                    $total+=$cart->subtotal;
                    @endphp
                    @endforeach
                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span>{{ $total }}tk</span></h4>
                </div>
            @else
                <ul>
                    @php
                    $contents=Cart::content();
                    $total=0;
                    @endphp
                    @foreach ($contents as $content)
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#"><img src="{{ asset('upload/products_images/'.$content->options->image) }}"
                                    alt=""></a>
                        </div>

                        <div class="cart-title">
                            <h4><a href="#">{{ $content->name }}</a></h4>
                            <span> {{ $content->qty }} × {{ $content->price }} tk </span>                
                            <div class="cart-delete">
                                <a href="{{ route('delete.cart',$content->rowId) }}">×</a>
                            </div>
                        </div>
                    </li>
                    @php
                    $total+=$content->subtotal;
                    @endphp
                    @endforeach
                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span>{{ $total }}tk</span></h4>
                </div>
            @endif
            <div class="cart-checkout-btn">
                <a class="btn-hover cart-btn-style" href="{{ route('show.cart') }}">view cart</a>
                <a class="no-mrg btn-hover cart-btn-style" href="{{ route('checkout') }}">checkout</a>
            </div>
        </div>
    </div>
</div>

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
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

                @if (Auth::user())

                <div class="table-content table-responsive cart-table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Until Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{-- dd($showCart) --}}
                            {{-- @php
                            dd($showCart);
                            @endphp --}}
                            @foreach ($showCart as $show)

                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#"><img
                                            src="{{ asset('upload/products_images/'.$show['product']['image']) }}"
                                            width="80px" height="100px" alt=""></a>
                                </td>
                                <td class="product-name"><a href="#">{{ $show['product']['name'] }}</a></td>
                                @if(!empty($show['color']))
                                <td class="product-color">{{$show['color']['name']}}</td>
                                @else <td> </td>
                                @endif

                                @if(!empty($show['size']))
                                <td class="product-size">{{$show['size']['name']}}</td>
                                @else <td> </td>
                                @endif
                                <td class="product-price-cart">
                                    @if ($show['product']['promo_price'])
                                    <span class="amount">{{ $show['product']['promo_price'] }}</span>
                                    @else
                                    <span class="amount">{{ $show['product']['price'] }}</span>
                                    @endif

                                </td>
                                <td class="product-quantity pro-details-quality">

                                    <form method="post" action="{{ route('update.cart') }}">
                                        @csrf
                                        <div>

                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qty"
                                                    value="{{ $show->qty }}">
                                            </div>
                                            <input type="hidden" name="id" value="{{ $show->id }}">
                                            <div class="float-center ">
                                                <input type="submit" value="Update" class="">
                                            </div>
                                        </div>


                                    </form>


                                </td>
                                <td class="product-subtotal">{{ $show['subtotal'] }}</td>
                                <td class="product-remove">
                                    <a href="{{ route('delete.authcart',$show['id']) }}"><i class="icon_close"></i></a>


                                </td>
                            </tr>
                            {{-- @php
                                        $total+=$content->subtotal;
                                    @endphp --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
                @else
                <div class="table-content table-responsive cart-table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Until Price</th>
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
                                    <a href="#"><img
                                            src="{{ asset('upload/products_images/'.$content->options->image) }}"
                                            width="80px" height="100px" alt=""></a>
                                </td>
                                <td class="product-name"><a href="#">{{ $content->name }}</a></td>
                                <td class="product-color"><a href="#">{{ $content->options->color_name }}</a></td>
                                <td class="product-size"><a href="#">{{ $content->options->size_name }}</a></td>
                                <td class="product-price-cart"><span class="amount">{{ $content->price }}</span></td>
                                <td class="product-quantity pro-details-quality">

                                    <form method="post" action="{{ route('update.cart') }}">
                                        @csrf
                                        <div>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qty"
                                                    value="{{ $content->qty }}">
                                            </div>
                                            <input type="hidden" name="rowId" value="{{ $content->rowId }}">
                                            <div class="float-center">
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
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update">
                                <a href="/">Continue Shopping</a>
                            </div>
                            @if (Auth::user())
                            <div class="cart-clear">

                                <a href="{{ route('destroyauth.cart',Auth::user()) }}">Clear Cart</a>


                            </div>
                            @else
                            <div class="cart-clear">
                                <a href="{{ route('destroy.cart') }}">Clear Cart</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">

                    {{--  <div class="col-lg-4 col-md-6">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                    </div>

                                     <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form method="POST" action="{{ route('apply.cuppon') }}">
                    @csrf
                    <input type="text" required name="cupon">
                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                    </form>
                </div>

            </div>
        </div> --}}
        <div class="col-lg-4 col-md-12">
            <div class="grand-totall">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                </div>

                {{--  @if (Session::has('cupon'))
                                    <h5>Total products <span>{{ Session::get('cupon')['blance']}}</span></h5> --}}

                @if(Auth::user())
                @php
                $subammount=0;
                foreach ($showCart as $show) {
                $subammount+=$show->subtotal;
                }
                @endphp
                <h5>Total products <span>{{ $subammount }}</span></h5>

                @else
                <h5>Total products <span>{{ Cart::subtotal() }}</span></h5>


                @endif

                <div class="total-shipping">
                    <h5>Total shipping</h5>
                    <ul>
                        <li><input type="radio" name="check" value="1" checked> Standard <span>20.00</span></li>
                        {{--  <li><input type="radio" name="check" value="2"> Express <span>30.00</span></li>  --}}
                    </ul>
                </div>

                {{-- <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4> --}}
                <a href="{{ route('checkout') }}">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection
