@extends('Frontend.layouts.master')

@section('content')
    @include('Frontend.layouts.slider')
    @include('Frontend.layouts.service_area')
      <div class="product-area pb-110">
            <div class="container">
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-deal-wrap">
                        <div class="section-title-3">
                            <h2>Flash Deal</h2>
                        </div>
                        <div class="timer-wrap-2">
                            <h4><i class="icon-speedometer"></i> Expires in:</h4>
                            <div class="timer-style-2" id="timer-2-active"></div>
                        </div>
                    </div>
                    <div class="btn-style-7">
                        <a href="shop.html">All Product</a>
                    </div>
                </div>
                <div class="product-slider-active-3 nav-style-3">
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-41.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-40%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">baby</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Advantage Baby Milk</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <span>(4)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$38.50 </span>
                                    <span class="old-price">$42.85</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">baby</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Advantage Baby Milk</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                    </div>
                                    <span>(4)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$38.50 </span>
                                    <span class="old-price">$42.85</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-42.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">fashion</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Herchoe Backpack</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$26.50 </span>
                                    <span class="old-price">$45.85</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">fashion</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Herchoe Backpack</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$26.50 </span>
                                    <span class="old-price">$45.85</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-43.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-15%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">baby</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Pampers baby-dry diapers</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(6)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$43.50 </span>
                                    <span class="old-price">$52.85</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">baby</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Pampers baby-dry diapers</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(6)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$43.50 </span>
                                    <span class="old-price">$52.85</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-44.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-10%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">furniture </a>
                                </div>
                                <h3><a class="purple" href="product-details.html">White Plastic Chair</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(3)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$123.50  </span>
                                    <span class="old-price">$152.85</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">furniture </a>
                                </div>
                                <h3><a class="purple" href="product-details.html">White Plastic Chair</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(3)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$123.50 </span>
                                    <span class="old-price">$152.85</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-45.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-35%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">women</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Ciate London Makeup</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star "></i>
                                    </div>
                                    <span>(1)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$86.75 </span>
                                    <span class="old-price">$94.52</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">beauty</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Ciate London Makeup</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star "></i>
                                    </div>
                                    <span>(1)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$86.75 </span>
                                    <span class="old-price">$94.52</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-42.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">fashion</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Herchoe Backpack</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$26.50 </span>
                                    <span class="old-price">$45.85</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="shop.html">fashion</a>
                                </div>
                                <h3><a class="purple" href="product-details.html">Herchoe Backpack</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">$26.50 </span>
                                    <span class="old-price">$45.85</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-categories-area pb-115">
            <div class="container">
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-3">
                        <h2>Popular Categories</h2>
                    </div>
                    <div class="btn-style-7">
                        <a href="shop.html">All Product</a>
                    </div>
                </div>
                <div class="product-categories-slider-1 nav-style-3">
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="shop.html">
                                    <img src="assets/images/product/product-50.png" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="shop.html">Fashion</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="shop.html">
                                    <img src="assets/images/product/product-51.png" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="shop.html">Electronic</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="shop.html">
                                    <img src="assets/images/product/product-52.png" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="shop.html">computer</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="shop.html">
                                    <img src="assets/images/product/product-53.png" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="shop.html">beauty</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="shop.html">
                                    <img src="assets/images/product/product-54.png" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="shop.html">sport</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="shop.html">
                                    <img src="assets/images/product/product-55.png" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="shop.html">baby</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="shop.html">
                                    <img src="assets/images/product/product-52.png" alt="">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="shop.html">computer</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-wrap mb-30">
                            <div class="banner-img banner-img-zoom">
                                <a href="product-details.html"><img src="assets/images/banner/banner-10.jpg" alt=""></a>
                            </div>
                            <div class="banner-content-11 banner-content-11-modify">
                                <h2><span>Zara</span> Pattern Boxed <br>Underwear</h2>
                                <p>Stretch, & Fress cool</p>
                                <div class="btn-style-4">
                                    <a class="hover-red" href="product-details.html">Shop now <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-wrap mb-30">
                            <div class="banner-img banner-img-zoom">
                                <a href="product-details.html"><img src="assets/images/banner/banner-11.jpg" alt=""></a>
                            </div>
                            <div class="banner-content-11 banner-content-11-modify">
                                <h2><span>Basic</span> Color<br>Caps</h2>
                                <p>Less is more!</p>
                                <div class="btn-style-4">
                                    <a class="hover-red" href="product-details.html">Shop now <i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-85">
            <div class="container">
                <div class="section-title-5 section-title-5-bg-1 mb-10">
                    <i class="red icon-screen-desktop"></i>
                    <h5 class="red">Consumer electric</h5>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="tab-style-7 tab-hm6-categories nav">
                            <a class="active" href="#product-9" data-toggle="tab">Popular </a>
                            <a href="#product-10" data-toggle="tab"> Best Seller </a>
                            <a href="#product-11" data-toggle="tab">Sale </a>
                        </div>
                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-9" class="tab-pane active">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-46.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-47.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-48.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Phone 6s 64GB</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Phone 6s 64GB</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-49.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Phone A38</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Phone A38</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-47.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-10" class="tab-pane">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-49.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Phone A38</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Phone A38</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-48.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Phone 6s 64GB</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Phone 6s 64GB</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-47.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-46.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-48.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-11" class="tab-pane">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-47.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Coolpix Camera</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-46.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-49.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Phone A38</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Phone A38</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-48.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Norda Phone 6s 64GB</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Norda Phone 6s 64GB</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-46.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Mini Protector</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="padding-10-row-col">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="banner-wrap banner-border-1 mt-40 mb-30">
                                        <div class="banner-img banner-img-zoom">
                                            <a href="product-details.html"><img src="assets/images/banner/banner-16.jpg" alt=""></a>
                                        </div>
                                        <div class="banner-content-15">
                                            <div class="banner-content-15-top">
                                                <div class="banner-content-15-brand">
                                                    <span>JATA</span>
                                                </div>
                                                <p>super bass <br>tech 2.0</p>
                                            </div>
                                            <h2>Jata Speaker</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="banner-wrap banner-border-1 banner-mt-none-xs mt-40 mb-30">
                                        <div class="banner-img banner-img-zoom">
                                            <a href="product-details.html"><img src="assets/images/banner/banner-17.jpg" alt=""></a>
                                        </div>
                                        <div class="banner-content-16">
                                            <h2>Microsoft Surface Pro 7 - 12.3”</h2>
                                            <div class="banner-price">
                                                <span class="old-price">$502.50</span>
                                                <span>$425.60</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-list-style-wrap">
                            <div class="product-list-style">
                                <a class="active" href="shop.html">Televisions </a>
                                <a href="shop.html"> Air Conditions </a>
                                <a href="shop.html">Washing Machine </a>
                                <a href="shop.html">Laptop </a>
                                <a href="shop.html">Computer </a>
                                <a href="shop.html">Microwaves </a>
                                <a href="shop.html">Equipments </a>
                                <a href="shop.html">Accessories </a>
                            </div>
                            <div class="btn-style-8">
                                <a href="shop.html">View All </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-85">
            <div class="container">
                <div class="section-title-5 section-title-5-bg-2 mb-10">
                    <i class="purple icon-screen-desktop"></i>
                    <h5 class="purple">apparel & clothing</h5>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="tab-style-7 tab-hm6-categories nav">
                            <a class="active" href="#product-12" data-toggle="tab">Popular </a>
                            <a href="#product-13" data-toggle="tab"> Best Seller </a>
                            <a href="#product-14" data-toggle="tab">Sale </a>
                        </div>
                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-12" class="tab-pane active">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-81.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-82.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-83.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$70.50 </span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$70.50 </span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-84.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Grey Watches</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Grey Watches</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-82.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-13" class="tab-pane">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-84.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Grey Watches</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Grey Watches</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-83.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-82.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$80.50 </span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$80.50 </span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-81.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-83.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-14" class="tab-pane">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-82.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Das Sport Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-81.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-84.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Grey Watches</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$70.50 </span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Grey Watches</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$70.50 </span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-83.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">White Duffles</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-81.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Brown T-shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="padding-10-row-col">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="banner-wrap banner-border-1 mt-40 mb-30">
                                        <div class="banner-img banner-img-zoom">
                                            <a href="product-details.html"><img src="assets/images/banner/banner-23.jpg" alt=""></a>
                                        </div>
                                        <div class="banner-content-19">
                                            <h2>set 3 soften <br>shorts</h2>
                                            <span>discount</span>
                                            <h4>25% OFF</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="banner-wrap banner-border-1 banner-mt-none-xs mt-40 mb-30">
                                        <div class="banner-img banner-img-zoom">
                                            <a href="product-details.html"><img src="assets/images/banner/banner-24.jpg" alt=""></a>
                                        </div>
                                        <div class="banner-content-21">
                                            <span>mega sale</span>
                                            <h2><span>50% OFF</span> Basic <br> Tee Flavor</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-list-style-wrap">
                            <div class="product-list-style">
                                <a class="active" href="shop.html">Men </a>
                                <a href="shop.html">Women </a>
                                <a href="shop.html">Girls </a>
                                <a href="shop.html">Boys </a>
                                <a href="shop.html">Kids </a>
                                <a href="shop.html">Shoes </a>
                                <a href="shop.html">Bags </a>
                                <a href="shop.html">Accessories </a>
                            </div>
                            <div class="btn-style-8">
                                <a href="shop.html">View All </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-85">
            <div class="container">
                <div class="section-title-5 section-title-5-bg-3 mb-10">
                    <i class="green icon-screen-desktop"></i>
                    <h5 class="green">home & furniture</h5>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="tab-style-7 tab-hm6-categories nav">
                            <a class="active" href="#product-15" data-toggle="tab">Popular </a>
                            <a href="#product-16" data-toggle="tab"> Best Seller </a>
                            <a href="#product-17" data-toggle="tab">Sale </a>
                        </div>
                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-15" class="tab-pane active">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-85.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">White Rice Cooker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">White Rice Cooker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-86.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-87.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Pack 10 Utensils</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Pack 10 Utensils</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-88.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Super Plastic Chair</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Super Plastic Chair</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-86.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-16" class="tab-pane">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-88.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Super Plastic Chair</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Super Plastic Chair</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-87.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Pack 10 Utensils</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Pack 10 Utensils</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-86.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-85.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">White Rice Cooker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">White Rice Cooker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-86.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-17" class="tab-pane">
                                <div class="product-slider-active-5">
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-86.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-85.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">White Rice Cooker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">White Rice Cooker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$38.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-88.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Super Plastic Chair</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Super Plastic Chair</a></h3>
                                                <div class="product-price-2">
                                                    <span>$938.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-87.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Pack 10 Utensils</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Pack 10 Utensils</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$1,238.50 </span>
                                                    <span class="old-price">$1,542.85</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-86.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">Set 24 Knifes</a></h3>
                                                <div class="product-price-2">
                                                    <span>$485.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="padding-10-row-col">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="banner-wrap banner-border-1 mt-40 mb-30">
                                        <div class="banner-img banner-img-zoom">
                                            <a href="product-details.html"><img src="assets/images/banner/banner-25.jpg" alt=""></a>
                                        </div>
                                        <div class="banner-content-19">
                                            <h2 class="capitalize">Magic Bullet <br>NutriBullet Blender</h2>
                                            <span>discount</span>
                                            <h4>25% OFF</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="banner-wrap banner-border-1 banner-mt-none-xs mt-40 mb-30">
                                        <div class="banner-img banner-img-zoom">
                                            <a href="product-details.html"><img src="assets/images/banner/banner-26.jpg" alt=""></a>
                                        </div>
                                        <div class="banner-content-22">
                                            <span>IKEA</span>
                                            <h2>pendant <br>lighting</h2>
                                            <p>lorem ispum dolor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-list-style-wrap">
                            <div class="product-list-style">
                                <a class="active" href="shop.html">Home Decor </a>
                                <a href="shop.html" data-toggle="tab"> Furniture </a>
                                <a href="shop.html" data-toggle="tab">Kitchen & Dinning </a>
                                <a href="shop.html" data-toggle="tab">Bedding & Bath </a>
                                <a href="shop.html" data-toggle="tab">Appliances </a>
                                <a href="shop.html" data-toggle="tab">Patio & Gardens </a>
                                <a href="shop.html" data-toggle="tab">Markdowns </a>
                                <a href="shop.html" data-toggle="tab">Equipments </a>
                            </div>
                            <div class="btn-style-8">
                                <a href="shop.html">View All </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us-area pb-115">
            <div class="container">
                <div class="about-us-content-2">
                    <div class="about-us-content-2-title">
                        <h4>NORDA The One-stop Shopping Destination</h4>
                    </div>
                    <p>E-commerce is revolutionizing the way we all shop in Bangladesh. Why do you want to hop from one store to another in search of the latest phone when you can find it on the Internet in a single click? Not only mobiles. Flipkart houses everything you can possibly imagine, from trending electronics like laptops, tablets, smartphones, and mobile accessories to in-vogue fashion staples like shoes, clothing and lifestyle accessories; from modern furniture like sofa sets and wardrobes to appliances that make your life easy like washing machines, TVs, ACs, mixer grinder juicers and other time-saving kitchen and small appliances; from home furnishings like cushion covers, mattresses and bedsheets to toys and musical instruments, we got them all covered. You name it, and you can stay assured about finding them all here. For those of you with erratic working hours, Flipkart is your best bet. Shop in your PJs, at night or in the wee hours of the morning. This e-commerce never shuts down.</p>
                    <p>What's more, with our year-round shopping festivals and events, our prices are irresistible. We're sure you'll find yourself picking up more than what you had in mind. If you are wondering why you should shop from Flipkart when there are multiple options available to you, well, the below will answer your question.</p>
                </div>
            </div>
        </div>
        <div class="subscribe-area bg-gray-4 pt-95 pb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="section-title-3">
                            <h2>Our Newsletter</h2>
                            <p>Get updates by subscribe our weekly newsletter</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div id="mc_embed_signup" class="subscribe-form-2">
                            <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style-2" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                <div id="mc_embed_signup_scroll" class="mc-form-2">
                                    <input class="email" type="email" required="" placeholder="Enter your email address" name="EMAIL" value="">
                                    <div class="mc-news-2" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear-2 clear-2-purple">
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
