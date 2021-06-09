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
    <!-- for star rating -->
    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">--}}
	{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>--}}

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
                        {{-- @if(Session::get('success'))
                        <div class="alert text-white container" style="background: #6f50a7;">
                           {{ Session::get('success') }}
                        </div>
                      @endif --}}
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
                                            <a id="trackYourOrderBtn" type="button" data-toggle="modal" data-target="#exampleModal">Track Your Order</a>
                                        </div>




                                        <div class="same-style same-style-border language-wrap">
                                            <a class="language-dropdown-active" href="#">English</a>
                                        </div>
                                        <div class="same-style same-style-border currency-wrap">
                                            <a class="currency-dropdown-active" href="#">BDT</a>
                                        </div>
                                    </div>
                                    <div class="social-style-1 social-style-1-mrg">
                                        <a href="#"><i class="icon-social-twitter"></i></a>
                                        <a href="#"><i class="icon-social-facebook"></i></a>
                                        <a href="#"><i class="icon-social-instagram"></i></a>
                                        <a href="#"><i class="icon-social-youtube"></i></a>
                                        <a href="#"><i class="icon-social-pinterest"></i></a>
                                    </div>
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
                                            <li><a href="{{url('/')}}">HOME </a>
                                            </li>
                                            <li><a href="{{ route('products.shop') }}">SHOP </a></li>

                                            <li><a href="#">PAGES </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="{{ route('about_us') }}">about us </a></li>
                                                    <li><a href="{{ route('show.cart') }}" >cart page</a></li>
                                                    <li><a href="{{ route('checkout') }}" >checkout </a></li>
                                                    <li><a href="{{ route('userAccount') }}">my account</a></li>
                                                    <li><a href="{{ route('wishlist.view') }}">wishlist </a></li>
                                                    <li><a href="{{route('contact')}}">contact us </a></li>
                                                    <li><a data-toggle="modal" href="#exampleModal">order tracking</a></li>
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
                                                @if (Auth::id())
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ $cart_num }} </span>
                                                @else
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ Cart::content()->count() }} </span>
                                                @endif
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
                                                @if (Auth::id())
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ $cart_num }} </span>
                                                @else
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ Cart::count() }} </span>
                                                @endif

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
                                                <li class="cr-dropdown @yield('category')"><a href="{{ route('productByCategory', $cat->id) }}">{{$cat->name}}<span class="icon-arrow-right"></span></a>
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
                    @if(Session::get('success'))
                <div class="alert text-white container" style="background: #6f50a7;">
                   {{ Session::get('success') }}
                </div>
              @endif
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
                                        <a href="{{ route('wishlist.view') }}"><i class="icon-heart"></i><span class="pro-count purple">{{ $wishlist_num }}</span></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc header-cart">
                                        <a class="cart-active" href=" {{ route('show.cart') }} ">
                                            <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ Cart::content()->count() }} </span>
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
                                            @if (Auth::id())
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ $cart_num }} </span>
                                            <span class="cart-amount"></span>
                                            @else
                                            <i class="icon-basket-loaded"></i><span class="pro-count purple"> {{ Cart::count() }} </span>
                                            <span class="cart-amount"></span>
                                            @endif

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
        <div id="minicart" class="sidebar-cart-active">
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
                                    <h4><a href="{{route('product.details',['id' => $content->id])}}">{{ $content->name }}</a></h4>
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
        <div class="mobile-header-active mobile-header-wrapper-style" id="side-bar">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close" id="sidebar-close"><i class="icon_close"></i></a>
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
                                <li class="menu-item-has-children"><a href="{{url('/')}}">Home</a> </li>
                                <li class="menu-item-has-children "><a href="{{route('products.shop')}}">shop</a> </li>
                                <li><a href="#">PAGES </a>
                                    <ul class="sub-menu-style">
                                        <li><a href="{{ route('about_us') }}">about us </a></li>
                                        <li><a href="{{ route('show.cart') }}" >cart page</a></li>
                                        <li><a href="{{ route('checkout') }}" >checkout </a></li>
                                        <li><a href="{{ route('userAccount') }}">my account</a></li>
                                        <li><a href="{{ route('wishlist.view') }}">wishlist </a></li>
                                        <li><a href="{{route('contact')}}">contact us </a></li>
                                        <li><a id="mobileViewOrderTrackingBtn" data-toggle="modal" href="#exampleModal">Order tracking</a></li>
                                        <li><a href="{{route('login')}}">login / register </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">Blog</a></li>
                                <li><a href="{{route('contact')}}">Contact </a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
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
