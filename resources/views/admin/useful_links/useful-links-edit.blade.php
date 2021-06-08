@extends('admin.layout.master')
@section('title', 'Edit Useful Links')
@section('pageTitle') <a href="{{route('useful.links.edit', $useful->id)}}">Edit Useful Links</a> @endsection
@section('parentPageTitle') <a href="{{route('useful.links.view')}}">Useful Links</a> @endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h6>
                    Edit Useful Links

                <a class=" float-right btn btn-success btn-sm" href="{{ route('useful.links.view') }}"><i class="fa fa-list"></i>Useful Links List</a>
            </h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('useful.links.update', $useful->id) }}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row col-md-10">
                    <label for="description">Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Useful Link name"  value="{{old('name',$useful->name)}}" required>
                    <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
                </div>

                <div class="form-row col-md-10">
                    <label for="description">Link</label>
                    <input type="text" id="link" class="form-control" name="link" placeholder="Link" value="{{old('link',$useful->link)}}" required>
                    <font color="red">{{ ($errors->has('link'))?($errors->first('link')): '' }}</font>
                </div>

                <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                    <input type="submit" class="btn btn-primary" value="Submit">
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
