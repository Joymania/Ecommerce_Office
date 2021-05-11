@extends('admin.layout.master')
@section('title', 'Admin Profile')
@section('pageTitle')<a href="#">Admin Profile</a> @endsection
@section('parentPageTitle') <a href="{{route('admin.index')}}">Admins</a> @endsection


@section('content')

<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <h6>Admin Profile</h6>

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
        <form method="POST" action="{{ route('admin.profile-update') }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h6>Profile Photo</h6>
                            <div class="media photo">
                                <div class="media-left m-r-15">
                                    <img src="{{ (!empty($admin->image))?url('upload/admins/'.$admin->image):url('upload/noImage.jpg') }}" class="admin-photo media-object" alt="admin" width="140px" height="140px">
                                </div>
                                <div class="media-body">
                                    <p>Upload your photo.
                                        <br> <em>Image should be at least 140px x 140px</em></p>
                                    <!-- <button type="button" class="btn btn-default-dark" id="btn-upload-photo">Upload Photo</button> -->

                                    <input name="image" type="file" id="filePhoto" class="@error('image') is-invalid @enderror">
                                    @error('image')                            
                                            <span class="" role="alert" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>                             
                            </div>
                            <div>
                                    <!-- delete image -->
                                    <div hidden> {{$route = route('admin.image.delete',$admin->id)}}</div>
                                    <a class="btn-sm btn-danger" href="{{ route('admin.image.delete',$admin->id) }}"
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
                            <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Name" value="{{$admin->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" value="{{$admin->email}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input name="address" type="text" class="form-control  @error('address') is-invalid @enderror" placeholder="Address" value="{{$admin->address}}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="fancy-radio">
                                    <input name="gender" value="male" type="radio" {{$admin->gender == 'male'?"checked":null}}>
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="gender" value="female" type="radio" {{ $admin->gender == 'female'? "checked" : null}}>
                                    <span><i></i>Female</span>
                                </label>
                            </div>
                        </div>
                        <div>Admin Role:</div>
                        @if($admin->role == '1')
                            <div class="form-group">
                                <div>
                                    <label class="fancy-radio">
                                        <input name="role" value="1" type="radio" {{ $admin->role == '1'? "checked" : null}} >
                                        <span><i></i>Super Admin</span>
                                    </label>

                                    <label class="fancy-radio">
                                        <input name="role" value="0" type="radio" {{ $admin->role == '0'? "checked" : null}}>
                                        <span><i></i>Admin</span>
                                    </label>
                                </div>
                            </div>
                        @else
                            <div>
                                <label class="fancy-radio">
                                            <input name="role" value="0" type="radio" checked>
                                            <span><i></i>Admin</span>
                                </label>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="col-lg-6 col-md-12">

                    <div class="body">
                        <h6>Change Password</h6>

                        <div class="form-group">
                            <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="New Password">
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

            <button type="submit" class="btn btn-primary">Update Profile</button>
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
