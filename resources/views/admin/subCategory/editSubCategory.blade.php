@extends('admin.layout.master')
@section('title', 'Edit Sub-Category')
@section('pageTitle') <a href="#">Edit Sub-Category</a> @endsection
@section('parentPageTitle') <a href="{{route('subCategory.view')}}">Sub-Categories</a> @endsection


@section('content')
<<<<<<< HEAD
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                <form action="{{route('subCategory.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                @csrf
=======

<div class="card">
    <div class="card-header">
      <h3>
        
      </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('subCategory.update')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
          @csrf
          <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}">

          <div class="form-row col-md-6">
              <label for="category_id">Category</label>
              <select class="form-control col-sm-11" id="category_id" name="category_id" required>
                <option value="">Select Category</option>

            @foreach($categories as $categorie)         
                <option value="{{$categorie->id}}" required>{{$categorie->name}}</option>
            @endforeach
              </select>

              @error('category_id')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>

        <div class="form-row col-md-6">
            <label for="sub_category_name">Sub-category</label>
            <input type="text" id="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror" name="sub_category_name" value="{{$edits->sub_category_name}}">
            @error('sub_category_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>

              </div>

<<<<<<< HEAD
            @foreach($cats as $cat)
                      <option value="{{$cat->id}}" >{{$cat->name}}</option>
            @endforeach

                    </select>
                </div>

                            <div class="form-group row">
                                <label for="sub_category_name" class="col-sm-3 text-right control-label col-form-label">Sub-category</label>
                                <div class="col-sm-9">
                                    <input name="sub_category_name" type="text" class="form-control" id="sub_category_name" value="{{$edits->sub_category_name}}">
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
          </form>
      </div> 

>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
    </div>

@stop
