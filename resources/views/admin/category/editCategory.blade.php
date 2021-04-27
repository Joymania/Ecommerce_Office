@extends('admin.layout.master')
@section('title', 'Update category')
@section('parentPageTitle', 'Dashboard')


@section('content')

<div class="card">
    <div class="card-header">
    
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
        </div>
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
