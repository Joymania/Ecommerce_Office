@extends('Frontend.layouts.master')

@section('content')
    @include('Frontend.layouts.slider')
    @include('Frontend.layouts.service_area')
        
        <div class="product-area pb-110">
            <div class="container">
                <!-- flash deal header -->
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
                        <a href="{{route('search.result')}}">All Product</a>
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
                                    <img style="width: 212px; height: 262px;" src="{{"/upload/products_images/$product->image"}}" alt="Product Image">
                                </a>
                                <!-- reduced price -->
                                <span class="pro-badge left bg-red">-{{ number_format( (($product->price - $product->promo_price)*100)/$product->price, 2, '.' , ',') }}%</span>
                                
                                <!-- add to wishlist -->
                                <div class="product-action-2 tooltip-style-2">
                                    <a href="{{ route('wishlist.add', $product->id) }}"> <button title="Wishlist"><i class="icon-heart"></i></button> </a>
                                </div>
                            </div>

                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="{{ route('productByCategory', $product->category->id) }}">{{$product->category->name}}</a>
                                </div>
                                <h3><a class="purple" href="{{route("product.details",$product->id)}}">{{$product->name}}</a></h3>
                                <div class="product-rating-wrap-2">
                                    @if($product->avg_rating >0)
                                    <div class="product-rating-4">
                                        <input class="input-2" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="md" required data-step="0.1" value="{{ number_format( $product->avg_rating , 1, '.' , ',') }}">                                                                                                    
                                    </div>
                                    <span>{{ number_format( $product->avg_rating , 1, '.' , ',') }}</span>
                                    @endif
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">{{$product->promo_price}} Tk. </span>
                                    <span class="old-price">{{$product->price}} Tk.</span>
                                </div>
                            </div>

                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="{{ route('productByCategory', $product->category->id) }}">{{$product->category->name}}</a>
                                </div>
                                <h3><a class="purple" href="{{route('product.details',['id' => $product->id])}}">{{$product->name}}</a></h3>
                                <div class="product-rating-wrap-2">
                                    <div class="product-rating-4">
                                    
                                    <input class="input-2" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-size="md" required data-step="0.1" value="{{ number_format( $product->avg_rating , 1, '.' , ',') }}">         
                                                                                             
                                    </div>
                                    <span>{{ number_format( $product->avg_rating , 1, '.' , ',') }}</span>
                                </div>
                                <div class="product-price-4">
                                    <span class="new-price">{{$product->promo_price}} Tk. </span>
                                    <span class="old-price">{{$product->price}} Tk.</span>
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- flash deal products end-->
            </div>
        </div>

        <div class="product-categories-area pb-115">
            <div class="container">
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-3">
                        <h2>Popular Categories</h2>
                    </div>
                    <div class="btn-style-7">
                        <a href=" {{ route('search.result') }} ">All Product</a>
                    </div>
                </div>
                <div class="product-categories-slider-1 nav-style-3">
                    @if($popular_categories->isNotEmpty())
                        @foreach($popular_categories as $cat)
                        <div class="product-plr-1">
                            <div class="single-product-wrap">
                                <div class="product-img product-img-border mb-20">
                                    <a href="{{ route('productByCategory', $cat->id) }}">
                                        <img src="{{ (!empty($cat->image)) ? url('upload/categories/'.$cat->image):url('upload/defaultCategory.jpg') }}" alt="{{ $cat->name }}">
                                    </a>
                                </div>
                                <div class="product-content-categories-2 text-center">
                                    <h5><a href="#"> {{$cat->name}} </a></h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>


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

                                    @foreach($cat->product as $prod)

                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{route('product.details',$prod->id)}}">
                                                    <img src="{{""}}/upload/products_images/{{$prod->image}}" height="200px" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{route('product.details',$prod->id)}}">{{$prod->name}}</a></h3>
                                                <div class="product-price-2">
                                                    <span>{{$prod->price}} Tk</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="{{route('product.details',$prod->id)}}">{{$prod->name}}</a></h3>
                                                <div class="product-price-2">
                                                    <span>{{$prod->price}} Tk</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
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
                                <a href="#">View All </a>
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
