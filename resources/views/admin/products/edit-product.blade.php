@extends('admin.layout.master')
@section('title', 'Edit Product')
@section('pageTitle') <a href="#">Edit Product</a> @endsection
@section('parentPageTitle') <a href="{{route('products.list')}}">Products</a> @endsection


@section('content')

    <div onload="showPromo()" class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Edit Product</h2>
                    {{--dd($product->sub_category_id)--}}
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
                                                <label for="single-selection">Select Category</label>
                                                <select id="single-selection" name="category_id" class="multiselect multiselect-custom form-control">
                                                    <option value="">Select Category</option>
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
                                                <label for="sub_category_id">sub_category</label>
                                                <select id="sub_category_id" name="sub_category_id" class="form-control multiselect multiselect-custom">
                                                    <option value="">Select Sub Category</option>
                                                    @foreach($sub_category as $sub)
                                                        <option {{ $sub->id == $product->sub_category_id ? 'selected':null }} value="{{$sub->id}}">
                                                            {{$sub->sub_category_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="single-selection">Select Brand Name</label>
                                                <select id="single-selection" name="brand_id" class="multiselect multiselect-custom form-control">
                                                    <option value="">Select Brand Name</option>
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
                                            <div class="col">
                                                <label for="single-selection">Select Tag</label>
                                                <select id="single-selection" name="tag_id" class="multiselect multiselect-custom form-control">
                                                    <option value="">Select Tag</option>
                                                    @foreach($tags as $row)
                                                        @if( !empty($product->tag->name) && $row->name == $product->tag->name)
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
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="colorMultiSelect">Select Colors</label>
                                                        <select id="colorMultiSelect" placeholder="Select color" class="form-control" name="color_id[]" multiple="multiple">
                                                            @foreach($colors as $row)

                                                                @if( $product->colors->contains($row->id))
                                                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                                @else
                                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="sizeMultiSelect">Select Sizes</label>
                                                        <select id="sizeMultiSelect" class="form-control" name="size_id[]" multiple="multiple">
                                                            @foreach($sizes as $row)
                                                                @if( $product->sizes->contains($row->id))
                                                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                                @else
                                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--<div class="col">
                                                <label for="single-selection">Select Colors</label>
                                                <select id="single-selection" name="color_id" class="form-control multiselect multiselect-custom">
                                                    <option value="">Select Colors</option>
                                                    @foreach($colors as $row)
                                                        @if(count($product->colors) > 0)
                                                            @if($row->name == $product->colors[0]->name)
                                                                <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                            @endif
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Sizes</label>
                                                <select id="single-selection" name="size_id" class="form-control multiselect multiselect-custom">
                                                    <option value="">Select Size</option>
                                                    @foreach($sizes as $row)
                                                        @if(count($product->sizes) > 0)
                                                        @if($row->name == $product->sizes[0]->name)
                                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                                        @endif
                                                        @else
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>--}}
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="productPrice">Product Selling Price</label>
                                                <input type="number" id="productPrice" name="price" class="form-control" placeholder="Product Selling price"
                                                       value="{{old('price',$product->price)}}">
                                                @error('price')
                                                <span style="color: red">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="col">
                                                <label for="buyingPrice">Buying Price</label>
                                                <input type="number" id="buyingPrice" name="buying_price" class="form-control" placeholder="Product Buying price"
                                                value="{{old('buying_price',$product->buying_price)}}">
                                                @error('buying_price')
                                                <span style="color: red">Buying Price is required!</span>
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
                                                <label for="stock">Stock Warning</label>
                                                <input type="number" id="stock" class="form-control" name="stock_warning" value="{{old('stock_warning',$product->stock_warning)}}" placeholder="Stock Warning">
                                                @error('stock_warning')
                                                <span style="color: red">Product Stock Warning is required</span>
                                                @enderror
                                            </div>

                                        </div>

                                         <!-- Promotional Price  Start-->
                                         <div class="form-row my-4" >
                                            <div class="">
                                                <label for="promo_btn">Add Promotion</label>
                                                <input type="checkbox" id="promo_btn" class="btn btn-primary mr-3" value="1" name="promo" onclick="showPromo()" {{($product->promo_price) ? "checked" : null}}>
                                            </div>

                                            <div id="promo_section" style="{{($product->promo_price) ? 'display: flex;' : 'display: none;'}}">

                                                <div class="col-md-3">
                                                    <label for="promo_price">Promotional Price</label>
                                                    <input type="text" name="promo_price" id="promo_price" placeholder="Pormotional Price" value="{{$product->promo_price}}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" name="start_date" id="start_date" value="{{$product->start_date}}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" name="end_date" id="end_date" value="{{$product->end_date}}">
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById("promo_section").onload = function() {
                                                console.log("loaded")
                                                showPromo()};

                                            function showPromo(){
                                                var checkBox = document.getElementById("promo_btn");
                                                var promo_section = document.getElementById('promo_section');
                                                if (checkBox.checked == true){
                                                    promo_section.style.display = "flex";
                                                } else {
                                                    promo_section.style.display = "none";
                                                }
                                            }
                                        </script>
                                         <!-- Promotional Price End-->

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
                                            <div class="col-4">
                                                <label for="image">Upload Cover Image</label>
                                                <input type="file" id="image" class="form-control" name="image">
                                                <input type="text" name="old_image" value="{{$product->image}}" hidden>
                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            <div class="col-8">
                                                <div class="d-flex justify-content-between">
                                                    <label for="image">Upload Sub Images</label> <i style="height: 140%; cursor: pointer" id="plusIcon" class="fa fa-plus-circle"></i>
                                                </div>
                                                <div id="sub-image-field">
                                                    <div class="form-inline d-flex justify-content-between">
                                                        <input type="file" id="image" class="form-control" name="images[]">
                                                        <div class="color form-inline">
                                                            <label for="colorMultiSelect1" class="mr-2">Select Image Color</label>
                                                            <select id="colorMultiSelect1" class="form-control" name="color[]">
                                                                <option value="">Select Color</option>
                                                                @foreach($colors as $row)
                                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
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
@section('page-styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-multiselect.min.css')}}">
@endsection

@section('page-script')
    <script src="{{asset('js/bootstrap-multiselect.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(function(){
                $('#colorMultiSelect').multiselect();
            });
            $(function(){
                $('#sizeMultiSelect').multiselect();
            });
        })
    </script>
    <script src="{{asset('/js/add-product.js')}}"></script>

@endsection
