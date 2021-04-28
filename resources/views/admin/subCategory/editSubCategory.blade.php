@extends('admin.layout.master')
@section('title', 'Edit Sub-Category')
@section('pageTitle') <a href="#">Edit Sub-Category</a> @endsection
@section('parentPageTitle') <a href="{{route('subCategory.view')}}">Sub-Categories</a> @endsection


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                <form action="{{route('subCategory.update')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                @csrf

                <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}">

                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label" for="category_id">Designation*</label>
                    <select class="form-control col-sm-9" id="category_id" name="category_id" >
                      <option >Select Designation</option>

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
    </div>
</div>



@stop
