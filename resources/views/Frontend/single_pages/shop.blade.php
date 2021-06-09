@extends('Frontend.layouts.master')

@section('content')
    {{-- <div>
         @if(!empty($_GET))
         <input type="text" id="search" value="{{$_GET['search']}}" hidden>
        --}}{{-- <input type="text" id="category" value="{{$_GET['category']}}" hidden>--}}{{--
         @endif
     </div>--}}
    <input type="text" value="{{url('')}}" id="baseUrl"hidden>
    <div class="shop-area pt-120 pb-120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper">
                        <div class="shop-topbar-left">
                            <div class="view-mode nav">
                                <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>
                            </div>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-show shorting-style">
                                <label>Sort by :</label>
                                <select id="sortBy">
                                    <option value="">Default</option>
                                    <option value="name"> Name</option>
                                    <option value="price"> price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row" id="shopArea">
                                    @if(count((array)$products) > 0)
                                        @foreach($products as $product)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">
                                                <div class="single-product-wrap mb-35 shadow mb-4 mt-4 rounded">
                                                    <div class="product-img product-img-zoom mb-15 text-center">
                                                        <a href="{{route('product.details',$product->id)}}">
                                                            <img src="{{"/upload/products_images/$product->image"}}" style="height: 324px; width: 270px" alt="">
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
                                                    <div class="product-content-wrap-2 text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
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
                                                        <h3><a href="{{route('product.details',$product->id)}}" class="productName">{{$product->name}}</a></h3>
                                                        <div class="product-price-2 mb-4">
                                                            @if(empty($product->promo_price))
                                                                <span class="new-price product-price">{{$product->price}}</span>Tk
                                                            @else
                                                                <span class="new-price product-price">{{$product->promo_price}}</span>Tk
                                                                <span class="old-price">{{$product->price}}</span>Tk
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 product-content-position text-center">
                                                        <div class="product-rating-wrap">
                                                            <div class="product-rating">
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
                                                        <h3><a href="{{route('product.details',$product->id)}}">{{$product->name}}</a></h3>
                                                        <div class="product-price-2">
                                                            @if(empty($product->promo_price))
                                                                <span class="new-price">{{$product->price}} Tk</span>
                                                            @else
                                                                <span class="new-price">{{$product->promo_price}} Tk</span>
                                                                <span class="old-price">{{$product->price}} Tk</span>
                                                            @endif
                                                        </div>
                                                        <div class="pro-add-to-cart mb-4">
                                                            <a href="{{route('product.details',['id' => $product->id])}}">
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
                
                <div class="col-lg-3">
                    <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
                        <div class="sidebar-widget mb-40">
                            <h4 class="sidebar-widget-title">Search </h4>
                            <div class="sidebar-search">
                                <form id="search2" class="sidebar-search-form" action="#">
                                    <input type="text" id="searchInput" placeholder="Search here...">
                                    <button id="searchBtn">
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
                            <h4 class="sidebar-widget-title">Categories </h4>
                            <div class="shop-catigory">
                                <ul>
                                    <li><a href="{{ route('products.shop') }}" class=""> All </a></li>
                                    @foreach($categories as $row)
                                        <li><a href="" class="categoryName">{{$row->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title mb-2">Price Filter </h4>
                            <div class="row">
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">0</span>-<span class="second">100</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">101</span>-<span class="second">500</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">501</span>-<span class="second">1000</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">1001</span>-<span class="second">2000</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">2001</span>-<span class="second">2500</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span> <span class="first">2501</span>-<span class="second">5000</span>
                                </div>
                                <div class="col-4 m-1 p-0 text-center priceFilter">
                                    <span>&#2547</span><span class="first">5001</span> & <span class="second"></span>over
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/searchFilter.js')}}"></script>
@endsection
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('css/products.css')}}">
@endsection
