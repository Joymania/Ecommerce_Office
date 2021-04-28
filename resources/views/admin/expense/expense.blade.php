@extends('admin.layout.master')
@section('title', 'Expenses')
@section('pageTitle') <a href="{{route('expense.view')}}">Expenses</a> @endsection
@section('parentPageTitle', '')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="header">
            <a href="{{route('expense.add')}}">
                <button type="button" class="btn btn-primary">Add New Expense</button>
            </a>
        </div>
        <br>
        <div class="card">

            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Expense Category</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Expense by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($lists as $list) @if(!empty($list->expenseCategory))
                            <tr>
                                <td>{{$list->id}}</td>

                                <td>{{$list->expenseCategory->name}}</td>
                                <td>{{$list->amount}}</td>
                                @if(!empty($list))
                                <td>{{$list->note}}</td>
                                @else
                                <td></td>
                                @endif

                                <td>{{$admins->name}}</td>

                                <td class="action">

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('expense.edit',$list->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove">
                                    <a title="Move to trash" href="{{ route('expense.delete',$list->id) }}">
                                        <span><i class="fa fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                            @else
                            <p></p>
                            @endif
                            @endforeach


                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@stop
