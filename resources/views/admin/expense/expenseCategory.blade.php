@extends('admin.layout.master')
@section('title', 'Expense categories')
@section('pageTitle') <a href="{{route('expenseCategory.view')}}">Expense Category</a> @endsection
@section('parentPageTitle','')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="header">
            <a href="{{route('expenseCategory.add')}}">
                <button type="button" class="btn btn-primary">Add new Expense category</button>
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
                                <th>Name</th>
                                <th>Expens by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_cats as $view_cat)
                            <tr>
                                <td>{{$view_cat->id}}</td>
                                <td>{{$view_cat->name}}</td>
                                <td>{{$admins->name}}</td>
                                <td class="action">

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove">
                                        <a title="Delete" href="{{ route('expenseCategory.delete',$view_cat->id) }}">
                                            <span><i class="fa fa-trash"></i></span>
                                        </a>
                                </td>
                            </tr>
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
