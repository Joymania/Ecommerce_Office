@extends('admin.layout.master')
@section('title', 'Add Sub-Category')
@section('pageTitle') <a href="{{route('subCategory.add')}}">Add Sub-Category</a> @endsection
@section('parentPageTitle') <a href="{{route('subCategory.view')}}">Sub-Categories</a> @endsection


@section('content')
<<<<<<< HEAD
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                <form action="{{route('subCategory.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                @csrf


                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="category_id">Category</label>
                                        <select class="form-control col-sm-9" id="category_id" name="category_id" required>
                                          <option required>Select Category</option>

                                @foreach($categories as $categorie)
                                          <option value="{{$categorie->id}}" required>{{$categorie->name}}</option>
                                @endforeach
                                        </select>
                                    </div>

                            <div class="form-group row">
                                <label for="sub_category_name" class="col-sm-3 text-right control-label col-form-label">Sub-category</label>
                                <div class="col-sm-9">
                                    <input name="sub_category_name" type="text" class="form-control @error('sub_category_name') is-invalid @enderror" id="sub_category_name" placeholder="Sub-category">

                                    {{-- validation --}}
                                @error('sub_category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
=======

<div class="card">
    <div class="card-header">
      <h3>
        
      </h3>
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
    </div>
    <div class="card-body">
      <form method="post" action="{{route('subCategory.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
          @csrf
          <div class="form-row col-md-6">
              <label for="category_id">Category</label>
              <select class="form-control col-sm-11" id="category_id" name="category_id" >
                <option value="">Select Category</option>

            @foreach($categories as $categorie)         
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
            @endforeach
              </select>
              @error('category_id')
              <span style="color: red">Category Name is required</span>
              @enderror
          </div>

        <div class="form-row col-md-6">
            <label for="sub_category_name">Sub-category</label>
            <input type="text" id="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror" name="sub_category_name" placeholder="Sub-category" required>
            @error('sub_category_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>

              </div>

          </form>
      </div> 

    </div>

@stop
