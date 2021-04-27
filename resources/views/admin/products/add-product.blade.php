@extends('admin.layout.master')
@section('title', 'Add Product')
@section('parentPageTitle', 'Products')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Add Product</h2>
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
                                <div class="body">
                                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="productName">Product Name</label>
                                                <input type="text" id="productName" name="name" class="form-control" placeholder="Product name">
                                                @error('name')
                                                <span style="color: red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Category</label>
                                                <select id="single-selection" name="category_id" class="multiselect multiselect-custom form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $row)
                                                         <option value="{{$row->id}}">{{$row->name}}</option>
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
                                                        <option value="{{$sub->id}}">{{$sub->sub_category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="single-selection">Select Brand Name</label>
                                                <select id="single-selection" name="brand_id" class="multiselect multiselect-custom form-control">
                                                    <option value="">Select Brand name</option>
                                                    @foreach($brands as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                <span style="color: red">Brand Name is required</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Tag</label>
                                                <select id="single-selection" name="tag_id" class="multiselect multiselect-custom form-control">
                                                    <option value="">Select Tags</option>
                                                    @foreach($tags as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tag_id')
                                                <span style="color: red">Tag is required</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Colors</label>
                                                <select id="single-selection" name="color_id" class="form-control multiselect multiselect-custom">
                                                    <option value="">Select Product Color</option>
                                                    @foreach($colors as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="single-selection">Select Sizes</label>
                                                <select id="single-selection" name="size_id" class="form-control multiselect multiselect-custom">
                                                    <option value="">Select Product Size</option>
                                                    @foreach($sizes as $row)
                                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="productPrice">Product Price</label>
                                                <input type="number" id="productPrice" name="price" class="form-control" placeholder="Product price">
                                                @error('price')
                                                <span style="color: red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="stock">Stock</label>
                                                <input type="number" id="stock" class="form-control" name="stock" placeholder="Stock available">
                                                @error('stock')
                                                <span style="color: red">Product stock is required</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="stock">Stock Warning</label>
                                                <input type="number" id="stock" class="form-control" name="stock_warning" placeholder="Stock Warning">
                                                @error('stock_warning')
                                                <span style="color: red">Product Stock Warning is required</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="short_desc">Short Description</label>
                                                <input type="text" id="short_desc" name="short_desc" class="form-control" placeholder="Product Short Description">
                                                @error('short_desc')
                                                <span style="color: red">Short Description is required</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-10">
                                                <label for="longDesc">Long Description</label>
                                                <textarea  style="height: 70%" class="form-control" name="long_desc" id="longDesc" cols="30" rows="10"
                                                           placeholder="Product Long Description"></textarea>
                                            </div>
                                        </div>

                                        <!-- Promotional Price  Start-->
                                        <div class="form-row mb-4" >
                                            <div class="">
                                                <label for="promo_btn">Add Promotion</label>
                                                <input type="checkbox" id="promo_btn" class="btn btn-primary mr-3" value="1" name="promo" onclick="showPromo()">
                                            </div>

                                            <div  id="promo_section" style="display: none;" >

                                                <div class="col-md-3">
                                                    <label for="promo_price">Promotional Price</label>
                                                    <input type="text" name="promo_price" id="promo_price" placeholder="Pormotional Price">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" name="start_date" id="start_date">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" name="end_date" id="end_date">
                                                </div>
                                            </div>
                                        </div>

                                        <script>
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
                                                <label for="image">Upload Cover Image</label>
                                                <input type="file" id="image" class="form-control" name="image">
                                                @error('image')
                                                <span style="color: red">Product Image is required</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="image">Upload Sub Images</label>
                                                <input type="file" id="image" class="form-control" name="images[]">
                                                <input type="file" id="image" class="form-control" name="images[]">
                                                <input type="file" id="image" class="form-control" name="images[]">
                                                <input type="file" id="image" class="form-control" name="images[]">
                                            </div>
                                        </div>

                                        <button class="btn btn-primary mt-3" type="submit">Add Product</button>
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

