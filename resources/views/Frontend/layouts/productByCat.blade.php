@extends('Frontend.layouts.master')

@section('content')
       <div class="product-area pb-85"></div>
            <div class="container">

                <div class="row flex-row-reverse">
                    <div class="col-lg-12">

                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row" id="shopArea">
                                        @if(count((array)$products) > 0)
                                            @foreach($products as $product)
                                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 singleProduct">
                                                    <div class="single-product-wrap mb-35">
                                                        <div class="product-img product-img-zoom mb-15 text-center">
                                                            <a href="{{route("product.details",$product->id)}}">
                                                                <img src="{{""}}/upload/products_images/{{$product->image}}" style="width: 266px; height: 320px;" alt="">
                                                            </a>
                                                            <div class="product-action-2 tooltip-style-2">
                                                                <a href="{{ route('wishlist.add', $product->id) }}">
                                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-content-wrap-2 text-center">
                                                            <h3><a href="{{route("product.details",$product->id)}}" class="productName">{{$product->name}}</a></h3>
                                                            <div class="product-price-2">
                                                                @if(empty($product->promo_price))
                                                                    <span class="price">{{$product->price}}</span><span style="margin-left: -3px">Tk.</span>
                                                                @else
                                                                    <span class="new-price">{{$product->promo_price}}</span><span style="margin-left: -3px">Tk.</span>
                                                                    <span class="old-price">{{$product->price}}</span><span style="margin-left: -3px">Tk.</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="product-content-wrap-2 product-content-position text-center">
                                                            <h3><a href="{{route("product.details",$product->id)}}">{{$product->name}}</a></h3>
                                                            <div class="product-price-2">
                                                                @if(empty($product->promo_price))
                                                                    <span class="price">{{$product->price}}</span><span style="margin-left: -3px">Tk.</span>
                                                                @else
                                                                    <span class="new-price">{{$product->promo_price}}</span><span style="margin-left: -3px">Tk.</span>
                                                                    <span class="old-price">{{$product->price}}</span><span style="margin-left: -3px">Tk.</span>
                                                                @endif
                                                            </div>
                                                            <div class="pro-add-to-cart">
                                                                <a href="{{route("product.details",$product->id)}}">
                                                                    <button title="Add to Cart">Add To Cart</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-12 text-center">No Result Found.</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(count((array)$products) > 0)
                                <div class="text-center mt-10">
                                    {{$products->links()}}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
