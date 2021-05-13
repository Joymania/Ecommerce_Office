@extends('admin.layout.master')
@section('title', 'Edit user')
@section('pageTitle') <a href="#">Edit User</a> @endsection
@section('parentPageTitle') <a href="{{route('users.index')}}">Users</a> @endsection


@section('content')

<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <h6>Edit User</h6>
        <a class=" float-right btn btn-success btn-sm" href="{{ route('users.index') }}"><i class="fa fa-list"></i> User List</a>

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
                                    <img src="{{ (!empty($user->image)) ? url('upload/users/'.$user->image):url('upload/noImage.jpg') }}" class="user-photo media-object" alt="User" width="140px" height="140px">
                                </div>
                                <div class="media-body">
                                    <p>Upload your photo.
                                        <br> <em>Image should be at least 140px x 140px</em></p>
                                    <!-- <button type="button" class="btn btn-default-dark" id="btn-upload-photo">Upload Photo</button> -->

                                    <input name="image" type="file" id="filePhoto" class="@error('image') is-invalid @enderror">
                                    <div>
                                        @error('image')                            
                                            <span class="" role="alert" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div hidden> {{$route = route('users.image.delete',$user->id)}}</div>
                                <a class="btn-sm btn-danger" href="{{ route('users.image.delete',$user->id) }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('delete-form').setAttribute('action', '{{$route}}');
                                    confirm('Are you sure to delete?') ? document.getElementById('delete-form').submit() : null;">
                                    Delete Image
                                </a>
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
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name',$user->name)}}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email',$user->email)}}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{old('address', $user->address)}}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                    </div>

                </div>

                <div class="col-lg-6 col-md-12">

                    <div class="body">
                        <h6>Change Password</h6>

                        <div class="form-group">
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          
                        </div>
                        <div class="form-group">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm New Password">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <form id="delete-form" method="POST"  class="d-none">
                @csrf
                @method('DELETE')
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
