@extends('admin.layout.master')
@section('title', 'Sub-Category')
@section('pageTitle') <a href="#">Sub Categories</a> @endsection
@section('parentPageTitle', '')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="header">
            @if(session()->has('success_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success_msg') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                                <td class="action">


                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('subCategory.edit',$li->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a></button>

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove">
                                    <a title="Move to trash" href="{{ route('subCategory.delete',$li->id) }}">
                                        <span><i class="fa fa-trash"></i></span>
                                    </a>
                                    </button>
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
