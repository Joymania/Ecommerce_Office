@extends('admin.layout.master')
@section('title', 'Users')
@section('parentPageTitle', 'Table')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Users</h2>                       
            </div>
            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
            @endif
            <div class="body">
                <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add User
                </button>

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
                            <th>Actions</th>
                        </tr>
                    </tfoot>


                    <tbody>
                    @foreach ($users as $user)
                        <tr class="gradeA">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->gender}}</td>
                            <td class="actions">
            
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                                <form method='post' action="{{route('users.destroy',$user->id)}}">
                                    @csrf 
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                    data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button>

                                </form>
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
@stop
