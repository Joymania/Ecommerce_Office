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
            @if(session()->has('success_msg'))
                @section('page-script')
                $(document).ready(function(){
                toastr.options.timeOut = "3500";
                toastr.options.closeButton = true;
                toastr.options.positionClass = 'toast-top-right';
                toastr['success']('{{session('success_msg')}}');
                });
                @endsection
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
                                <th>Expense Category</th>
                                <th>Amount</th>
                                <th>Note</th>
                                <th>Expense by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($lists as $list)
                            @if(!empty($list->expenseCategory))
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

                                    <a  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"
                                    href="{{ route('expense.edit',$list->id) }}">
                                        <i class="icon-pencil" aria-hidden="true"></i>
                                    </a>
                                    

                                    <!-- for deleting using one form -->
                                    <div hidden> {{$route = route('expense.delete',$list->id) }}</div>
                                    <a href="{{ route('expense.delete',$list->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                                        confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">                                     
                                        <i class="icon-trash" aria-hidden="true"></i>                               
                                    </a>
                                
                                </td>
                            </tr>
                            @else
                            <p></p>
                            @endif
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
@stop
