@extends('admin.layout.master')
@section('title', 'Copyright')
@section('pageTitle') <a href="{{route('copyright.view')}}">Copyright</a> @endsection
@section('parentPageTitle', '')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2></h2>
                </div>
                <div class="body">
                    {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                        <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                    </button>  --}}
                    @if(!isset($copyright))
                    <a class=" btn btn-primary m-b-15" href="{{route('copyright.add')}}"><i class="fa fa-plus-circle"></i>Add Copyright</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                            <thead>
                            <tr>
                                <th>Text</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($copyright))
                                <tr class="gradeA">
                                    <td>{{ $copyright->title }}</td>
                                    <td class="actions">
                                        <a href="{{route('copyright.edit')}}">
                                            <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                     data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{route('copyright.delete',$copyright->id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                           data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are you sure want to delete this Row?')">
                                            <i class="icon-trash" aria-hidden="true"></i>
                                        </a>
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
