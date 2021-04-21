@extends('Frontend.product-list.master')

@section('content')
    <div>
        <input type="text" id="search" value="{{$_GET['search']}}" hidden>
        <input type="text" id="category" value="{{$_GET['category']}}" hidden>
    </div>
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
                                <select>
                                    <option value="">Default</option>
                                    <option value=""> Name</option>
                                    <option value=""> price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row" id="shopArea">
                                    @foreach($products as $product)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 singleProduct">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{route("product.details",$product->id)}}">
                                                    <img src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{route("product.details",$product->id)}}">{{$product->name}}</a></h3>
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
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-10">
                            {{--<ul>
                                <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                            </ul>--}}
                            {{$products->links()}}
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
                        <div class="sidebar-widget mb-40">
                            <h4 class="sidebar-widget-title">Search </h4>
                            <div class="sidebar-search">
                                <form class="sidebar-search-form" action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button>
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
                            <h4 class="sidebar-widget-title">Categories </h4>
                            <div class="shop-catigory">
                                <ul>
                                    <li><a href="shop.html">T-Shirt</a></li>
                                    <li><a href="shop.html">Shoes</a></li>
                                    <li><a href="shop.html">Clothing </a></li>
                                    <li><a href="shop.html">Women </a></li>
                                    <li><a href="shop.html">Baby Boy </a></li>
                                    <li><a href="shop.html">Accessories </a></li>
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
                        <script>
                            $(document).ready(function () {
                                console.log($('#amount').val())
                            });
                        </script>
                        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title">Refine By </h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox"> <a href="#">On Sale <span>4</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">New <span>5</span></a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">In Stock <span>6</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title">Size </h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">XL <span>4</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">L <span>5</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">SM <span>6</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">XXL <span>7</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                            <h4 class="sidebar-widget-title">Color </h4>
                            <div class="sidebar-widget-list">
                                <ul>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">Green <span>7</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">Cream <span>8</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">Blue <span>9</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-widget-list-left">
                                            <input type="checkbox" value=""> <a href="#">Black <span>3</span> </a>
                                            <span class="checkmark"></span>
                                        </div>
                                    </li>
                                </ul>
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
