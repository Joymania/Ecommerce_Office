@extends('admin.layout.master')
@section('title', 'Category')
@section('pageTitle') <a href="#">Categories</a> @endsection
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
            <a href="{{route('category.add')}}">
                <button type="button" class="btn btn-primary">Add new category</button>
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
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_cats as $view_cat)
                            <tr>
                                <td>{{$view_cat->id}}</td>
                                <td>{{$view_cat->name}}</td>
                                <td>
                                    @if(!empty($view_cat->image))
                                    <img style="width: 100px; height: 120px" src="{{""}}/upload/categories/{{$view_cat->image}}" alt="">
                                    @endif
                                </td>

                                <td class="action">
                                    <a href="{{ route('category.edit',$view_cat->id) }}">
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil" aria-hidden="true"></i></button>
                                    </a>

                                    <!-- for deleting admin using one form -->
                                    <div hidden> {{ $route = route('category.delete', $view_cat->id) }}</div>
                                    <a href="{{ route('category.delete', $view_cat->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                        data-toggle="tooltip" data-original-title="Remove"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                                        confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">

                                         <i class="fa fa-trash"></i>

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
