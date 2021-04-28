@extends('admin.layout.master')
@section('title', 'Edit category')
@section('pageTitle') <a href="#">Edit Category</a> @endsection
@section('parentPageTitle') <a href="{{route('category.view')}}">Categories</a> @endsection


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
<<<<<<< HEAD

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
=======
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
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
        </div>
    </div>
</div>    
@stop
