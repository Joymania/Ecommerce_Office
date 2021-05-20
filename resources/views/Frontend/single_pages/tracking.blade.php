@extends('Frontend.layouts.master')

@section('content')

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

