@extends('admin.layout.master')
@section('title', 'Add Expense Category')
@section('pageTitle') <a href="{{route('expenseCategory.add')}}">Add Expense Category</a> @endsection
@section('parentPageTitle') <a href="{{route('expenseCategory.view')}}">Expense Categories</a> @endsection


@section('content')
<<<<<<< HEAD
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                <div id="errorElement "></div>

                <form action="{{route('expenseCategory.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">

                @csrf


                            <div class="form-group row col-md-10">
                                <label for="name" class="col-sm-4 text-right control-label col-form-label">Expense Category Name</label>
                                <div class="col-sm-8">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="Category Name Here" >

                                    {{-- validation --}}
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

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
=======
<div class="card">
    <div class="card-header">
      <h3>
        
      </h3>
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
    </div>
    <div class="card-body">
      <form method="post" action="{{route('expenseCategory.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
          @csrf
          <div class="form-row col-md-6">
              <label for="description">Expense Category Name</label>
              <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Write Category name" required>
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>

              </div>

          </form>
      </div>

    </div>







@stop
