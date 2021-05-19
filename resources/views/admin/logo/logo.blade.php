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
                                <th>Logo Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view_logos as $view_logo)
                            <tr>
                                <td>{{$view_logo->id}}</td>
                                <td>
                                    <img style="max-width:150px; max-height:100px"  src="{{asset($view_logo->image)}}">
                                </td>
                                <td class="actions">
                                    <a href="{{ route('logo.edit',$view_logo->id) }}">
                                        <button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil" aria-hidden="true"></i>
                                        </button>
                                    </a>

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
