@extends('admin.layout.master')
@section('title', 'Logo')
@section('parentPageTitle', 'Dashboard')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="header">
            <a href="{{route('logo.add')}}">
                <button type="button" class="btn btn-primary">Add new Logo</button>  
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
                                <th>Logo Image</th>
                                <th>Created by</th>
                                <th>Updated by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_logos as $view_logo)
                            <tr>
                                <td>{{$view_logo->id}}</td>
                                <td>
                                    <img width="60px" src="{{asset($view_logo->image)}}">
                                </td>
                                <td></td>
                                <td></td>
                                <td class="action">
                                   
                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('logo.edit',$view_logo->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>
                                   
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"> 
                                            <a title="Move to trash" href="{{ route('logo.delete',$view_logo->id) }}">
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
