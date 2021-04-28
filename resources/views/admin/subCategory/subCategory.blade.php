@extends('admin.layout.master')
@section('title', 'Sub-Category')
@section('pageTitle') <a href="{{route('subCategory.view')}}">Sub-categories</a> @endsection
@section('parentPageTitle', '')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="header">
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
                                <td class="action">
<<<<<<< HEAD

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('subCategory.edit',$list->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove">
                                    <a title="Move to trash" href="{{ route('subCategory.delete',$list->id) }}">
=======
                                   
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('subCategory.edit',$li->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>
                                   
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"> 
                                    <a title="Move to trash" href="{{ route('subCategory.delete',$li->id) }}">
>>>>>>> 2c677f9db2d91ff982dc0be83258d860a587c359
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
