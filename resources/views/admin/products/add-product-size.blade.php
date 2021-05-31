@extends('admin.layout.master')
@section('title', 'Add Product Size')
@section('pageTitle') <a href="{{route('products.size.create')}}">Add Product Size</a> @endsection
@section('parentPageTitle') <a href="{{route('products.sizes')}}">Product Sizes</a> @endsection


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Add Product Size</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="body">
                                    <form action="{{route('product.size.store')}}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="sizeName">Size Name</label>
                                                <input type="text" id="sizeName" name="name" class="form-control" placeholder="Product Size name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="size">Product Size</label>
                                                <input type="text" id="size" name="size" class="form-control" placeholder="Size">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="sizeDesc">Size Description</label>
                                                <input type="text" id="sizeDesc" name="desc" class="form-control" placeholder="Product Size Description">
                                            </div>
                                        </div>
                                        @foreach($errors->all() as $error)
                                        <p class="ml-1" style="color: red">{{$error}}</p>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary mt-3">Add Size</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
