@extends('admin.layout.master')
@section('title', 'Sub-Category')
@section('pageTitle') <a href="#">Sub Categories</a> @endsection
@section('parentPageTitle', '')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="header">
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
            <a href="{{route('subCategory.add')}}">
                <button type="button" class="btn btn-primary">Add new sub-category</button>
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
                                <th>Category</th>
                                <th>Sub-category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            @foreach($list as $li)
                            <tr>
                                <td>{{$li->id}}</td>
                                <td>{{$li->category->name}}</td>
                                <td>{{$li->sub_category_name}}</td>
                                <td class="actions">
                                    <a href="{{ route('subCategory.edit',$li->id) }}">
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil" aria-hidden="true"></i></button>
                                    </a>

                                    <!-- for deleting admin using one form -->
                                    <div hidden> {{ $route = route('subCategory.delete',$li->id) }}</div>
                                    <a href="{{ route('subCategory.delete',$li->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                        data-toggle="tooltip" data-original-title="Remove"
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



@stop
