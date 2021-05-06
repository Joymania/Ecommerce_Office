@extends('admin.layout.master')
@section('title', 'Add Slider')
@section('pageTitle') <a href="#">Add Slider</a> @endsection
@section('parentPageTitle') <a href="{{route('slider.view')}}">All sliders</a> @endsection


@section('content')

<div class="card">
    <div class="card-header">
      <h6>
          @if (isset($editdata))
              Edit Slider
              @else
                 Add Slider
          @endif

        <a class=" float-right btn btn-success btn-sm" href="{{ route('slider.view') }}"><i class="fa fa-list"></i> Slider List</a>
      </h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{ (@$editdata)? route('slider.update',$editdata->id): route('slider.store') }}"  id="myform" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="short_title">Short Title</label>
                    <input type="text" name="short_title" class="form-control" id="short_title" value="{{ @$editdata->short_title }}">

                </div>

                <div class="form-group col-md-6">
                    <label for="long_title">Long Title</label>
                    <input type="text" name="long_title" class="form-control" id="long_title"  value="{{ @$editdata->long_title }}">

                </div>
                <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" id="image">

                </div>
                <div class="form-group col-md-6" style="padding-top: 30px">
                    <input type="submit" value="{{ (@$editdata)? "Update": "Submit" }}" class="btn btn-primary">

                </div>

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
