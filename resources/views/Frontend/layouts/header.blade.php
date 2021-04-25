<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Norda - Minimal eCommerce HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->

    {{-- <link rel="shortcut icon" type="image/x-icon" src="{{asset($logos->image)}}"> --}}

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

    <!-- Use the minified version files listed below for better performance and remove the files listed above
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

</head>

<body>

    <div class="main-wrapper">
        <header class="header-area">
            <div class="header-large-device">
                <div class="header-top header-top-ptb-6 bg-gray-6">
                    <div class="container">

                    @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                    @endif

                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-7">
                                <div class="header-offer-wrap-2 mrg-none">
                                    <p><span>FREE SHIPPING</span> world wide for all orders over $199</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="header-top-right">
                                    <div class="same-style-wrap">
                                        <div class="same-style same-style-mrg-2 track-order">
                                            <a href="store-location.html">Store Location </a>
                                        </div>
                                        <div class="same-style same-style-mrg-2 currency-wrap">
                                            <a class="currency-dropdown-active" href="#"> USD($) <i class="icon-arrow-down"></i></a>
                                            <div class="currency-dropdown">
                                                <ul>
                                                    <li><a href="#">USD</a></li>
                                                    <li><a href="#">EUR</a></li>
                                                    <li><a href="#">BDT</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="same-style same-style-mrg-2 language-wrap">
                                            <a class="language-dropdown-active" href="#">English <i class="icon-arrow-down"></i></a>
                                            <div class="language-dropdown">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">German</a></li>
                                                    <li><a href="#">Spanish</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-middle">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">

                                    {{-- <a href="index.html"><img height="50px" width="70px" src="{{asset($logos->image)}}" alt="logo"></a> --}}

                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-2">
                                    <nav>
                                        <ul>
                                            <li><a href="index.html">HOME <span class="bg-red">HOT</span></a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="index.html">Home version 1 </a></li>
                                                    <li><a href="index-2.html">Home version 2</a></li>
                                                    <li><a href="index-3.html">Home version 3</a></li>
                                                    <li><a href="index-4.html">Home version 4</a></li>
                                                    <li><a href="index-5.html">Home version 5</a></li>
                                                    <li><a href="index-6.html">Home version 6</a></li>
                                                    <li><a href="index-7.html">Home version 7</a></li>
                                                    <li><a href="index-8.html">Home version 8</a></li>
                                                    <li><a href="index-9.html">Home version 9</a></li>
                                                    <li><a href="index-10.html">Home version 10</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">SHOP </a>
                                                <ul class="mega-menu-style mega-menu-mrg-1">
                                                    <li>
                                                        <ul>
                                                            <li>
                                                                <a class="dropdown-title" href="#">Shop Layout</a>
                                                                <ul>
                                                                    <li><a href="shop.html">standard style</a></li>
                                                                    <li><a href="shop-list.html">shop list style</a></li>
                                                                    <li><a href="shop-fullwide.html">shop fullwide</a></li>
                                                                    <li><a href="shop-no-sidebar.html">grid no sidebar</a></li>
                                                                    <li><a href="shop-list-no-sidebar.html">list no sidebar</a></li>
                                                                    <li><a href="shop-right-sidebar.html">shop right sidebar</a></li>
                                                                    <li><a href="store-location.html">store location</a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-title" href="#">Products Layout</a>
                                                                <ul>
                                                                    <li><a href="product-details.html">tab style 1</a></li>
                                                                    <li><a href="product-details-2.html">tab style 2</a></li>
                                                                    <li><a href="product-details-sticky.html">sticky style</a></li>
                                                                    <li><a href="product-details-gallery.html">gallery style </a></li>
                                                                    <li><a href="product-details-affiliate.html">affiliate style</a></li>
                                                                    <li><a href="product-details-group.html">group style</a></li>
                                                                    <li><a href="product-details-fixed-img.html">fixed image style </a></li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html"><img src="{{""}}/assets/images/banner/banner-12.png" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">PAGES </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="about-us.html">about us </a></li>
                                                    <li><a href="cart.html">cart page</a></li>
                                                    <li><a href="checkout.html">checkout </a></li>
                                                    <li><a href="my-account.html">my account</a></li>
                                                    <li><a href="{{ route('wishlist.view') }}">wishlist </a></li>
                                                    <li><a href="compare.html">compare </a></li>
                                                    <li><a href="contact.html">contact us </a></li>
                                                    <li><a href="{{ route('track.show') }}">order tracking</a></li>
                                                    <li><a href="{{route('login')}}">login / register </a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">BLOG <span class="bg-green">NEW</span></a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="blog.html">blog standard </a></li>
                                                    <li><a href="blog-no-sidebar.html">blog no sidebar </a></li>
                                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                </ul>
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
                                            <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count purple">03</span></a>
                                        </div>
                                        <div class="same-style-2 same-style-2-font-inc header-cart">
                                            <a class="cart-active" href="#">
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple">02</span>
                                                <span class="cart-amount">$2,435.30</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="same-style-2 same-style-2-font-inc">
                                            <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count purple">03</span></a>
                                        </div>
                                        <div class="same-style-2 same-style-2-font-inc header-cart">
                                            <a class="cart-active" href="#">
                                                <i class="icon-basket-loaded"></i><span class="pro-count purple">02</span>
                                                <span class="cart-amount">$2,435.30</span>
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
                                                <li class="cr-dropdown @yield('category')"><a href="#">{{$cat->name}}<span class="icon-arrow-right"></span></a>
                                                    <div class="category-menu-dropdown ct-menu-res-height-1">
                                                        <div class="single-category-menu ct-menu-mrg-bottom category-menu-border">
                                                            <h4></h4>
                                                             <ul>
                                                                @foreach($cat->sub_category as $subcat)
                                                                <li><a href="{{route('productByCat',$subcat->id)}}">{{$subcat->sub_category_name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </li>
                                                @endforeach

                                            </ul>


                                        </nav>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="categori-search-wrap categori-search-wrap-modify">
                                    <div class="categori-style-1">
                                        <select id="categories" class="nice-select nice-select-style-1">
                                            <option>All Categories </option>
                                            @foreach($categories as $category)
                                            <option>{{$category->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="search-wrap-3">
                                        <form action="{{route('search.result')}}" method="get">
                                            <input name="search" placeholder="Search Products..." type="text">
                                            <input name="category" id="categoryInput" type="text" hidden>
                                            <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="header-offer-wrap-5">
                                    <h3>50% OFF</h3>
                                    <h4>cyber <br>funk</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-small-device small-device-ptb-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <img alt="" src="{{""}}/assets/images/logo/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="{{route('login')}}"><i class="icon-user"></i></a>
                                </div>
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count purple">03</span></a>
                                </div>
                                <div class="same-style-2 same-style-2-font-inc header-cart">
                                    <a class="cart-active" href="#">
                                        <i class="icon-basket-loaded"></i><span class="pro-count purple">02</span>
                                    </a>
                                </div>
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="icon_close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{""}}/assets/images/cart/cart-1.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Simple Black T-Shirt</a></h4>
                                <span> 1 × $49.00	</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{""}}/assets/images/cart/cart-2.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Norda Backpack</a></h4>
                                <span> 1 × $49.00	</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>$170.00</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="cart.html">view cart</a>
                        <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
                    <div class="header-offer-wrap-2 mrg-none mobile-header-padding-border-4">
                        <p><span>FREE SHIPPING</span> world wide for all orders over $199</p>
                    </div>
                    <div class="mobile-search mobile-header-padding-border-1">
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Search here…">
                            <button class="button-search"><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-padding-border-2">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home version 1 </a></li>
                                        <li><a href="index-2.html">Home version 2</a></li>
                                        <li><a href="index-3.html">Home version 3</a></li>
                                        <li><a href="index-4.html">Home version 4</a></li>
                                        <li><a href="index-5.html">Home version 5</a></li>
                                        <li><a href="index-6.html">Home version 6</a></li>
                                        <li><a href="index-7.html">Home version 7</a></li>
                                        <li><a href="index-8.html">Home version 8</a></li>
                                        <li><a href="index-9.html">Home version 9</a></li>
                                        <li><a href="index-10.html">Home version 10</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">shop</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">shop layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html">standard style</a></li>
                                                <li><a href="shop-list.html">shop list style</a></li>
                                                <li><a href="shop-fullwide.html">shop fullwide</a></li>
                                                <li><a href="shop-no-sidebar.html">grid no sidebar</a></li>
                                                <li><a href="shop-list-no-sidebar.html">list no sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">shop right sidebar</a></li>
                                                <li><a href="store-location.html">store location</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Products Layout</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">tab style 1</a></li>
                                                <li><a href="product-details-2.html">tab style 2</a></li>
                                                <li><a href="product-details-sticky.html">sticky style</a></li>
                                                <li><a href="product-details-gallery.html">gallery style </a></li>
                                                <li><a href="product-details-affiliate.html">affiliate style</a></li>
                                                <li><a href="product-details-group.html">group style</a></li>
                                                <li><a href="product-details-fixed-img.html">fixed image style </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="about-us.html">about us </a></li>
                                        <li><a href="cart.html">cart page</a></li>
                                        <li><a href="checkout.html">checkout </a></li>
                                        <li><a href="my-account.html">my account</a></li>
                                        <li><a href="wishlist.html">wishlist </a></li>
                                        <li><a href="compare.html">compare </a></li>
                                        <li><a href="contact.html">contact us </a></li>
                                        <li><a href="{{ route('track.show') }}">order tracking</a></li>
                                        <li><a href="{{route('login')}}">login / register </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">blog standard </a></li>
                                        <li><a href="blog-no-sidebar.html">blog no sidebar </a></li>
                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="main-categori-wrap mobile-menu-wrap mobile-header-padding-border-3">
                        <a class="categori-show purple" href="#">
                            <i class="lnr lnr-menu"></i> All Department <i class="icon-arrow-down icon-right"></i>
                        </a>
                        <div class="categori-hide-2">
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children "><a href="#">Clothing </a>
                                        <ul class="dropdown">
                                            <li class="menu-item-has-children"><a href="#">Men Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Sleeveless shirt</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt</a></li>
                                                    <li><a href="shop.html">Trench coat</a></li>
                                                    <li><a href="shop.html">Cargo pants</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Women Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Wedding dress</a></li>
                                                    <li><a href="shop.html">Gym clothes</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt </a></li>
                                                    <li><a href="shop.html">Long coat</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Kids Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="product-details.html">Winter Wear </a></li>
                                                    <li><a href="product-details-2.html">Occasion Gowns</a></li>
                                                    <li><a href="product-details-tab1.html">Birthday Tailcoat</a></li>
                                                    <li><a href="product-details-tab2.html">Stylish Unicorn</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Women</a>
                                        <ul class="dropdown">
                                            <li class="menu-item-has-children"><a href="#">Men Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Sleeveless shirt</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt</a></li>
                                                    <li><a href="shop.html">Trench coat</a></li>
                                                    <li><a href="shop.html">Cargo pants</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Women Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Wedding dress</a></li>
                                                    <li><a href="shop.html">Gym clothes</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt </a></li>
                                                    <li><a href="shop.html">Long coat</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Men </a>
                                        <ul class="dropdown">
                                            <li class="menu-item-has-children"><a href="#">Men Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Sleeveless shirt</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt</a></li>
                                                    <li><a href="shop.html">Trench coat</a></li>
                                                    <li><a href="shop.html">Cargo pants</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Women Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Wedding dress</a></li>
                                                    <li><a href="shop.html">Gym clothes</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt </a></li>
                                                    <li><a href="shop.html">Long coat</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Kids Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="product-details.html">Winter Wear </a></li>
                                                    <li><a href="product-details-2.html">Occasion Gowns</a></li>
                                                    <li><a href="product-details-tab1.html">Birthday Tailcoat</a></li>
                                                    <li><a href="product-details-tab2.html">Stylish Unicorn</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Baby Girl </a>
                                        <ul class="dropdown">
                                            <li class="menu-item-has-children"><a href="#">Men Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Sleeveless shirt</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt</a></li>
                                                    <li><a href="shop.html">Trench coat</a></li>
                                                    <li><a href="shop.html">Cargo pants</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">Women Clothing</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Wedding dress</a></li>
                                                    <li><a href="shop.html">Gym clothes</a></li>
                                                    <li><a href="shop.html">Cotton T-shirt </a></li>
                                                    <li><a href="shop.html">Long coat</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html">Baby Boy </a></li>
                                    <li><a href="shop.html">Accessories </a></li>
                                    <li><a href="shop.html">Shoes </a></li>
                                    <li><a href="shop.html">Shirt </a></li>
                                    <li><a href="shop.html">T-Shirt </a></li>
                                    <li><a href="shop.html">Coat </a></li>
                                    <li><a href="shop.html">Jeans </a></li>
                                    <li><a href="shop.html">Collection </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="mobile-header-info-wrap mobile-header-padding-border-3">
                        <div class="single-mobile-header-info">
                            <a href="store-location.html"><i class="lastudioicon-pin-3-2"></i> Store Location </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a class="mobile-language-active" href="#">Language <span><i class="icon-arrow-down"></i></span></a>
                            <div class="lang-curr-dropdown lang-dropdown-active">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-mobile-header-info">
                            <a class="mobile-currency-active" href="#">Currency <span><i class="icon-arrow-down"></i></span></a>
                            <div class="lang-curr-dropdown curr-dropdown-active">
                                <ul>
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">Real</a></li>
                                    <li><a href="#">BDT</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-contact-info mobile-header-padding-border-4">
                        <ul>
                            <li><i class="icon-phone "></i> (+612) 2531 5600</li>
                            <li><i class="icon-envelope-open "></i> norda@domain.com</li>
                            <li><i class="icon-home"></i> PO Box 1622 Colins Street West Australia</li>
                        </ul>
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
