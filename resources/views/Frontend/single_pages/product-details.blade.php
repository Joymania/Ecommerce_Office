@extends('Frontend.layouts.master')
@section('content')
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
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">product details </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-details-area pt-120 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div class="pro-dec-big-img-slider">
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{""}}/assets/images/product-details/b-large-1.jpg">
                                        <img src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                    </a>
                                </div>
                                <a class="easyzoom-pop-up img-popup" href="{{""}}/assets/images/product-details/b-large-1.jpg"><i class="icon-size-fullscreen"></i></a>
                            </div>
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{""}}/assets/images/product-details/b-large-2.jpg">
                                        <img src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                    </a>
                                </div>
                                <a class="easyzoom-pop-up img-popup" href="{{""}}/assets/images/product-details/b-large-2.jpg"><i class="icon-size-fullscreen"></i></a>
                            </div>
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{""}}/assets/images/product-details/b-large-3.jpg">
                                        <img src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                    </a>
                                </div>
                                <a class="easyzoom-pop-up img-popup" href="{{""}}/assets/images/product-details/b-large-3.jpg"><i class="icon-size-fullscreen"></i></a>
                            </div>
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{""}}/assets/images/product-details/b-large-4.jpg">
                                        <img src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                    </a>
                                </div>
                                <a class="easyzoom-pop-up img-popup" href="{{""}}/assets/images/product-details/b-large-4.jpg"><i class="icon-size-fullscreen"></i></a>
                            </div>
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{""}}/assets/images/product-details/b-large-2.jpg">
                                        <img src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                    </a>
                                </div>
                                <a class="easyzoom-pop-up img-popup" href="{{""}}/assets/images/product-details/b-large-2.jpg"><i class="icon-size-fullscreen"></i></a>
                            </div>
                        </div>
                        <div class="product-dec-slider-small product-dec-small-style1">
                            <div class="product-dec-small active">
                                <img src="{{""}}/assets/images/product-details/small-1.jpg" alt="">
                            </div>
                            <div class="product-dec-small">
                                <img src="{{""}}/assets/images/product-details/small-2.jpg" alt="">
                            </div>
                            <div class="product-dec-small">
                                <img src="{{""}}/assets/images/product-details/small-3.jpg" alt="">
                            </div>
                            <div class="product-dec-small">
                                <img src="{{""}}/assets/images/product-details/small-4.jpg" alt="">
                            </div>
                            <div class="product-dec-small">
                                <img src="{{""}}/assets/images/product-details/small-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-content pro-details-content-mrg">
                        <h2>{{$product->name}}</h2>
                        <div class="product-ratting-review-wrap">
                            <div class="product-ratting-digit-wrap">
                                <div class="product-ratting">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <div class="product-digit">
                                    <span>5.0</span>
                                </div>
                            </div>
                            <div class="product-review-order">
                                <span>{{count($product->reviews)}} Reviews</span>
                                <span>242 orders</span>
                            </div>
                        </div>
                        <p>{{$product->short_descc}}</p>
                        <div class="pro-details-price">
                            <span class="new-price">{{$product->price}} Tk.</span>
                            <span class="old-price">$95.72</span>
                        </div>
                        <div class="pro-details-color-wrap">
                            <span>Color:</span>
                            <div class="pro-details-color-content">
                                <ul>
                                    @foreach($product->colors as $color)
                                    <li><a class="{{strtolower($color->name)}}" href="#">{{$color->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="pro-details-size">
                            <span>Size:</span>
                            <div class="pro-details-size-content">
                                <ul>
                                    @foreach($product->sizes as $size)
                                    <li><a href="#">{{$size->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="pro-details-quality">
                            <span>Quantity:</span>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                            </div>
                        </div>
                        <div class="product-details-meta">
                            <ul>
                                <li><span>Categories:</span>
                                    <a href="#">{{$product->category->name}},</a>
                                </li>
                                <li><span>Tag: </span>
                                    <a href="#">{{$product->tag->name}},</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-action-wrap">
                            <div class="pro-details-add-to-cart">
                                <a title="Add to Cart" href="#">Add To Cart </a>
                            </div>
                            <div class="pro-details-action">
                                <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                <div class="product-dec-social">
                                    <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                                    <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                    <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                    <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="description-review-wrapper pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dec-review-topbar nav mb-45">
                        <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                        <a data-toggle="tab" href="#des-details2">Specification</a>
                        <a data-toggle="tab" href="#des-details3">Meterials </a>
                        <a data-toggle="tab" href="#des-details4">Reviews and Ratting </a>
                    </div>
                    <div class="tab-content dec-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="description-wrap">
                                <p>{{$product->short_desc}}</p>
                                <p>{{$product->long_desc}}</p>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="specification-wrap table-responsive">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="title width1">Name</td>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Categories</td>
                                        <td>{{$product->category->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Size</td>
                                        <td>
                                            @foreach($product->sizes as $size)
                                                {{$size->name}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Brand </td>
                                        <td>Individual Collections</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Color</td>
                                        <td>Black, White</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane">
                            <div class="specification-wrap table-responsive">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="title width1">Top</td>
                                        <td>Cotton Digital Print Chain Stitch Embroidery Work</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Bottom</td>
                                        <td>Cotton Cambric</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Dupatta</td>
                                        <td>Digital Printed Cotton Malmal With Chain Stitch</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="des-details4" class="tab-pane">
                            <div class="review-wrapper">
                                <h2>1 review for Sleeve Button Cowl Neck</h2>
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="{{""}}/assets/images/product-details/client-1.png" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-name">
                                                <h5><span>John Snow</span> - March 14, 2019</h5>
                                            </div>
                                            <div class="review-rating">
                                                <i class="yellow icon_star"></i>
                                                <i class="yellow icon_star"></i>
                                                <i class="yellow icon_star"></i>
                                                <i class="yellow icon_star"></i>
                                                <i class="yellow icon_star"></i>
                                            </div>
                                        </div>
                                        <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>
                                    </div>
                                </div>
                            </div>
                            <div class="ratting-form-wrapper">
                                <span>Add a Review</span>
                                <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <label>Name <span>*</span></label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <label>Email <span>*</span></label>
                                                    <input type="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="star-box-wrap">
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="icon_star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                    </div>
                                                    <div class="single-ratting-star">
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                        <a href="#"><i class="icon_star"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style mb-20">
                                                    <label>Your review <span>*</span></label>
                                                    <textarea name="Your Review"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <input type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="related-product pb-115">
        <div class="container">
            <div class="section-title mb-45 text-center">
                <h2>Related Product</h2>
            </div>
            <div class="related-product-active">
                <div class="product-plr-1">
                    <div class="single-product-wrap">
                        <div class="product-img product-img-zoom mb-15">
                            <a href="product-details.html">
                                <img src="{{""}}/assets/images/product/product-13.jpg" alt="">
                            </a>
                            <div class="product-action-2 tooltip-style-2">
                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                <button title="Compare"><i class="icon-refresh"></i></button>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                            <div class="product-price-2">
                                <span>$20.50</span>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 product-content-position text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                            <div class="product-price-2">
                                <span>$20.50</span>
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
                                <img src="{{""}}/assets/images/product/product-14.jpg" alt="">
                            </a>
                            <span class="pro-badge left bg-red">-20%</span>
                            <div class="product-action-2 tooltip-style-2">
                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                <button title="Compare"><i class="icon-refresh"></i></button>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Make Thing Happen T-Shirt</a></h3>
                            <div class="product-price-2">
                                <span class="new-price">$35.45</span>
                                <span class="old-price">$45.80</span>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 product-content-position text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Make Thing Happen T-Shirt</a></h3>
                            <div class="product-price-2">
                                <span class="new-price">$35.45</span>
                                <span class="old-price">$45.80</span>
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
                                <img src="{{""}}/assets/images/product/product-15.jpg" alt="">
                            </a>
                            <div class="product-action-2 tooltip-style-2">
                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                <button title="Compare"><i class="icon-refresh"></i></button>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Basic White Simple Sneaker</a></h3>
                            <div class="product-price-2">
                                <span>$35.45</span>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 product-content-position text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Basic White Simple Sneaker</a></h3>
                            <div class="product-price-2">
                                <span>$35.45</span>
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
                                <img src="{{""}}/assets/images/product/product-18.jpg" alt="">
                            </a>
                            <div class="product-action-2 tooltip-style-2">
                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                <button title="Compare"><i class="icon-refresh"></i></button>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Tie-up Sute Sandals</a></h3>
                            <div class="product-price-2">
                                <span>$55.50</span>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 product-content-position text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Tie-up Sute Sandals</a></h3>
                            <div class="product-price-2">
                                <span>$55.50</span>
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
                                <img src="{{""}}/assets/images/product/product-19.jpg" alt="">
                            </a>
                            <div class="product-action-2 tooltip-style-2">
                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                <button title="Compare"><i class="icon-refresh"></i></button>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Faded Grey T-Shirt</a></h3>
                            <div class="product-price-2">
                                <span>$65.50</span>
                            </div>
                        </div>
                        <div class="product-content-wrap-2 product-content-position text-center">
                            <div class="product-rating-wrap">
                                <div class="product-rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star gray"></i>
                                </div>
                                <span>(2)</span>
                            </div>
                            <h3><a href="product-details.html">Faded Grey T-Shirt</a></h3>
                            <div class="product-price-2">
                                <span>$65.50</span>
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
