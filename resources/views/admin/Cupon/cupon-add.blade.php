@extends('admin.layout.master')
@section('title', 'Add Coupon')
@section('pageTitle') <a href="{{route('cupon.add')}}">Add Coupon</a> @endsection
@section('parentPageTitle')<a href="{{route('cupon.view')}}">Coupons</a>@endsection


@section('content')

<div class="card">
    <div class="card-header">
      <h3>
         Add Cupon
        <a class=" float-right btn btn-success btn-sm" href="{{ route('cupon.view') }}"><i class="fa fa-list"></i> Cupon List</a>
      </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('cupon.store') }}" id="myform" enctype="multipart/form-data">
          @csrf
          <div class="form-row col-md-6">
              <label for="description">Cupon</label>
              <input type="text" class="form-control" name="cupon" placeholder="Write Cupon"  value="{{ (@$editdata->cupon) }}" required>
              <font color="red">{{ ($errors->has('cupon'))?($errors->first('cupon')): '' }}</font>
          </div>
          <div class="form-row col-md-6">
            <label for="description">Disscount</label>
            <input type="number" class="form-control" name="discount" placeholder="Discount Price"  value="{{ (@$editdata->discount) }}" required>
            <font color="red">{{ ($errors->has('discount'))?($errors->first('discount')): '' }}</font>
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
