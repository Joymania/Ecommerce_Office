@extends('admin.layout.master')
@section('title', 'Add Color')
@section('pageTitle') <a href="{{route('copyright.add')}}">Add Copyright</a> @endsection
@section('parentPageTitle') <a href="{{route('copyright.view')}}">Copyright</a> @endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h6>
                @if (isset($editdata))
                    Edit Copyright
                @else
                    Add Copyright
                @endif

                <a class=" float-right btn btn-success btn-sm" href="{{ route('copyright.view') }}"><i class="fa fa-list"></i>Copyright List</a>
            </h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ (@$editdata)? route('copyright.update'): route('copyright.store') }}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row col-md-10">
                    <label for="description">Copyright Text</label>
                    <input type="text" id="name" class="form-control" name="title" placeholder="Write copyright text"  value="{{ (@$editdata->title) }}" required>
                    <font color="red">{{ ($errors->has('title'))?($errors->first('title')): '' }}</font>
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
