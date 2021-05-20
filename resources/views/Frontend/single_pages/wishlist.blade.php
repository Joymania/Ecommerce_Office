@extends('Frontend.layouts.master')

@section('content')

<div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">Wishlist </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-115 pb-120">
    <div class="container">
        <h3 class="cart-page-title">Your Wishlist items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Action</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $wish)
                                    <tr>
                                    <td class="product-thumbnail">
                                        <a href=""><img src="{{ asset('upload/products_images/'.$wish['product']['image']) }}" alt="" width="98px" height="112px"></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{ $wish['product']['name'] }}</a></td>
                                    <td class="product-price-cart"><span class="amount">{{ $wish['product']['price'] }}</span></td>

                                    <td class="product-wishlist-cart">
                                        <a href="{{ route('product.details', $wish['product_id']) }}">Product Details</a>

                                    </td>
                                    <td>
                                        <div class="cart-delete">
                                            <a href="{{ route('delete.wishlist',$wish->id) }}">×</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

