@extends('admin.layout.master')
@section('title', 'Edit user')
@section('parentPageTitle', 'User')


@section('content')

<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <h3>Edit User</h3> 
        <a class=" float-right btn btn-success btn-sm" href="{{ route('users.index') }}"><i class="fa fa-list"></i> Users List</a>

        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success_msg') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors['message'] }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('errors'))
         {{--dd($errors['errors']--}}
        @endif
    </div>

    <div class="body">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h6>Profile Photo</h6>
                            <div class="media photo">
                                <div class="media-left m-r-15">
                                    <img src="{{ (!empty($user->image))?url('upload/users/'.$user->image):url('upload/noImage.jpg') }}" class="user-photo media-object" alt="User" width="140px" height="140px">
                                </div>
                                <div class="media-body">
                                    <p>Upload your photo.
                                        <br> <em>Image should be at least 140px x 140px</em></p>
                                    <!-- <button type="button" class="btn btn-default-dark" id="btn-upload-photo">Upload Photo</button> -->

                                    <input name="image" type="file" id="filePhoto" >
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>     
            </div>   

            <div class="row clearfix">
                <div class="col-lg-6 col-md-12">
                    <div class="body">
                        <h6>Basic Information</h6>
                        <div class="form-group">                                                
                            <input name="name" type="text" class="form-control" placeholder="Name" value="{{$user->name}}">
                        </div>
                    
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">                                                
                            <input name="address" type="text" class="form-control" placeholder="Address" value="{{$user->address}}">
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="fancy-radio">
                                    <input name="gender" value="male" type="radio" {{$user->gender == 'male'?"checked":null}}>
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="gender" value="female" type="radio" {{ $user->gender == 'female'? "checked" : null}}>
                                    <span><i></i>Female</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="fancy-radio">
                                    <input name="role" value="admin" type="radio" {{ $user->role == 'admin'? "checked" : null}} >
                                    <span><i></i>Admin</span>
                                </label>

                                <label class="fancy-radio">
                                    <input name="role" value="customer" type="radio" {{ $user->role == 'customer'? "checked" : null}}>
                                    <span><i></i>Customer</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12">
                    
                    <div class="col-lg-6 col-md-12">
                        <h6>Change Password</h6>

                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>

                  
@endsection

@section('page-script')

    $(function() {
        // photo upload
        $('#btn-upload-photo').on('click', function() {
            $(this).siblings('#filePhoto').trigger('click');
        });

        // plans
        $('.btn-choose-plan').on('click', function() {
            $('.plan').removeClass('selected-plan');
            $('.plan-title span').find('i').remove();

            $(this).parent().addClass('selected-plan');
            $(this).parent().find('.plan-title').append('<span><i class="fa fa-check-circle"></i></span>');
        });
    });

@stop
