@extends('admin.layout.master')
@section('title', 'Add Expense')
@section('pageTitle') <a href="{{route('expense.add')}}">Add Expense</a> @endsection
@section('parentPageTitle') <a href="{{route('expense.view')}}">Expenses</a> @endsection


@section('content')
<<<<<<< HEAD
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                <form action="{{route('expense.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                @csrf


                    <div class="form-group row">
                                        <label class="col-sm-1 text-right control-label col-form-label" for="category_id">Category</label>
                                        <div class="col-sm-10">
                                        <select class="form-control col-sm-11" id="category_id" name="category_id" required>
                                          <option required>Select Category</option>

                                @foreach($categories as $categorie)
                                          <option value="{{$categorie->id}}" required>{{$categorie->name}}</option>
                                @endforeach
                                        </select>
                                    </div>
                                    </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-1 text-right control-label col-form-label">Amounty</label>
                                <div class="col-sm-9">
                                    <input name="amount" type="number" class="form-control @error('amount') is-invalid @enderror " id="amount" placeholder="Amount">

                                    {{-- validation --}}
                                @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="note" class="col-sm-1 text-right control-label col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <input name="note" type="text" class="form-control @error('note') is-invalid @enderror" id="note" placeholder="Note">

                                    {{-- validation --}}
                                 @error('note')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="expense_by" class="col-sm-3 text-right control-label col-form-label">Expense by</label>
                                <div class="col-sm-9">
                                    <input name="expense_by" type="text" class="form-control @error('expense_by') is-invalid @enderror " id="expense_by" placeholder="Expense by">

                                    validation
                                 @error('expense_by')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div> --}}

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>

                    </form>
                    </div>
                </div>
            </div>
=======

<div class="card">
    <div class="card-header">
      <h3>
        
      </h3>
    </div>
    <div class="card-body">
      <form method="post" action="{{route('expense.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
          @csrf
          <div class="form-row col-md-6">
              <label for="description">Category</label>
              <select class="form-control col-sm-11" id="category_id" name="category_id" required>
                <option value="">Select Category</option>

            @foreach($categories as $categorie)         
                <option value="{{$categorie->id}}" required>{{$categorie->name}}</option>
            @endforeach
              </select>

              @error('category_id')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>

          <div class="form-row col-md-6">
            <label for="description">Amount</label>
            <input type="number" id="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" required>
            @error('amount')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-row col-md-6">
            <label for="description">Note</label>
            <input type="text" id="note" class="form-control @error('note') is-invalid @enderror" name="note" placeholder="Note" required>
            @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
        </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>

              </div>

          </form>
      </div> 

    </div>







@stop
