@extends('admin.layout.master')
@section('title', 'Products List')
@section('parentPageTitle', 'Products')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
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
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <a href="{{route('products.create')}}">
                                        <button class="btn-primary" type="submit">Add Product <i class="icon-plus"></i></button>
                                    </a>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
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
                                            <tr>
                                                <td>Shirt</td>
                                                <td>Men</td>
                                                <td>Easy</td>
                                                <td>5000</td>
                                                <td>50</td>
                                                <td>
                                                    <img src="{{""}}/uploads/" alt="">
                                                </td>
                                                <td>
                                                    <form action="" class="deleteForm">
                                                        <button class="deleteBtn" type="submit" data-toggle="tooltip" title="Delete product!"><i class="icon-note"></i></button>
                                                    </form>
                                                    <a href="" class="editLink" data-toggle="tooltip" title="Edit Product!">
                                                        <button class="editBtn"><i class="icon-trash"></i></button>
                                                    </a>
                                                </td>
                                            </tr>

                                           {{-- @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->name}} Shirt</td>
                                                <td>{{$product->category->name}} Men</td>
                                                <td>{{$product->brand->name}} Easy</td>
                                                <td>{{$product->price}} 5000</td>
                                                <td>{{$product->stock}}50</td>
                                                <td>
                                                    <img src="{{""}}/uploads/{{$product->avatar}}" alt="">
                                                </td>
                                                <td>
                                                    <a href="">
                                                        <div class="col-md-3 col-sm-4">
                                                            <i class="icon-trash"></i> icon-trash </div>
                                                    </a>
                                                    <button type="submit"></button>
                                                </td>
                                            </tr>
                                            @endforeach--}}
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
