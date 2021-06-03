@extends('admin.layout.master')
@section('title', 'Edit Facebook Pixel')
@section('pageTitle') <a href="{{route('pixel.edit',$pixel->id)}}">Edit Facebook Pixel</a> @endsection
@section('parentPageTitle') <a href="{{route('facebook.pixel')}}">Facebook Pixel</a> @endsection


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Edit Facebook Pixel Info</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="body">
                                    <form action="{{route('pixel.update',$pixel->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="facebook_name">Facebook Account Name</label>
                                                <input type="text" id="facebook_name" name="facebook_name" class="form-control" value="{{old('facebook_name',$pixel->facebook_name)}}" placeholder="Facebook Account Name">
                                                @error('facebook_name')
                                                <p style="color: red">Facebook Account Name is required!!</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="pixel_name">Facebook Pixel Name</label>
                                                <input type="text" id="pixel_name" name="pixel_name" class="form-control" value="{{old('pixel_name',$pixel->pixel_name)}}" placeholder="Facebook Pixel Name">
                                                @error('pixel_name')
                                                <p style="color: red">Facebook pixel name is required!!</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="pixel_id">Pixel ID</label>
                                                <input type="number" id="pixel_id" name="pixel_id" class="form-control" value="{{old('pixel_id',$pixel->pixel_id)}}" placeholder="Facebook Pixel ID">
                                                @error('pixel_id')
                                                <p style="color: red">Facebook Pixel ID is required!!</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
