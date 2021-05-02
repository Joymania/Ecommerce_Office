@extends('Frontend.layouts.master')

@section('content')
<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="icon_close"></i></a>
        <div class="cart-content">
            <h3>Shopping Cart</h3>

            <ul>
                @php
                    $total=0;
                @endphp
                @if(Auth::user())
                @foreach ($cartpage as $cart)
                     <li class="single-product-cart">
                     <div class="cart-img">
                         <a href="#"><img src="{{ asset('upload/products_images/'.$cart->product->image) }}" alt=""></a>
                     </div>
                     <div class="cart-title">
                         <h4><a href="#">{{ $cart->product->name }}</a></h4>
                         @if ($cart->product->promo_price)
                         <span> {{ $cart->qty }} × {{ $cart->product->promo_price }} tk	</span>
                         @else
                         <span> {{ $cart->qty }} × {{ $cart->product->price }} tk	</span>
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
                        <a href="#"><img src="{{ asset('upload/products_images/'.$content->options->image) }}" alt=""></a>
                    </div>
                    <div class="cart-title">
                        <h4><a href="#">{{ $content->name }}</a></h4>
                        <span> {{ $content->qty }} × {{ $content->price }} tk	</span>
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
<div class="order-tracking-area pt-110 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-10 ml-auto mr-auto">
                <div class="order-tracking-content">
                    <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                    <div class="order-tracking-form">
                        <form action="{{ route('order.track') }}" method="POST">
                            @csrf
                            <div class="sin-order-tracking">
                                <label>Order ID</label>
                                <input type="text" name="order_id" placeholder="Found in your order confirmation email.">
                            </div>
                            <div class="sin-order-tracking">
                                <label>Billing Email</label>
                                <input type="email" name="email" placeholder="Email you used during checkout">
                            </div>
                            <div class="order-track-btn">

                                <input type="submit" value="Track Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

