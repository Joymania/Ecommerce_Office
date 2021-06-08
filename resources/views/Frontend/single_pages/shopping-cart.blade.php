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

{{-- <div class="sidebar-cart-active">
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
                            <a href="#"><img src="{{ asset('upload/products_images/'.$cart->product->image) }}"
alt=""></a>
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
if($cart->product->promo_price){
$subtotal = $cart->product->promo_price * $cart->qty;
}
else
$subtotal = $cart->product->price * $cart->qty;
$total+=$subtotal;
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
</div> --}}
   
<form action="{{route('checkout')}}" method="post" id="form">
    @csrf    
</form>
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
        @if(Session::get('success2'))
        <div class="alert text-white container" style="background: #6f50a7;">
            {{ Session::get('success2') }}
        </div>
        @endif
        @if(Session::get('success1'))
        <div class="alert text-white container" style="background: #da1630;">
            {{ Session::get('success1') }}
        </div>
        @endif
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
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($showCart as $show)

                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#"><img
                                            src="{{ asset('upload/products_images/'.$show['product']['image']) }}"
                                            width="80px" height="100px" alt=""></a>
                                </td>
                                <td class="product-name"><a
                                        href="{{route('product.details',['id' => $show->product_id])}}">{{ $show['product']['name'] }}</a>
                                </td>
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

                                            <div data-cartid="{{ $show->id }}" class="cart-plus-minus">
                                                <input class="cart-plus-minus-box qtyauth" type="text" name="qty"
                                                    value="{{ $show->qty }}">
                                            </div>

                                        </div>


                                    </form>


                                </td>
                                <td id="subtotal" class="product-subtotal subtotal-auth">{{ $show['subtotal'] }}</td>
                              
                                <td class="product-remove">
                                    <a href="{{ route('delete.authcart',$show['id']) }}"><i class="icon_close"></i></a>


                                </td>
                            </tr>
                       
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
                                <th>Unit Price</th>
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
                                <td class="product-name"><a
                                        href="{{route('product.details',['id' => $content->id])}}">{{ $content->name }}</a>
                                </td>
                                <td class="product-color"><a href="#">{{ $content->options->color_name }}</a></td>
                                <td class="product-size"><a href="#">{{ $content->options->size_name }}</a></td>
                                <td class="product-price-cart"><span class="amount">{{ $content->price }}</span></td>
                                <td class="product-quantity pro-details-quality">

                        
                                        <div data-id="{{ $content->rowId }}" id="qtyUpdate" class="cart-plus-minus">
                                            <input id="qtyfield" class="cart-plus-minus-box qtyfield" type="text"
                                                name="qty" value="{{ $content->qty }}">
                                        
                                        </div>

                                </td>
                                <td id="subtotal" class="product-subtotal">{{ $content->subtotal }}</td>
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
                                <a  class="ml-5" href="{{ route('destroyauth.cart',Auth::user()) }}">Clear Cart</a>
                            </div>
                            @if (Auth::user())
                            
                            <div class="cart-clear">
                                <a href="#" style="background:crimson;" class="text-white" onclick="event.preventDefault();
                                document.getElementById('form').submit();
            ">Proceed to Checkout</a>

                            </div>
                            @else
                            <div class="cart-clear">
                                <a href="{{ route('destroy.cart') }}">Clear Cart</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        var abc={{Auth::id()}}
        console.log(abc==undefined);
        if(abc != undefined){
            $(document).on('click', '.inc', function(e){

                var url="{{url('update-cart')}}";
                var parent=$(this).parent();
                console.log(parent);
                var subtotal1 = $(parent).parent().parent().parent().next();
                console.log(subtotal1);
                var product_price = $(parent).parent().parent().parent().prev().text();
                console.log(product_price);
                var cartid=$(parent).attr('data-cartid');
                var qty=$(parent).find('.qtyauth').val();
                $.ajax({
                method:'post',
                url:url,
                data:{qty:qty,id:cartid},
                success: function(data){
                //console.log(data);
                //$('.subtotal-auth').text(data.total);
                $(subtotal1).text(parseInt(qty) * parseInt(product_price));

                },
                error: function(error){
                console.log(error);
                }
                })


            });
            $(document).on('click', '.dec', function(e){

            var url="{{url('update-cart')}}";
            var parent=$(this).parent();
            console.log(parent);
            var subtotal1 = $(parent).parent().parent().parent().next();
            console.log(subtotal1);
            var product_price = $(parent).parent().parent().parent().prev().text();
            console.log(product_price);
            var cartid=$(parent).attr('data-cartid');
            var qty=$(parent).find('.qtyauth').val();
            $.ajax({
            method:'post',
            url:url,
            data:{qty:qty,id:cartid},
            success: function(data){
            ////console.log(data);
            //$('.subtotal-auth').text(data.total);
            $(subtotal1).text(parseInt(qty) * parseInt(product_price));

            },
            error: function(error){
            console.log(error);
            }
            })


            });

        }
        else{
            $(document).on('click', '.inc', function(e){
            var url="{{url('update-cart')}}";
            var subtotal = $(this).parent();
            console.log(subtotal)
            var subtotal1 = $(subtotal).parent().next();
            console.log(subtotal1)
            var rowId = $(subtotal).attr('data-id');
            var product_price = $(subtotal).parent().prev().text();
            var qty=$(subtotal).find('.qtyfield').val();
            $.ajax({
            method:'post',
            url:url,
            data:{qty:qty,rowId:rowId},
            success: function(data){
                //console.log(data);
                $(subtotal1).text(parseInt(qty) * parseInt(product_price));
            },
            error: function(error){
            console.log(error);
            }
            })
        });
        $(document).on('click', '.dec', function(e){
        var url="{{url('update-cart')}}";

            var subtotal = $(this).parent();
            var subtotal1 = $(subtotal).parent().next();
            var rowId = $(subtotal).attr('data-id');
            var product_price = $(subtotal).parent().prev().text();
            var qty=$(subtotal).find('.qtyfield').val();



            $.ajax({
            method:'post',
            url:url,
            data:{qty:qty,rowId:rowId},
            success: function(data){
                //console.log(data);
                $(subtotal1).text(parseInt(qty) * parseInt(product_price));
            },
            error: function(error){
            console.log(error);
            }
            })
        });
        }


    });

</script>

@endsection
