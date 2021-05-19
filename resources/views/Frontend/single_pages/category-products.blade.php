@extends('Frontend.layouts.master')

@section('content')

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
                                                <div class="single-product-wrap mb-35">
                                                    <div class="product-img product-img-zoom mb-15">
                                                        <a href="{{route("product.details",$product->id)}}">
                                                            <img src="{{""}}/upload/products_images/{{$product->image}}" style="width: 266px; height: 320px;" alt="">
                                                        </a>
                                                        <div class="product-action-2 tooltip-style-2">
                                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 text-center">
                                                        <h3><a href="{{route("product.details",$product->id)}}" class="productName">{{$product->name}}</a></h3>
                                                        <div class="product-price-2">
                                                            <span class="price">{{$product->price}}</span><span style="margin-left: -3px">Tk.</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap-2 product-content-position text-center">
                                                        <h3><a href="{{route("product.details",$product->id)}}">{{$product->name}}</a></h3>
                                                        <div class="product-price-2">
                                                            <span class="product-price">{{$product->price}} Tk.</span>
                                                        </div>
                                                        <div class="pro-add-to-cart">
                                                            <button title="Add to Cart">Add To Cart</button>
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
                                {{--<ul>
                                    <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                                </ul>--}}
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
                                <form class="sidebar-search-form" action="#">
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
                            <h4 class="sidebar-widget-title">Price Filter </h4>
                            <div class="price-filter">
                                <span>Range: 500.00Tk - 1.300.00 </span>
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                    <button id="filterBtn" type="button">Filter</button>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget shop-sidebar-border pt-40">
                            <h4 class="sidebar-widget-title">Popular Tags</h4>
                            <div class="tag-wrap sidebar-widget-tag">
                                <a href="#">Clothing</a>
                                <a href="#">Accessories</a>
                                <a href="#">For Men</a>
                                <a href="#">Women</a>
                                <a href="#">Fashion</a>
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

@endsection
