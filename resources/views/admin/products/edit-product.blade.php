@extends('admin.layout.master')
@section('title', 'Edit Product')
@section('parentPageTitle', 'Products')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Edit Product</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="body">
                                    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="productName">Product Name</label>
                                                <input type="text" id="productName" name="name" class="form-control" placeholder="Product name"
                                                value="{{old('name',$product->name)}}">
                                                @error('name')
                                                <span style="color: red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="productPrice">Product Price</label>
                                                <input type="number" id="productPrice" name="price" class="form-control" placeholder="Product price"
                                                value="{{old('price',$product->price)}}">
                                                @error('price')
                                                <span style="color: red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="stock">Stock</label>
                                                <input type="number" id="stock" class="form-control" name="stock" placeholder="Stock available"
                                                value="{{old('stock',$product->stock)}}">
                                                @error('stock')
                                                <span style="color: red">Product stock is required</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Brand Name</label>
                                                <select id="single-selection" name="brand_id" class="multiselect multiselect-custom form-control">
                                                    @foreach($brands as $row)
                                                        @if($row->name == $product->brand->name)
                                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                <span style="color: red">Brand Name is required</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="single-selection">Select Category</label>
                                                <select id="single-selection" name="category_id" class="multiselect multiselect-custom form-control">
                                                    @foreach($categories as $row)
                                                        @if($row->name == $product->category->name)
                                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span style="color: red">Category Name is required</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Tag</label>
                                                <select id="single-selection" name="tag_id" class="multiselect multiselect-custom form-control">
                                                    @foreach($tags as $row)
                                                        @if($row->name == $product->tag->name)
                                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('tag_id')
                                                <span style="color: red">Tag is required</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Colors</label>
                                                <select id="single-selection" name="color_id" class="form-control multiselect multiselect-custom">
                                                    @foreach($colors as $row)
                                                        @if($row->name == $product->colors[0]->name)
                                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Sizes</label>
                                                <select id="single-selection" name="size_id" class="form-control multiselect multiselect-custom">
                                                    @foreach($sizes as $row)
                                                        @if($row->name == $product->sizes[0]->name)
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="short_desc">Short Description</label>
                                                <input type="text" id="short_desc" name="short_desc" class="form-control" placeholder="Product Short Description"
                                                value="{{old('short_desc',$product->short_desc)}}">
                                                @error('short_desc')
                                                <span style="color: red">Short Description is required</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-10">
                                                <label for="longDesc">Long Description</label>
                                                <textarea  style="height: 70%" class="form-control" name="long_desc" id="longDesc" cols="30" rows="10"
                                                           placeholder="Product Long Description">{{old('long_desc',$product->long_desc)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="image">Upload Cover Image</label>
                                                <input type="file" id="image" class="form-control" name="image">
                                                <input type="text" name="old_image" value="{{$product->image}}" hidden>
                                            </div>
                                            <div class="col">
                                                <label for="image">Upload Sub Images</label>
                                                <input type="file" id="image" class="form-control" name="images[]">
                                                <input type="file" id="image" class="form-control" name="images[]">
                                                <input type="file" id="image" class="form-control" name="images[]">
                                                <input type="file" id="image" class="form-control" name="images[]">
                                            </div>
                                        </div>

                                        <button class="btn btn-primary mt-3" type="submit">Update Product</button>
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
