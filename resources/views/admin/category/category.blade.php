@extends('admin.layout.master')
@section('title', 'Categories')
@section('pageTitle') <a href="{{route('category.view')}}">Categories</a> @endsection
@section('parentPageTitle', '')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="header">
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
                                <th>Created by</th>
                                <th>Updated by</th>
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
                                <td></td>
                                <td></td>
                                <td class="action">

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('category.edit',$view_cat->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove">
                                        <a title="Delete" href="{{ route('category.delete',$view_cat->id) }}">
                                            <span><i class="fa fa-trash"></i></span>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
<<<<<<< HEAD
            </div>
        </div>
=======
        </div>    
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
    </div>
</div>
@stop
