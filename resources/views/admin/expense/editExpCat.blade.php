@extends('admin.layout.master')
@section('title', 'Edit Expense Category')
@section('pageTitle') <a href="{{route('expenseCategory.edit', $expCat->id)}}">Edit Expense Category</a> @endsection
@section('parentPageTitle') <a href="{{route('expenseCategory.view')}}">Expense Categories</a> @endsection


@section('content')
    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>

                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('expenseCategory.update', $expCat->id)}}" method="post"
                          class="form-horizontal" id="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row col-md-6">
                            <label for="description">Expense Category Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$expCat->name)}}"
                                   name="name" placeholder="Write Category name" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                            <button name="submit" type="submit" class="btn btn-primary">Update</button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@stop
