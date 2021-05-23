@extends('admin.layout.master')
@section('title', 'Edit Product Size')
@section('pageTitle') <a href="#">Edit Product Size</a> @endsection
@section('parentPageTitle') <a href="{{route('products.sizes')}}">Product Sizes</a> @endsection


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Edit Product Size</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="body">
                                    <form action="{{route('products.size.update',['size'=>$size->id])}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="sizeName">Size Name</label>
                                                <input type="text" id="sizeName" name="name" class="form-control" value="{{old('name',$size->name)}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="size">Product Size</label>
                                                <input type="text" id="size" name="size" class="form-control" value="{{old('size',$size->size)}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="sizeDesc">Size Description</label>
                                                <input type="text" id="sizeDesc" name="desc" class="form-control" value="{{old('desc',$size->desc)}}">
                                            </div>
                                        </div>
                                        @foreach($errors->all() as $error)
                                            <p class="ml-1" style="color: red">{{$error}}</p>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary mt-3">Update Size</button>
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
