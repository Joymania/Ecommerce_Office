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
<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li class="active">Wishlist </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-115 pb-120">
    <div class="container">
        <h3 class="cart-page-title">Your Wishlist items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Action</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $wish)
                                    <tr>
                                    <td class="product-thumbnail">
                                        <a href=""><img src="{{ asset('upload/products_images/'.$wish['product']['image']) }}" alt="" width="98px" height="112px"></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{ $wish['product']['name'] }}</a></td>
                                    <td class="product-price-cart"><span class="amount">{{ $wish['product']['price'] }}</span></td>

                                    <td class="product-wishlist-cart">
                                        <a href="{{ route('product.details', $wish['product_id']) }}">Product Details</a>

                                    </td>
                                    <td>
                                        <div class="cart-delete">
                                            <a href="{{ route('delete.wishlist',$wish->id) }}">×</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

