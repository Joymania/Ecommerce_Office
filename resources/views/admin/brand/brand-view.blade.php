@extends('admin.layout.master')
@section('title', 'Brands')
@section('pageTitle') <a href="{{route('brand.view')}}">Brands</a> @endsection
@section('parentPageTitle', '')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Brand List</h2>
            </div>
            <div class="body">
                {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                </button>  --}}
                <a class=" btn btn-primary m-b-15" href="{{ route('brand.add') }}"><i class="fa fa-plus-circle"></i> Add Brand</a>
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Brand</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $key=>$brand)
                            <tr class="gradeA">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $brand->name }}</td>
                            <td class="actions">
                                <a href="{{ route('brand.edit',$brand->id) }}"
                                 class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                                <!-- for deleting using one form -->
                                <div hidden> {{$route = route('brand.delete',$brand->id) }}</div>
                                <a href="{{ route('brand.delete',$brand->id) }}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"
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
