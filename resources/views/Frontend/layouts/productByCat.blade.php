@extends('Frontend.layouts.master')

@section('content')
       <div class="product-area pb-85">
            <div class="container">
               
                <div class="row flex-row-reverse">
                    <div class="col-lg-12">
                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-9" class="tab-pane active">
                                <div class="product-slider-active-5">

                                    
                                    @foreach($products as $product)

                                    <div class="product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{route('product.details',$product->id)}}">
                                                    <img src="{{""}}/upload/products_images/{{$product->image}}" height="270px" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                                <div class="product-price-2">
                                                    <span>{{$product->price}} Tk</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="product-details.html">{{$product->name}}</a></h3>
                                                <div class="product-price-2">
                                                    <span>{{$product->price}} Tk</span>
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
                    
                    </div>
                </div>
            </div>
        </div>
@endsection
