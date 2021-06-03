@extends('admin.layout.master')
@section('title', 'Facebook Pixel')
@section('pageTitle') <a href="{{route('facebook.pixel')}}">Facebook Pixel</a> @endsection
@section('parentPageTitle', 'Home')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Facebook Pixel Account Info</h2>
                </div>
                <div class="body">
                    {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                        <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                    </button>  --}}
                    @if(!isset($data))
                        <a class=" btn btn-primary m-b-15" href="{{ route('pixel.add') }}"><i class="fa fa-plus-circle"></i> Setup Pixel</a>
                    @else
                        <a class=" btn btn-primary m-b-15" href="{{ route('pixel.edit',$data->id) }}"><i class="fa fa-plus-circle"></i>Edit Pixel</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Facebook Account Name</th>
                                <th>Facebook Pixel Name</th>
                                <th>Facebook Pixel ID</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data))
                            <tr>
                                <td>{{$data->facebook_name}}</td>
                                <td>{{$data->pixel_name}}</td>
                                <td>{{$data->pixel_id}}</td>
                                <td>
                                    <form action="{{route('pixel.delete',$data->id)}}" onsubmit="return confirm('Are you sure want to delete this row?')" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger m-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if(session()->has('success'))
@section('page-script')
    $(document).ready(function(){
    toastr.options.timeOut = "3500";
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-top-right';
    toastr['success']('{{session('success')}}');
    });
@endsection
@endif

@stop
