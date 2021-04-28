@extends('admin.layout.master')
@section('title', 'Add Expense')
@section('pageTitle') <a href="{{route('expense.add')}}">Add Expense</a> @endsection
@section('parentPageTitle') <a href="{{route('expense.view')}}">Expenses</a> @endsection


@section('content')
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
        </div>
    </div>
</div>



@stop
