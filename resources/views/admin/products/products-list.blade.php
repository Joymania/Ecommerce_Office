@extends('admin.layout.master')
@section('title', 'Products List')
@section('parentPageTitle', 'Products')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                {{--<div class="header">
                    <h2>Products List</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>--}}
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Color List</h2>
                                </div>
                                <div class="body">
                                    <a class=" btn btn-primary m-b-15" href="{{route('products.create')}}"><i class="fa fa-plus-circle"></i> Add Product</a>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>{{$product->brand->name}}</td>
                                                    <td>{{$product->price}} Tk</td>
                                                    <td>{{$product->stock}}</td>
                                                    <td>
                                                        <img style="width: 120px" height="100px" src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                                    </td>
                                                    <td>
                                                        <a href="" class="editLink" data-toggle="tooltip" title="Edit Product!">
                                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit editBtn"><i class="icon-pencil" aria-hidden="true"></i></button>
                                                        </a>
                                                        <form action="{{route('product.destroy',$product->id)}}" class="deleteForm" onsubmit="return confirm('Are you sure want to delete this product?')">
                                                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove deleteBtn" type="submit" data-toggle="tooltip" title="Delete product!"><i class="icon-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
