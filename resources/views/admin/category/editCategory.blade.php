@extends('admin.layout.master')
@section('title', 'Update category')
@section('parentPageTitle', 'Dashboard')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="body">
            <form action="{{route('category.update')}}" method="post" class="form-horizontal" class="dropzone" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}"> 

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Category Name*</label>
                        <div class="col-sm-9">
                            <input name="name" type="text" class="form-control" id="name" value="{{$edits->name}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 text-right control-label col-form-label">Category Image</label>
                        <div class="col-sm-9">
                            <input name="image" type="file" class="form-control" id="image">
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
