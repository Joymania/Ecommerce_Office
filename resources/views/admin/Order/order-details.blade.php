@extends('admin.layout.master')
@section('title', 'Order Details')
@section('pageTitle') <a href="#">Order Details</a> @endsection
@section('parentPageTitle') <a href="{{route('order.view')}}">Orders</a> @endsection


@section('content')
<style type="text/css">
    .prof li{
        background:cornflowerblue;
        padding: 7px;
        margin: 3px;
        border-radius: 15px;
    }
    .prof li a{
        color: wheat;
        padding-left: 15px;
    }
    .mytable tr td{
        padding: 15px;
    }

    </style>

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card-body">
            <div class="row">
             <table class="txt-center table table-bordered mytable" width="100%" border="1">
                     <tr>
                         <td width="30%">

                         </td>
                         <td width="40%">
                             <h4><strong>Ecommerce Norda</strong></h4>


                         </td>
                         <td width="30%">
                             <strong>Order NO: #{{ $order->id }}</strong>
                         </td>
                     </tr>
                     <tr>
                         <td><strong>Shipping Information</strong></td>
                         <td colspan="2" style="text-align: left;">
                         <strong>Name:</strong>{{ $order->biling_fname.' '.$order->biling_lname }} &nbsp;&nbsp;&nbsp&nbsp;&nbsp;
                         <strong>Email:</strong>{{ $order->biling_email }}&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
                         <strong>Address:</strong>{{ $order->biling_address }}&nbsp;&nbsp&nbsp;&nbsp;<br>
                         <strong>Mobile:</strong>{{ $order->biling_phone }}&nbsp;&nbsp;
                         {{-- <strong>Payment:</strong>&nbsp;&nbsp;
                         {{ $order['payment']['payment_method'] }}
                         @if ($order['payment']['payment_method']=='Bkash')
                         <span> (Transaction No:{{ $order['payment']['transaction'] }})</span>
                          @endif --}}
                         </td>
                     </tr>

                     <tr>
                         <td colspan="3"><strong>Order Details</strong> </td>
                     </tr>
                     <tr>
                         <td><strong>Product Name & Image</strong></td>
                         <td><strong>Color & Size</strong></td>
                         <td><strong>Quantity & Price</strong></td>
                     </tr>
                     @foreach ($product->products as $details)
                         <tr>
                             <td>
                                 <img src="{{ asset('upload/products_images/'.$details['image']) }}" style="width: 50px; height: 50px;"> &nbsp; {{ $details['name'] }}
                             </td>
                             <td>
                                 {{ $details['color']['name'] }} <br>
                                 {{ $details['size']['name'] }}
                             </td>

                             <td>
                                 {{ $details['pivot']['qty'] }} pieces<br>
                                 {{ $details['price'] }} tk <br>
                                 @php
                                     $subtotal= $details['pivot']['qty']* $details['price'];
                                 @endphp
                                 Total {{ $subtotal }}

                             </td>

                         </tr>
                     @endforeach
                     {{-- <tr>
                         <td colspan="2" style="text-align: right;"><strong>Grand Total</strong></td>
                         <td><strong>{{ $order->order_total }}</strong></td>

                     </tr> --}}


             </table>

            </div>
         </div>
    </div>

</div>

@endsection
