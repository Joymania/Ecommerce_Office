@extends('admin.layout.master')
@section('title', 'Edit Expense')
@section('pageTitle') <a href="#">Edit Expense</a> @endsection
@section('parentPageTitle') <a href="{{route('expense.view')}}">Expenses</a> @endsection


@section('content')
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
        </div>
    </div>
</div>



@stop
