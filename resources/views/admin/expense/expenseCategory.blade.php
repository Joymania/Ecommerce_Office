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
            @if(session()->has('success_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success_msg') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
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

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('expenseCategory.edit', $view_cat->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>
                                    </button>

                                    <!-- for deleting using one form -->
                                    <div hidden> {{$route = route('expenseCategory.delete',$view_cat->id) }}</div>
                                    <a href="{{ route('expenseCategory.delete',$view_cat->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                                        confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">                                     
                                        <i class="icon-trash" aria-hidden="true"></i>                               
                                    </a>

                                   
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <form id="delete-form" method="POST"  class="d-none">
                            @csrf
                            @method('DELETE')
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@stop
