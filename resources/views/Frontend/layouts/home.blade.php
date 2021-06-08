@extends('Frontend.layouts.master')

@section('content')
    @include('Frontend.layouts.slider')
    @include('Frontend.layouts.service_area')

    <style>
        .center {
            margin: auto;
            text-align: center;
        }
    </style>

    <!-- Offered/flash deal products -->
    @if ($products->isNotEmpty())
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
                        <a href="{{ route('offerProducts') }}">All Offered Products</a>
                    </div>
                </div>
                <!-- flash deal header  end-->

                <!-- flash deal products start-->
                <div class="product-slider-active-3 nav-style-3">
                    @foreach ($products as $product)
                        <div class="product-plr-1">
                            <div class="single-product-wrap">
                                <div class="product-img product-img-zoom mb-15">
                                    <a href="{{ route('product.details', $product->id) }}">
                                        <img class="center adjust-height"
                                             src="{{ "/upload/products_images/$product->image" }}" alt="Product Image"
                                             style=" width:210px; height:210px;">
                                    </a>
                                    <span
                                        class="pro-badge center left bg-red">-{{ number_format((($product->price - $product->promo_price) * 100) / $product->price, 2, '.', ',') }}%</span>
                                    <div class="product-action-2 tooltip-style-2">
                                        <a href="{{ route('wishlist.add', $product->id) }}">
                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap-3 center">
                                    <div class="product-content-categories">
                                        <a class="purple"
                                           href="{{ route('productByCategory', $product->category->id) }}">{{ $product->category->name }}</a>
                                    </div>
                                    <h3><a class="purple"
                                           href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-rating-wrap-2">
                                        <div class="product-rating-4 center">
                                            @if (ceil($product->avg_rating) == 1)
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

                                            @if (count($product->reviews) > 0)
                                                <span>({{ count($product->reviews) }})</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-price-4">
                                        <span class="new-price">{{ $product->promo_price }} Tk.</span>
                                        <span class="old-price">{{ $product->price }} Tk.</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap-3 product-content-position-2 center">
                                    <div class="product-content-categories">
                                        <a class="purple"
                                           href="{{ route('productByCategory', $product->category->id) }}">{{ $product->category->name }}</a>
                                    </div>
                                    <h3><a class="purple"
                                           href="{{ route('product.details', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-rating-wrap-2">
                                        <div class="product-rating-4 center">
                                            @if (ceil($product->avg_rating) == 1)
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

                                            @if (count($product->reviews) > 0)
                                                <span>({{ count($product->reviews) }})</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="product-price-4">
                                        <span class="new-price">{{ $product->promo_price }} Tk. </span>
                                        <span class="old-price">{{ $product->price }} Tk.</span>
                                    </div>
                                    <div class="pro-add-to-cart-2">
                                        <a href="{{ route('product.details', ['id' => $product->id]) }}">
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
                @if ($popular_categories->isNotEmpty())
                    @foreach ($popular_categories as $cat)
                        <div class="product-plr-1">
                            <div class="single-product-wrap">
                                <div class="product-img product-img-border mb-20">
                                    <a href="{{ route('productByCategory', $cat->id) }}">
                                        <img src="{{ !empty($cat->image) ? url('upload/categories/' . $cat->image) : url('upload/defaultCategory.jpg') }}"
                                             alt="{{ $cat->name }}" width="161px" height="161px">
                                    </a>
                                </div>
                                <div class="product-content-categories-2 text-center">
                                    <h5><a href="{{ route('productByCategory', $cat->id) }}"> {{ $cat->name }} </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

    <!-- Popular categories end -->


    @foreach ($categories as $cat)
        <div class="product-area pb-85">
            <div class="container">
                <div class="section-title-5 section-title-5-bg-1 mb-10">
                    <i class="red icon-screen-desktop"></i>

                    <h5 class="red">{{ $cat->name }}</h5>

                </div>
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">

                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-9" class="tab-pane active">
                                <div class="product-slider-active-5">


                                    @foreach($cat->product as $product)
                                    <input type="hidden" name="pro_id" id="product_id" value="{{$product->id}}">
                                        <div class="product-plr-1">
                                            <div class="single-product-wrap">
                                                <div class="product-img product-img-zoom mb-15">
                                                    <a href="{{ route('product.details', $product->id) }}">
                                                        <img class="center"
                                                             src="{{ "/upload/products_images/$product->image" }}"
                                                             style="height: 178px; width: 178px" alt="Product Image">
                                                    </a>
                                                    @if (!empty($product->promo_price))
                                                        <span
                                                            class="pro-badge left bg-red">-{{ number_format((($product->price - $product->promo_price) * 100) / $product->price, 2, '.', ',') }}%</span>
                                                    @endif

                                                    <div class="product-action-2 tooltip-style-2">
                                                        <a href="{{ route('wishlist.add', $product->id) }}">
                                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                                        </a>
                                                        <button class="q_m_btn" id="quickView_modal_btn"
                                                                data-id={{ $product->id }} title="Quick View"><i
                                                            class="icon-size-fullscreen icons"></i></button>
                                                    </div>

                                                </div>
                                                <div class="product-content-wrap-3 center">
                                                    <div class="product-content-categories">
                                                        <a class="purple"
                                                           href="{{ route('productByCategory', $product->category->id) }}">{{ $product->category->name }}</a>
                                                    </div>
                                                    <h3><a class="purple"
                                                           href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                                    </h3>
                                                    <div class="product-rating-wrap-2">
                                                        <div class="product-rating-4 center">
                                                            @if (ceil($product->avg_rating) == 1)
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

                                                            @if (count($product->reviews) > 0)
                                                                <span>({{ count($product->reviews) }})</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="product-price-4">
                                                        @if (empty($product->promo_price))
                                                            <span>{{ $product->price }} Tk</span>
                                                        @else
                                                            <span class="new-price">{{ $product->promo_price }} Tk</span>
                                                            <span class="old-price">{{ $product->price }} Tk</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap-3 product-content-position-2 center">
                                                    <div class="product-content-categories">
                                                        <a class="purple"
                                                           href="{{ route('productByCategory', $product->category->id) }}">{{ $product->category->name }}</a>
                                                    </div>
                                                    <h3><a class="purple"
                                                           href="{{ route('product.details', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                    </h3>
                                                    <div class="product-rating-wrap-2">
                                                        <div class="product-rating-4 center">
                                                            @if (ceil($product->avg_rating) == 1)
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
                                                            @if (count($product->reviews) > 0)
                                                                <span>({{ count($product->reviews) }})</span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <div class="product-price-4">
                                                        @if (empty($product->promo_price))
                                                            <span>{{ $product->price }} Tk</span>
                                                        @else
                                                            <span class="new-price">{{ $product->promo_price }} Tk</span>
                                                            <span class="old-price">{{ $product->price }} Tk</span>
                                                        @endif
                                                    </div>
                                                    <div class="pro-add-to-cart-2">

                                                        <a href="{{route('product.details',['id' => $product->id])}}">
                                                            <button data-id={{$product->id}} class="addToCart" title="Add to Cart">Add To Cart</button>
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
                                @foreach ($cat->sub_category as $subcat)
                                    <a class="active"
                                       href="{{ route('productByCat', $subcat->id) }}">{{ $subcat->sub_category_name }}
                                    </a>
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
                <p>E-commerce is revolutionizing the way we all shop in Bangladesh. Why do you want to hop from one store to
                    another in search of the latest phone when you can find it on the Internet in a single click? Not only
                    mobiles. Flipkart houses everything you can possibly imagine, from trending.</p>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="quickviewmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="product-details-area ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                                    <div class="tab-content quickview-big-img">
                                        <div id="pro-1" class="tab-pane fade show active float-left">

                                        </div>
                                    </div>
                                    <div class="quickview-wrap mt-15">
                                        <div class="quickview-slide-active nav-style-6">
                                            <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/images/product/quickview-s1.jpg" alt=""></a>
                                            <a data-toggle="tab" href="#pro-2"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                            <a data-toggle="tab" href="#pro-3"><img src="assets/images/product/quickview-s3.jpg" alt=""></a>
                                            <a data-toggle="tab" href="#pro-4"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                                    <form id="addToCartForm" action="" method="post">
                                        <input type="hidden" name="pro_id">
                                        <div class="
                                            product-details-content pro-details-content-mrg">
                                            <h2 id="pro_name"></h2>
                                            <div class="product-ratting-review-wrap">
                                                <div class="product-ratting-digit-wrap">
                                                    <div class="product-ratting" id="pro_rating_star">

                                                    </div>
                                                    <div class="product-digit">
                                                        <span id="pro_rating"></span>
                                                    </div>
                                                </div>
                                                <div class="product-review-order">
                                                    <span id="pro_review_count"></span>
                                                    <span id="pro_order_count"></span>
                                                </div>

                                            </div>
                                            <p></p>
                                            <div class="pro-details-price">
                                                <span class="new-price" id="pro_new_price"> </span>
                                                <span class="old-price" id="pro_old_price"> </span>
                                            </div>

                                            <div id="productColorDiv">
                                            <input type="number" id="colorInput" name="color_id" value="" hidden>
                                            <div class="pro-details-color-wrap">
                                                <span>Colors:</span>
                                                <div class="pro-details-color-content">
                                                    <ul>

                                                    </ul>
                                                    <p id="colorPtag" hidden>Color Desc: <span id="color_desc"></span></p>
                                                </div>
                                            </div>
                                            </div>


                                            <div id="productSizeDiv">
                                            <input type="number" id="sizeInput" name="size_id" value="" hidden>
                                            <div class="pro-details-size">
                                                <span>Sizes:</span>
                                                <div class="pro-details-size-content">
                                                    <ul>


                                                    </ul>
                                                    <p id="sizePtag" hidden>Size Desc: <span id="size_desc"></span></p>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="pro-details-quality">
                                                <span>Quantity:</span>
                                                <div class="cart-plus-minus">
                                                    <input id="qty" class="cart-plus-minus-box" type="text" name="qty" value="1">
                                                </div>
                                            </div>

                                            <div class="pro-details-add-to-cart" style="width: 50%">
                                                <input id="quickViewSubmitBtn" data-id="" type="submit" value="Add To Cart"></a>
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
    <!-- Modal end -->

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script> --}}

    <script>
        $('.input-2').rating({displayOnly: true, step: 0.1});
    </script>




@endsection
@section('scripts')
    <script src="{{asset('js/quickView-product-details.js')}}"></script>
    <script !src="">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script>
        $(document).ready(function(){
            toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
            };

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.addToCart', function(e){
            //e.preventDefault();

            var url="{{url('add-to-cart')}}";
            var id =$(this).attr('data-id');

            $.ajax({
                method:'POST',
                url:url,
                data:{id:id},
               success: function(data){
                    //console.log(data.minicart);
                   console.log(data.cart);
                    toastr.success(data.success);
                    //console.log(data.flag);
                    console.log(data.proSize);

                        $(document).ready(function () {
                            let count = $('.header-cart a[class="cart-active"]').find('.pro-count.purple')[0];
                            let cartCount = $(count).text();
                            $(count).text(data.cartCount);
                        });
                        console.log(data.cartCount);

                    $("#minicart").html(data.minicart);
               },
               error: function(error){
                   console.log(error);
               }
            });
            e.preventDefault();

            });

        });


    </script>

@endsection
