@extends('Frontend.layouts.master')

@section('content')
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

                                    <th>action</th>
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
                                        <a href="#">Product Details</a>
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

