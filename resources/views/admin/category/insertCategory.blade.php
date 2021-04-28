@extends('admin.layout.master')
@section('title', 'Add Category')
@section('pageTitle') <a href="{{route('category.add')}}">Add Category</a> @endsection
@section('parentPageTitle') <a href="{{route('category.view')}}">Categories</a> @endsection


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
<<<<<<< HEAD

            <div class="body">
                <div id="errorElement "></div>

                <form action="{{route('category.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">

                @csrf
=======
        <div class="body">

            <form action="{{route('category.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
                     
            @csrf                      
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359


            <div class="form-group row">
                <label for="name" class="col-sm-3 text-right control-label col-form-label">Category Name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Name Here" >

<<<<<<< HEAD
                                    {{-- validation --}}
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="createdBy" class="col-sm-3 text-right control-label col-form-label">Created By</label>
                                <div class="col-sm-9">
                                    <input name="createdBy" type="text" class="form-control" id="createdBy" placeholder="Created By">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="updatedBy" class="col-sm-3 text-right control-label col-form-label">Updated By</label>
                                <div class="col-sm-9">
                                    <input name="updatedBy" type="text" class="form-control" id="updatedBy" placeholder="Updated By">
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
=======
                    {{-- validation --}}
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-sm-3 text-right control-label col-form-label">Category Image</label>
                <div class="col-sm-9">
                    <input name="image" type="file" class="form-control" id="image">
                </div>
            </div>                   
            
            <div class="form-group row">
                <label for="createdBy" class="col-sm-3 text-right control-label col-form-label">Created By</label>
                <div class="col-sm-9">
                    <input name="createdBy" type="text" class="form-control" id="createdBy" placeholder="Created By">
                </div>
            </div>
            <div class="form-group row">
                <label for="updatedBy" class="col-sm-3 text-right control-label col-form-label">Updated By</label>
                <div class="col-sm-9">
                    <input name="updatedBy" type="text" class="form-control" id="updatedBy" placeholder="Updated By">
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>      
            </form>
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
        </div>
    </div>
</div>    
@stop
