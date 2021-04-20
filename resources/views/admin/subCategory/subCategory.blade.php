@extends('admin.layout.master')
@section('title', 'Sub-Category')
@section('parentPageTitle', 'Dashboard')


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
                            


                            @foreach($lists as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->category->name}}</td>
                                <td>{{$list->sub_category_name}}</td>
                                <td class="action">
                                   
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('subCategory.edit',$list->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>
                                   
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"> 
                                    <a title="Move to trash" href="{{ route('subCategory.delete',$list->id) }}">
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
