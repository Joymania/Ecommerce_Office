@extends('admin.layout.master')
@section('title', 'Edit Expense')
@section('pageTitle') <a href="#">Edit Expense</a> @endsection
@section('parentPageTitle') <a href="{{route('expense.view')}}">Expenses</a> @endsection


@section('content')
<<<<<<< HEAD
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                <form action="{{route('updateExpense')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                @csrf

                <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}">
                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="category_id">Category</label>
                                        <select class="form-control col-sm-9" id="category_id" name="category_id" >
                                          <option>Select Category</option>

                                @foreach($categories as $categorie)
                                          <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endforeach

                                        </select>
                                    </div>

                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 text-right control-label col-form-label">Amounty</label>
                                <div class="col-sm-9">
                                    <input name="amount" type="number" class="form-control " id="amount" value="{{$edits->amount}}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="note" class="col-sm-3 text-right control-label col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <input name="note" type="text" class="form-control " id="note" value="{{$edits->note}}">
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="expense_by" class="col-sm-3 text-right control-label col-form-label">Expense by</label>
                                <div class="col-sm-9">
                                    <input name="expense_by" type="text" class="form-control " id="expense_by" value="{{$edits->expense_by}}">
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
      <form method="post" action="{{route('updateExpense')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
          @csrf
          <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}">
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
            <input type="number" id="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{$edits->amount}}" >
            @error('amount')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-row col-md-6">
            <label for="description">Note</label>
            <input type="text" id="note" class="form-control @error('note') is-invalid @enderror" name="note" value="{{$edits->note}}" required>
            @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
        </div>

              <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                <button name="submit" type="submit" class="btn btn-primary">Update</button>

              </div>

          </form>
      </div>

    </div>








@stop
