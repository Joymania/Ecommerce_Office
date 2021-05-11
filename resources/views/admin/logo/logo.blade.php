@extends('admin.layout.master')
@section('title', 'Logo')
@section('pageTitle') <a href="{{route('logo.view')}}">Logo</a> @endsection
@section('parentPageTitle', '')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12 card">
        <div class="header">
            <a href="{{route('logo.add')}}">
                <button type="button" class="btn btn-primary">Add new Logo</button>
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
                                <th>Logo Image</th>                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_logos as $view_logo)
                            <tr>
                                <td>{{$view_logo->id}}</td>
                                <td>
                                    <img width="150px" height='70px' src="{{asset($view_logo->image)}}">
                                </td>
                                <td class="actions">

                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <a href="{{ route('logo.edit',$view_logo->id) }}"><i class="icon-pencil" aria-hidden="true"></i></a>
                                    </button>

                                    <!-- for deleting using one form -->
                                    <div hidden> {{$route = route('logo.delete',$view_logo->id) }}</div>
                                    <a href="{{ route('logo.delete',$view_logo->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"
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
