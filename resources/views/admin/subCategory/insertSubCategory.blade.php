@extends('admin.layout.master')
@section('title', 'Insert Category')
@section('parentPageTitle', 'Dashboard')


@section('content')

<div class="card">
    <div class="card-header">
      <h3>
        
      </h3>
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
