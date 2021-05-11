@extends('admin.layout.master')
@section('title', 'Add Color')
@section('pageTitle') <a href="{{route('color.add')}}">Add Color</a> @endsection
@section('parentPageTitle') <a href="{{route('color.view')}}">Colors</a> @endsection


@section('content')

<div class="card">
    <div class="card-header">
      <h6>
          @if (isset($editdata))
              Edit Color
              @else
                 Add Color
          @endif

        <a class=" float-right btn btn-success btn-sm" href="{{ route('color.view') }}"><i class="fa fa-list"></i> Color List</a>
      </h6>
    </div>
    <div class="card-body">
      <form method="post" action="{{ (@$editdata)? route('color.update',$editdata->id): route('color.store') }}" id="myform" enctype="multipart/form-data">
          @csrf
          <div class="form-row col-md-6">
              <label for="description">Color Name</label>
              <input type="text" id="name" class="form-control" name="name" placeholder="Write color name"  value="{{ (@$editdata->name) }}" required>
              <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
          </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                  <input type="submit" class="btn btn-primary" value="{{ (@$editdata)? "Update": "Submit" }}">

              </div>

          </form>
      </div>

    </div>

@stop

@section('page-script')

    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });

@stop
