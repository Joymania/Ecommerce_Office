@extends('admin.layout.master')
@section('title', 'Admins')
@section('pageTitle') <a href="{{route('admin.index')}}">Admins</a> @endsection
@section('parentPageTitle', '')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h6>Admin List</h6>
                <a href="{{ route('admin.create') }}">
                    <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                        <i class="icon wb-plus" aria-hidden="true"></i> Add Admin
                    </button>
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



            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Gender</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Gender</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>

                        <tbody>
                        @foreach ($admins as $admin)
                            <tr class="gradeA">
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->role == '1' ? 'Super Admin': 'Admin'}}</td>
                                <td>{{$admin->status == '1' ? 'active' : '' }}</td>
                                <td>{{$admin->gender}}</td>
                                <td>
                                    @if($admin->image)
                                        <img style="width: 80px; height: 90px" src="{{""}}/upload/admins/{{$admin->image}}" alt="">
                                    @endif
                                </td>

                                <td class="actions">
                                    <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                    data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                                    <!-- for deleting admin using one form -->
                                    <div hidden> {{$route = route('admin.delete',$admin->id)}}</div>
                                    <a href="{{ route('admin.delete',$admin->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"
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
