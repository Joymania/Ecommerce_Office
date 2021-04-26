@extends('admin.layout.master')
@section('title', 'Update category')
@section('parentPageTitle', 'Dashboard')


@section('content')

<div class="card">
    <div class="card-header">
      <h3>
        
      </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('category.update')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
          @csrf

          <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}"> 

          <div class="form-row col-md-6">
              <label for="description">Category Name</label>
              <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$edits->name}}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                <button name="submit" type="submit" class="btn btn-primary">Update</button>

              </div>

          </form>
      </div>

    </div>








@stop
