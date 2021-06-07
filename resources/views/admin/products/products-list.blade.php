@extends('admin.layout.master')
@section('title', 'Products')
@section('pageTitle') <a href="{{route('products.list')}}">Products</a> @endsection
@section('parentPageTitle', '')


@section('content')

    <div class="row clearfix border">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Product List</h2>
                                    @if(session()->has('success_msg'))
                                    @section('page-script')
                                        $(document).ready(function(){
                                        toastr.options.timeOut = "3500";
                                        toastr.options.closeButton = true;
                                        toastr.options.positionClass = 'toast-top-right';
                                        toastr['success']('{{session('success_msg')}}');
                                        });
                                    @endsection
                                    @endif
                                </div>
                                <div class="body">
                                    <a class=" btn btn-primary m-b-15" href="{{route('products.create')}}"><i class="fa fa-plus-circle"></i> Add Product</a>
                                    <div class="table-responsive">
                                        <table  id="myTable" class="table table-hover js-basic-example dataTable table-custom">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Promo Price</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category Name</th>
                                                <th>Brand Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Promo Price</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>
                                                        @if(strlen($product->name) > 30)
                                                            {{substr($product->name,0,25) . ' ...'}}
                                                        @else
                                                            {{$product->name}}
                                                        @endif
                                                    </td>
                                                    <td>{{$product->category->name}}</td>
                                                    <td>{{$product->brand->name}}</td>
                                                    <td>{{$product->price}} Tk</td>
                                                    <td>{{$product->stock}}</td>
                                                    <td>
                                                        <img style="width: 100px; height: 120px" src="{{""}}/upload/products_images/{{$product->image}}" alt="">
                                                    </td>
                                                    <td>{{$product->promo_price}}</td>
                                                    <td>{{$product->start_date}}</td>
                                                    <td>{{$product->end_date}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('product.edit',$product->id)}}" class="editLink" data-toggle="tooltip" title="Edit Product!">
                                                            <button class="btn btn-success btn-sm btn-icon  on-default m-r-5 button-edit editBtn"><i class="icon-pencil" aria-hidden="true"></i></button>
                                                        </a>
                                                        <form action="{{route('product.destroy',$product->id)}}" class="deleteForm" onsubmit="return confirm('Are you sure want to delete this product?')" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm btn-icon on-default button-remove deleteBtn" type="submit" data-toggle="tooltip" title="Delete product!"><i class="icon-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                        </div>
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

