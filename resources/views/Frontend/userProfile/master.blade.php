<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Norda - Minimal eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->

    @if(!empty($logos))
   <link rel="shortcut icon" type="image/x-icon" src="{{asset($logos->image)}}">
   @else

   @endif


    <!-- All CSS is here
	============================================ -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{""}}/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{""}}/assets/css/vendor/signericafat.css">
    <link rel="stylesheet" href="{{""}}/assets/css/vendor/cerebrisans.css">
    <link rel="stylesheet" href="{{""}}/assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="{{""}}/assets/css/vendor/elegant.css">
    <link rel="stylesheet" href="{{""}}/assets/css/vendor/linear-icon.css">
    <link rel="stylesheet" href="{{""}}/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="{{""}}/assets/css/plugins/easyzoom.css">
    <link rel="stylesheet" href="{{""}}/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="{{""}}/assets/css/plugins/animate.css">
    <link rel="stylesheet" href="{{""}}/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="{{""}}/assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="{{""}}/assets/css/style.css">

@yield('stylesheet')
<!-- Use the minified version files listed below for better performance and remove the files listed above
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{$pixel->pixel_id}}');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id={{$pixel->pixel_id}}&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body>

<style>
    @media only screen and (max-width: 420px){
        .header-action .same-style-2 {
            margin-right: 8px;
        }
    }
</style>

    <div class="main-wrapper">
        <!-- Header start -->
        <header class="header-area">
            <div class="header-large-device">
                <!-- header top start -->
                <div class="header-top header-top-ptb-6 bg-gray-6">
                    <div class="container">
                        <div class="slider-banner-area">
                            <div class="container">
                                @if(Session::get('success'))
                                <div class="alert text-white container" style="background: #6f50a7;">
                                   {{ Session::get('success') }}
                                </div>
                              @endif
                    <div class="row">
                            <div class="col-xl-4 col-lg-5">
                                <div class="header-offer-wrap">
                                    <p><i class="icon-paper-plane"></i> FREE SHIPPING for all orders over <span>4999 TK.</span></p>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="header-top-right">
                                    <div class="same-style-wrap">
                                    <div class="same-style same-style-border track-order">
                                            <a  type="button" data-toggle="modal" data-target="#exampleModal">Track Your Order</a>
                                        </div>

                                        <div class="same-style same-style-border language-wrap">
                                            <a class="language-dropdown-active" href="#">English</a>
                                        </div>
                                        <div class="same-style same-style-border currency-wrap">
                                            <a class="currency-dropdown-active" href="#">BDT</a>
                                        </div>
                                    </div>
                                    @if(!empty($contacts))
                                    <div class="social-style-1 social-style-1-mrg">
                                        @if($contacts->twitter)
                                            <a target="_blank" href="{{$contacts->twitter}}"><i style="color:white" class="icon-social-twitter"></i></a>
                                        @endif
                                        @if($contacts->facebook)
                                            <a target="_blank" href="{{$contacts->facebook}}"><i style="color:white" class="icon-social-facebook"></i></a>
                                        @endif
                                        @if($contacts->instagram)
                                            <a target="_blank" href="{{$contacts->instagram}}"><i style="color:white" class="icon-social-instagram"></i></a>
                                        @endif
                                        @if($contacts->youtube)
                                            <a target="_blank" href="{{$contacts->youtube}}"><i style="color:white" class="icon-social-youtube"></i></a>
                                        @endif
                                        @if($contacts->pioneer)
                                            <a target="_blank" href="{{$contacts->pioneer}}"><i style="color:white" class="icon-social-pinterest"></i></a>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header top end -->

                <!-- header middle start -->
                <div class="header-middle">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    @if(!empty($logos))
                                    <a href="{{"/"}}"><img src="{{asset($logos->image)}}" alt="logo"></a>
                                    @else
                                    <p>No logo</p>
                                   @endif
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-2">
                                    <nav>
                                        <ul>
                                            <li><a href="/">HOME </a>
                                            </li>
                                            <li><a href="{{ route('search.result') }}">SHOP </a></li>

                                            <li><a href="#">PAGES </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="{{ route('about_us') }}">about us </a></li>
                                                    <li><a href="{{ route('show.cart') }}" >cart page</a></li>
                                                    <li><a href="{{ route('checkout') }}" >checkout </a></li>
                                                    <li><a href="{{ route('userAccount') }}">my account</a></li>
                                                    <li><a href="{{ route('wishlist.view') }}">wishlist </a></li>
                                                    <li><a href="#contact">contact us </a></li>
                                                    <li><a id="mobileViewOrderTrackingBtn" data-toggle="modal" href="#exampleModal">order tracking</a></li>
                                                    <li><a href="{{route('login')}}">login / register </a></li>
                                                </ul>
                                            </li>

                                            <li><a href="#">BLOG <span class="bg-green">NEW</span></a>
                                            </li>
                                            <li><a href="{{route('contact')}}">CONTACT </a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3">
                                <div class="header-action header-action-flex">
                                    @guest
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{route('login')}}"><i class="icon-user"></i></a>
                                        </div>
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{ route('wishlist.view') }}"><i class="icon-heart"></i><span class="pro-count purple">{{ $wishlist_num }}</span></a>
                                        </div>
                                        <div class="same-style-2 same-style-2-font-inc header-cart">
                                        <a class="cart-active" href=" {{ route('show.cart') }} ">
                                            <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ Cart::count() }} </span>
                                            <span class="cart-amount"></span>
                                        </a>
                                        </div>
                                    @else
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{route('userAccount')}}"><i class="icon-user"></i></a>
                                        </div>

                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{ route('wishlist.view') }}"><i class="icon-heart"></i><span class="pro-count purple">{{ $wishlist_num }}</span></a>
                                        </div>

                                        <div class="same-style-2 same-style-2-font-inc header-cart">
                                            <a class="cart-active" href=" {{ route('show.cart') }} ">
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ $cart_num }} </span>
                                                <span class="cart-amount"></span>
                                            </a>
                                        </div>

                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="icon-logout"></i>
                                            </a>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        </form>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header middle end -->

                <!-- header bottom start -->
                <div class="header-bottom header-bottom-ptb">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <div class="main-categori-wrap main-categori-wrap-modify">
                                    <a class="categori-show" href="#"><i class="lnr lnr-menu"></i> All Department <i class="icon-arrow-down icon-right"></i></a>
                                    <div class="category-menu categori-hide categori-not-visible">
                                        <nav>
                                            <ul>
                                              @foreach($categories as $cat)
                                                @if($cat->sub_category->isEmpty())
                                                <li class="cr-dropdown @yield('category')"><a href="{{ route('productByCategory', $cat->id) }}">{{$cat->name}}</a></li>
                                                @else
                                                <li class="cr-dropdown @yield('category')"><a href="#">{{$cat->name}}<span class="icon-arrow-right"></span></a>
                                                    <div class="category-menu-dropdown ct-menu-res-height-1">
                                                        <div class="single-category-menu ct-menu-mrg-bottom category-menu-border">

                                                             <ul>
                                                                @foreach($cat->sub_category as $subcat)
                                                                <li><a href="{{route('productByCat',$subcat->id)}}">{{$subcat->sub_category_name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    @endif
                                                </li>
                                                @endforeach

                                            </ul>


                                        </nav>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="categori-search-wrap categori-search-wrap-modify">
                                   {{-- <div class="categori-style-1">
                                        <select id="categoriesName" class="nice-select nice-select-style-1">
                                            <option value="">All Categories </option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>--}}
                                    <div class="search-wrap-3">
                                        <form action="{{route('search.result')}}">
                                            <input name="search" id="searchText" placeholder="Search Products..." type="text">
                                            {{--<input name="category" id="categoryInput" type="text" hidden>--}}
                                            <button id="searchBtn" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- offer -->
                            <div class="col-lg-3">
                                <div class="header-offer-wrap-5">
                                    <h3>50% OFF</h3>
                                    <h4>cyber <br>funk</h4>
                                </div>
                            </div>
                            <!-- offer -->

                        </div>
                    </div>
                </div>
                <!-- header bottom end -->

            </div>
            <div class="header-small-device small-device-ptb-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo">
                                @if(!empty($logos))
                                    <a href="/"><img  src="{{asset($logos->image)}}" alt="logo"></a>
                                @endif
                            </div>
                        </div>

                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                @guest
                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="{{route('login')}}"><i class="icon-user"></i></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="{{ route('wishlist.view') }}"><i class="icon-heart"></i></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc header-cart">
                                        <a class="cart-active" href=" {{ route('show.cart') }} ">
                                            <i class="icon-basket-loaded"></i>
                                        </a>
                                    </div>
                                @else
                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="{{route('userAccount')}}"><i class="icon-user"></i></a>
                                    </div>

                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="{{ route('wishlist.view') }}"><i class="icon-heart"></i><span class="pro-count purple">{{ $wishlist_num }}</span></a>
                                    </div>

                                    <div class="same-style-2 same-style-2-font-inc header-cart">
                                        <a class="cart-active" href=" {{ route('show.cart') }} ">
                                            <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ $cart_num }} </span>
                                            <span class="cart-amount"></span>
                                        </a>
                                    </div>

                                    <div class="same-style-2 same-style-2-font-inc">
                                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form2').submit();">
                                                    <i class="icon-logout"></i>
                                        </a>
                                    </div>
                                    <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                                @endguest

                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header start end-->

        <!-- mini cart start -->
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
                            @if(!empty($cartpage))
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
                                        if($cart->product->promo_price){
                                            $subtotal = $cart->product->promo_price * $cart->qty;
                                        }
                                        else
                                            $subtotal = $cart->product->price * $cart->qty;
                                        $total+=$subtotal;
                                    @endphp
                                @endforeach
                            @endif

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
        <!-- mini cart end -->

        <!-- mobile header start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
                    <div class="header-offer-wrap-2 mrg-none mobile-header-padding-border-4">
                        <p><span>FREE SHIPPING</span> for all orders over 4999 TK.</p>
                    </div>
                    <!-- search -->
                    <div class="mobile-search mobile-header-padding-border-1">
                        <form class="search-form" action="{{ route('search.result') }}">
                            <input name="search" id="searchText2" placeholder="Search Products..." type="text">
                            <input name="category" id="categoryInput2" type="text" hidden>
                            <button id="searchBtn2" type="submit"><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>

                    <div class="mobile-menu-wrap mobile-header-padding-border-2">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="/">Home</a> </li>
                                <li class="menu-item-has-children "><a href="{{route('search.result')}}">shop</a> </li>
                                <li><a href="#">PAGES </a>
                                    <ul class="sub-menu-style">
                                        <li><a href="{{ route('about_us') }}">about us </a></li>
                                        <li><a href="{{ route('show.cart') }}" >cart page</a></li>
                                        <li><a href="{{ route('checkout') }}" >checkout </a></li>
                                        <li><a href="{{ route('userAccount') }}">my account</a></li>
                                        <li><a href="{{ route('wishlist.view') }}">wishlist </a></li>
                                        <li><a href="#contact">contact us </a></li>
                                        <li><a id="footerOrderTrackingBtn" href="#exampleModal">Track Order</a></li>
                                        <li><a href="{{route('login')}}">login / register </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">Blog</a></li>
                                <li><a href="{{route('contact')}}">Contact </a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content m-auto" style="width: 100%">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
                                    </div>
                                    <div class="modal-body m-0" style="margin-top: -10% !important;">
                                        <label for="order_code"></label>
                                        <input type="text" class="form-control" name="order_code" id="order_codeMobile" placeholder="Give your order code!!" autocomplete="off">
                                        <button type="button" id="tracking-buttonMobile" class="btn btn-primary mt-2">Track Order</button>

                                        <div style="background: #FFF3CD" id="statusMobile" hidden>
                                            <h4 class="text-center mt-2" id="status-textMobile" style="padding: 10px 0"></h4>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="closeBtnMobile" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-categori-wrap mobile-menu-wrap mobile-header-padding-border-3">
                        <a class="categori-show purple" href="#">
                            <i class="lnr lnr-menu"></i> All Department <i class="icon-arrow-down icon-right"></i>
                        </a>
                        <div class="categori-hide-2">
                            <nav>
                                <ul class="mobile-menu">
                                    @foreach($categories as $cat)
                                    <li class="menu-item-has-children "><a href="#"> {{ $cat->name }} </a>
                                        <ul class="dropdown">
                                            @foreach( $cat->sub_category as $subcat)
                                            <li class="menu-item-has-children"><a href="{{route('productByCat',$subcat->id)}}">{{$subcat->sub_category_name}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="mobile-header-info-wrap mobile-header-padding-border-3">
                        <div class="single-mobile-header-info">
                            <a class="mobile-language-active" href="#">English</a>
                        </div>

                        <div class="single-mobile-header-info">
                            <a class="mobile-currency-active" href="#">BDT <span><i class="icon-arrow-down"></i></span></a>
                        </div>

                        <div class="mobile-contact-info mobile-header-padding-border-4">
                            @if(!empty($contacts))
                            <ul>
                                <li><i class="icon-phone "></i> {{$contacts->mobile_no}} </li>
                                <li><i class="icon-envelope-open "></i> {{$contacts->email}} </li>
                                <li><i class="icon-home"></i> {{$contacts->address}} </li>
                            </ul>
                            @else
                            <p>No contact data</p>
                            @endif
                        </div>
                        <div class="mobile-social-icon">
                            <a class="facebook" href="#"><i class="icon-social-facebook"></i></a>
                            <a class="twitter" href="#"><i class="icon-social-twitter"></i></a>
                            <a class="pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                            <a class="instagram" href="#"><i class="icon-social-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="subscribe-area bg-gray-4 pt-115 pb-115">
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
                    <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="" action="#">
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

<footer class="footer-area bg-gray-4">
    <div class="footer-top border-bottom-4 pb-55">
        <div class="container">
            <div class="row">
                <!-- Quick shop -->
                @if($categories->isNotEmpty())
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-title">Quick Shop</h3>
                        <div class="footer-info-list info-list-50-parcent">
                            <ul>
                                @foreach($categories as $i => $cat)
                                    @if( $i >= 5 )
                                        @break
                                    @endif
                                    <li><a href="{{ route('productByCategory', $cat->id) }}">{{ $cat->name }}</a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                @endif

                @if($usefuls->isNotEmpty())
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="footer-widget ml-70 mb-40">
                            <h3 style="color:white" class="footer-title">useful links</h3>
                            <div class="footer-info-list">
                                <ul>
                                    @foreach($usefuls as $useful)
                                        <li><a style="color:white" href="{{ $useful->link }}">{{ $useful->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif


                @if(!empty($contacts))
                <div id="contact" class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="footer-widget mb-40 ">
                        <h3 class="footer-title">Contact Us</h3>
                        <div class="contact-info-2">
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-call-end"></i>
                                </div>
                                <div class="contact-info-2-content contact-info-2-content-purple">
                                    <p>Got a question? Call us 24/7</p>
                                    <h3 class="purple">{{ $contacts->mobile_no }}</h3>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-cursor icons"></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p>{{ $contacts->address }}</p>
                                </div>
                            </div>
                            <div class="single-contact-info-2">
                                <div class="contact-info-2-icon">
                                    <i class="icon-envelope-open "></i>
                                </div>
                                <div class="contact-info-2-content">
                                    <p>{{ $contacts->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="social-style-1 social-style-1-font-inc social-style-1-mrg-2">
                        @if($contacts->twitter)
                                <a target="_blank" href="{{$contacts->twitter}}"><i style="color:white" class="icon-social-twitter"></i></a>
                            @endif
                            @if($contacts->facebook)
                                <a target="_blank" href="{{$contacts->facebook}}"><i style="color:white" class="icon-social-facebook"></i></a>
                            @endif
                            @if($contacts->instagram)
                                <a target="_blank" href="{{$contacts->instagram}}"><i style="color:white" class="icon-social-instagram"></i></a>
                            @endif
                            @if($contacts->youtube)
                                <a target="_blank" href="{{$contacts->youtube}}"><i style="color:white" class="icon-social-youtube"></i></a>
                            @endif
                            @if($contacts->pioneer)
                                <a target="_blank" href="{{$contacts->pioneer}}"><i style="color:white" class="icon-social-pinterest"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                @else
                <p>No contact data available!</p>
                @endif
            </div>
        </div>
    </div>

    <div class="footer-bottom pt-30 pb-30 ">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-6 col-md-6">
                    <div class="payment-img payment-img-right">
                        <a href="#"><img src="{{ asset('') }}assets/images/icon-img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copyright copyright-center">
                        {{-- <p>Copyright © 2020 HasThemes | <a href="https://hasthemes.com/">Built with <span>Norda</span> by HasThemes</a>.</p>--}}
                        @if(!empty($copyright))
                            <p>{!! $copyright->title !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal Starts here--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div id="modal-content" class="modal-content m-auto" style="width: 100%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
                </div>
                <div class="modal-body m-0" style="margin-top: -10% !important;">
                    <label for="order_code"></label>
                    <input type="text" class="form-control" name="order_code" id="order_code" placeholder="Give your order code!!" autocomplete="off">
                    <button type="button" id="tracking-button" class="btn btn-primary mt-2">Track Order</button>

                    <div style="background: #FFF3CD" id="status" hidden>
                        <h4 class="text-center mt-2" id="status-text" style="padding: 10px 0"></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--Modal ends here--}}


</footer>

<!-- All JS is here
============================================ -->

<script src="{{""}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{""}}/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="{{""}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{""}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{""}}/assets/js/plugins/slick.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.instagramfeed.min.js"></script>
<script src="{{""}}/assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="{{""}}/assets/js/plugins/wow.js"></script>
<script src="{{""}}/assets/js/plugins/jquery-ui-touch-punch.js"></script>
<script src="{{""}}/assets/js/plugins/jquery-ui.js"></script>
<script src="{{""}}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{""}}/assets/js/plugins/sticky-sidebar.js"></script>
<script src="{{""}}/assets/js/plugins/easyzoom.js"></script>
<script src="{{""}}/assets/js/plugins/scrollup.js"></script>
<script src="{{""}}/assets/js/plugins/ajax-mail.js"></script>

<!-- Use the minified version files listed below for better performance and remove the files listed above
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>  -->
<!-- Main JS -->
<script src="{{""}}/assets/js/main.js"></script>
<script src="{{""}}/js/search.js"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/order_tracking.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#trackOrderFooterLink').on('click',function () {
            if(window.matchMedia("(max-width: 767px)").matches){
                $('#modal-content').css('width','100%');
            }else{
                $('#modal-content').css('width','45%');
            }
        })
    });
</script>
@yield('scripts')
</body>

</html>

