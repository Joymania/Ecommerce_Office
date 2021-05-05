@extends('admin.layout.master')
@section('title', 'Edit Category')
@section('parentPageTitle') <a href="{{route('category.view')}}">Categories</a> @endsection
@section('pageTitle') <a href="#">Edit Category</a> @endsection


@section('content')

    <div class="row clearfix card">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card-body">

                <form action="{{route('category.update')}}" method="post" class="form-horizontal" class="dropzone" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}">

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Category Name*</label>
                            <div class="col-sm-4">
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$edits->name}}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 text-right control-label col-form-label">Category Image</label>
                            <div class="col-sm-4">
                                <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="image">
                                @error('image')                            
                                    <span class="" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button name="submit" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
@stop
