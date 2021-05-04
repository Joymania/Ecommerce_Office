@extends('admin.layout.master')
@section('title', 'Add admin')
@section('pageTitle') <a href="{{route('admin.create')}}">Add Admin</a> @endsection
@section('parentPageTitle') <a href="{{route('admin.index')}}">Admins</a> @endsection


@section('content')

<div class="row clearfix">
<div class="col-lg-12">
<div class="card">
    <div class="card-header">
        <h6> Add Admin </h6>

        <a class=" float-right btn btn-success btn-sm" href="{{ route('admin.index') }}"><i class="fa fa-list"></i> Admin List</a>

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
        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h6>Profile Photo</h6>
                            <div class="media photo">
                                <div class="media-left m-r-15">
                                    <img src="{{ (!empty($admin->image))?url('upload/admins/'.$admin->image):url('upload/noImage.jpg') }}" class="user-photo media-object" alt="User" width="140px" height="140px">
                                </div>
                                <div class="media-body">
                                    <p>Upload your photo.
                                        <br> <em>Image should be at least 140px x 140px</em></p>
                                    <!-- <button type="button" class="btn btn-default-dark" id="btn-upload-photo">Upload Photo</button> -->

                                    <input name="image" type="file" id="filePhoto" class="@error('image') is-invalid @enderror" value="{{old('image')}}">
                                    @error('image')                            
                                            <span class="" role="alert" style="color: red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
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
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name')}}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{old('address')}}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="fancy-radio">
                                    <input name="gender" value="male" type="radio" {{old('gender') == null?"checked" : (old('gender') == 'male'? "checked":null)}} >
                                    <span><i></i>Male</span>
                                </label>
                                <label class="fancy-radio">
                                    <input name="gender" value="female" type="radio" {{old('gender') == 'female'? "checked":null}}>
                                    <span><i></i>Female</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <label class="fancy-radio">
                                    <input name="role" value="1" type="radio" {{old('role') == '1'? "checked":null}}>
                                    <span><i></i>Super Admin</span>
                                </label>

                                <label class="fancy-radio">
                                    <input name="role" value="0" type="radio" {{old('role') == '0'? "checked":null}}>
                                    <span><i></i>Admin</span>
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
            <button type="submit" class="btn btn-primary">Create</button>
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
