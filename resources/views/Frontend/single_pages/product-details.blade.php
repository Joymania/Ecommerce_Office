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
                <div class="col-lg-5 col-md-5">
                    <div class="product-details-tab">
                        <div class="pro-dec-big-img-slider text-center">
                           {{-- <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="{{""}}/assets/images/product-details/b-large-1.jpg">
                                        <img src="{{"/upload/products_images/$product->image"}}" alt="">
                                    </a>
                                </div>
                                <a class="easyzoom-pop-up img-popup" href="{{""}}/assets/images/product-details/b-large-1.jpg"><i class="icon-size-fullscreen"></i></a>
                            </div>--}}
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay float-right">
                                    <a href="{{"/upload/products_images/$product->image"}}">
                                        <img src="{{"/upload/products_images/$product->image"}}" style="width: 400px; height: 500px;" alt="">
                                    </a>
                                </div>
                                <a class="easyzoom-pop-up img-popup" href="{{"/upload/products_images/$product->image"}}"><i class="icon-size-fullscreen"></i></a>
                            </div>
                            @if($product->sub_images)
                                @foreach($product->sub_images as $image)
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay float-right">
                                        <a href="{{"/upload/products_images/sub_images/$image->image"}}">
                                            <img src="{{"/upload/products_images/sub_images/$image->image"}}" style="width: 400px; height: 500px;" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="{{"/upload/products_images/sub_images/$image->image"}}"><i class="icon-size-fullscreen"></i></a>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="product-dec-slider-small product-dec-small-style1">
                            <div class="product-dec-small active">
                                <img src="{{"/upload/products_images/$product->image"}}" alt="">
                            </div>
                            @if($product->sub_images)
                            @foreach($product->sub_images as $image)
                            <div class="product-dec-small active">
                                <img src="{{"/upload/products_images/sub_images/$image->image"}}" alt="">
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="{{ route('insert.cart') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="product-details-content pro-details-content-mrg">
                        <h2>{{$product->name}}</h2>
                        <div class="product-ratting-review-wrap">
                            <div class="product-ratting-digit-wrap">
                                <div class="product-ratting">
                                    @for($i = 0; $i < $rating; $i++)
                                    <i class="icon_star"></i>
                                    @endfor
                                </div>
                                <div class="product-digit">
                                    <span>{{$rating}}</span>
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
                        @if(count($product->colors) > 0)
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
                        @endif

                        @if(count($product->sizes) > 0)
                        <div class="pro-details-size">
                            <span>Size:</span>
                            <div class="pro-details-size-content">
                                <ul>
                                    @foreach($product->sizes as $size)
                                    <li><a class="productSizeContent" href="#">{{$size->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="pro-details-quality">
                            <span>Quantity:</span>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qty" value="1">
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
                                {{-- <a href="{{ route('insert.cart') }}">Add To Cart </a> --}}
                                <input type="submit" value="Add To Cart">
                            </div>
                            <div class="pro-details-action">
                                <a title="Add to Wishlist" href="{{ route('wishlist.add',$product->id) }}"><i class="icon-heart"></i></a>
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
                    </form>

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
                                <table class="text-center">
                                    <tbody>
                                    <tr>
                                        <td class="title width1">Name</td>
                                        <td>{{$product->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="title width1">Categories</td>
                                        <td>{{($product->category->name) ? $product->category->name: "----"}}</td>
                                    </tr>
                                    @if(count($product->sizes) > 0)
                                    <tr>
                                        <td class="title width1">Size</td>
                                            @foreach($product->sizes as $size)
                                                <td>{{$size->name}}</td>
                                            @endforeach
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="title width1">Brand </td>
                                        <td>{{($product->brand) ? $product->brand->name: "----"}}</td>
                                    </tr>
                                    @if(count($product->colors) > 0)
                                    <tr>
                                        <td class="title width1">Color</td>
                                            @foreach($product->colors as $color)
                                            <td>{{$color->name}} </td>
                                            @endforeach
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if($reviews)
                        <div id="des-details4" class="tab-pane">
                            <div class="review-wrapper">
                                <h2>{{$ratingCount}} review for {{$product->name}}</h2>
                                @foreach($reviews as $review)
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="{{""}}/assets/images/product-details/client-1.png" alt="">
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-name">
                                                <h5><span>{{$review->name}}</span> - {{$review->created_at}}</h5>
                                            </div>
                                            <div class="review-rating">
                                                @for($i = 0; $i < $review->rating; $i++)
                                                <i class="yellow icon_star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p>{{$review->review}}</p>
                                    </div>
                                </div>
                                @endforeach
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
                        @else
                            <div id="des-details4" class="tab-pane">
                                <div class="review-wrapper">
                                    <h2>No reviews</h2>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/product-details.js')}}"></script>
@endsection
