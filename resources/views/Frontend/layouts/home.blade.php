@extends('Frontend.layouts.master')
 @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@section('content')
    @include('Frontend.layouts.slider')
    @include('Frontend.layouts.service_area')

    <style>
        .center{
            margin: auto;
            text-align: center;
        }
    </style>

    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="#"><i class="icon_close"></i></a>
            <div class="cart-content">
                <h3>Shopping Cart</h3>

                <ul>
                    @php
                        $total=0;
                    @endphp
                    @if(Auth::user())
                    
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
                         $total+=$cart->subtotal;
                     @endphp
                    @endforeach
                 
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
    <!-- Offered/flash deal products -->
    @if($products->isNotEmpty())
    <div class="product-area pb-110">
        <div class="container">
            <!-- flash deal header -->
            <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                <div class="section-title-deal-wrap">
                    <div class="section-title-3">
                        <h2>Offered Products</h2>
                    </div>
                </div>
                <div class="btn-style-7">
                    <a href="{{route('offerProducts')}}">All Offered Products</a>
                </div>
            </div>
            <!-- flash deal header  end-->

            <!-- flash deal products start-->
            <div class="product-slider-active-3 nav-style-3">
                @foreach($products as $product)
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="{{route('product.details',$product->id)}}">
                                    <img class="center" src="{{"/upload/products_images/$product->image"}}" alt="Product Image" width="210px" height="210px">
                                </a>
                                <span class="pro-badge left bg-red">-{{ number_format( (($product->price - $product->promo_price)*100)/$product->price, 2, '.' , ',') }}%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <a href="{{ route('wishlist.add', $product->id) }}">
                                        <button title="Wishlist"><i class="icon-heart"></i></button>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 center">
                                <div class="product-content-categories">
                                    <a class="purple" href="{{ route('productByCategory', $product->category->id) }}">{{$product->category->name}}</a>
                                </div>
                                <h3><a class="purple" href="{{route("product.details",$product->id)}}">{{$product->name}}</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4 center">
                                        @if(ceil($product->avg_rating) == 1)
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 2)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 3)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 4)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 5)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @endif
                                    </div>
                                    @if(count($product->reviews) > 0)
                                        <span>({{count($product->reviews)}})</span>
                                    @endif
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">{{$product->promo_price}} Tk.</span>
                                    <span class="old-price">{{$product->price}} Tk.</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2 center">
                                <div class="product-content-categories">
                                    <a class="purple" href="{{ route('productByCategory', $product->category->id) }}">{{$product->category->name}}</a>
                                </div>
                                <h3><a class="purple" href="{{route('product.details',['id' => $product->id])}}">{{$product->name}}</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4 center">
                                        @if(ceil($product->avg_rating) == 1)
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 2)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 3)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 4)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @elseif(ceil($product->avg_rating) == 5)
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                        @endif
                                    </div>
                                    @if(count($product->reviews) > 0)
                                        <span>({{count($product->reviews)}})</span>
                                    @endif
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">{{$product->promo_price}} Tk.  </span>
                                    <span class="old-price">{{$product->price}} Tk.</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <a href="{{route('product.details',['id' => $product->id])}}">
                                        <button title="Add to Cart">Add To Cart</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- flash deal products end-->


        </div>
    </div>
    @endif
    <!-- Offered/flash deal products end-->


    <!-- Popular categories start -->

    <div class="product-categories-area pb-115">
        <div class="container">
            <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                <div class="section-title-3">
                    <h2>Popular Categories</h2>
                </div>
                <div class="btn-style-7">
                    <a href=" {{ route('products.shop') }} ">All Products</a>
                </div>

            </div>

            <div class="product-categories-slider-1 nav-style-3">
                @if($popular_categories->isNotEmpty())
                    @foreach($popular_categories as $cat)
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="{{ route('productByCategory', $cat->id) }}">
                                    <img src="{{ (!empty($cat->image)) ? url('upload/categories/'.$cat->image):url('upload/defaultCategory.jpg') }}" alt="{{ $cat->name }}" width="161px" height="161px">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="{{ route('productByCategory', $cat->id) }}"> {{$cat->name}} </a></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    <!-- Popular categories end -->


        @foreach($categories as $cat)
        <div class="product-area pb-85">
            <div class="container">
                <div class="section-title-5 section-title-5-bg-1 mb-10">
                    <i class="red icon-screen-desktop"></i>

                    <h5 class="red">{{$cat->name}}</h5>

                </div>
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">

                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-9" class="tab-pane active">
                                <div class="product-slider-active-5">

                                    @foreach($cat->product as $product)
                                        <div class="product-plr-1">
                                            <div class="single-product-wrap">
                                                <div class="product-img product-img-zoom mb-15">
                                                    <a href="{{route('product.details',$product->id)}}">
                                                        <img class="center" src="{{"/upload/products_images/$product->image"}}" style="height: 178px; width: 178px" alt="Product Image">
                                                    </a>
                                                    @if(!empty($product->promo_price))
                                                    <span class="pro-badge left bg-red">-{{ number_format( (($product->price - $product->promo_price)*100)/$product->price, 2, '.' , ',') }}%</span>
                                                    @endif
                                                    <div class="product-action-2 tooltip-style-2">
                                                        <a href="{{ route('wishlist.add', $product->id) }}">
                                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap-3 center">
                                                    <div class="product-content-categories">
                                                        <a class="purple" href="{{ route('productByCategory', $product->category->id) }}">{{$product->category->name}}</a>
                                                    </div>
                                                    <h3><a class="purple" href="{{route("product.details",$product->id)}}">{{$product->name}}</a></h3>
                                                    <div class="product-rating-wrap-2">
                                                        <div class="product-rating-4 center">
                                                            @if(ceil($product->avg_rating) == 1)
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 2)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 3)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 4)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 5)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @endif
                                                        </div>
                                                        @if(count($product->reviews) > 0)
                                                        <span>({{count($product->reviews)}})</span>
                                                        @endif
                                                    </div>
                                                    <div class="product-price-4">
                                                        @if(empty($product->promo_price))
                                                            <span>{{$product->price}} Tk</span>
                                                        @else
                                                            <span class="new-price">{{$product->promo_price}} Tk</span>
                                                            <span class="old-price">{{$product->price}} Tk</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap-3 product-content-position-2 center">
                                                    <div class="product-content-categories">
                                                        <a class="purple" href="{{ route('productByCategory', $product->category->id) }}">{{$product->category->name}}</a>
                                                    </div>
                                                    <h3><a class="purple" href="{{route('product.details',['id' => $product->id])}}">{{$product->name}}</a></h3>
                                                    <div class="product-rating-wrap-2">
                                                        <div class="product-rating-4 center">
                                                            @if(ceil($product->avg_rating) == 1)
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 2)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 3)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 4)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @elseif(ceil($product->avg_rating) == 5)
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                                <i class="icon_star"></i>
                                                            @endif
                                                        </div>
                                                        @if(count($product->reviews) > 0)
                                                            <span>({{count($product->reviews)}})</span>
                                                        @endif
                                                    </div>
                                                    <div class="product-price-4">
                                                        @if(empty($product->promo_price))
                                                            <span>{{$product->price}} Tk</span>
                                                        @else
                                                            <span class="new-price">{{$product->promo_price}} Tk</span>
                                                            <span class="old-price">{{$product->price}} Tk</span>
                                                        @endif
                                                    </div>
                                                    <div class="pro-add-to-cart-2">
                                                        <a href="{{route('product.details',['id' => $product->id])}}">
                                                            <button title="Add to Cart">Add To Cart</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="product-list-style-wrap">
                            <div class="product-list-style">
                                @foreach($cat->sub_category as $subcat)
                                <a class="active" href="{{route('productByCat',$subcat->id)}}">{{$subcat->sub_category_name}} </a>
                                @endforeach
                            </div>
                            <div class="btn-style-8">
                                <!-- show all products related to this category -->
                                <a href="{{ route('productByCategory', $cat->id) }}">View All </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="about-us-area pb-115">
            <div class="container">
                <div class="about-us-content-2">
                    <div class="about-us-content-2-title">
                        <h4>NORDA The One-stop Shopping Destination</h4>
                    </div>
                    <p>E-commerce is revolutionizing the way we all shop in Bangladesh. Why do you want to hop from one store to another in search of the latest phone when you can find it on the Internet in a single click? Not only mobiles. Flipkart houses everything you can possibly imagine, from trending.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.input-2').rating({displayOnly: true, step: 0.1});
    </script>

@endsection
