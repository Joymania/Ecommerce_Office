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

