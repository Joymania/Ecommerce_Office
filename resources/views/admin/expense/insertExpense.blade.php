@extends('admin.layout.master')
@section('title', 'Add Expense')
@section('pageTitle') <a href="{{route('expense.add')}}">Add Expense</a> @endsection
@section('parentPageTitle') <a href="{{route('expense.view')}}">Expenses</a> @endsection


@section('content')
    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">


            <div class="card">
                <div class="card-header">
                    <h3>

                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('expense.store')}}" method="post" class="form-horizontal"
                          id="form" enctype="multipart/form-data">
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
                            <input type="number" id="amount" class="form-control @error('amount') is-invalid @enderror"
                                   name="amount" required>
                            @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row col-md-6">
                            <label for="description">Note</label>
                            <input type="text" id="note" class="form-control @error('note') is-invalid @enderror"
                                   name="note" placeholder="Note" >
                            @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
@stop
