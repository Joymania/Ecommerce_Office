@extends('admin.layout.master')
@section('title', 'Edit Shipping Methods')
@section('pageTitle') <a href="{{route('shipping.method.edit', $shipping->id)}}">Edit Shipping Method</a> @endsection
@section('parentPageTitle') <a href="{{route('shipping.methods.view')}}">Shipping Methods</a> @endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h6>
                Edit Shipping Method

                <a class=" float-right btn btn-success btn-sm" href="{{ route('shipping.methods.view') }}"><i class="fa fa-list"></i>Shipping Method List</a>
            </h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('shipping.method.update', $shipping->id) }}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row col-md-10">
                    <label for="description">Shipping Method Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Write shipping method name" value="{{old('name',$shipping->name)}}" required>
                    <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
                </div>

                <div class="form-row col-md-10">
                    <label for="description">Cost</label>
                    <input type="number" id="cost" class="form-control" name="cost" placeholder="Write shipping cost" value="{{old('cost',$shipping->cost)}}" required>
                    <font color="red">{{ ($errors->has('cost'))?($errors->first('cost')): '' }}</font>
                </div>

                <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                    <input type="submit" class="btn btn-primary" value="Update">
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
