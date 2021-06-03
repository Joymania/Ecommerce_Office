@extends('admin.layout.master')
@section('title', 'Shipping Methods')
@section('pageTitle') <a href="{{route('shipping.methods.view')}}">Shipping Methods</a> @endsection
@section('parentPageTitle', '')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2></h2>
                </div>
                <div class="body">               
                
                    <a class=" btn btn-primary m-b-15" href="{{route('shipping.method.add')}}"><i class="fa fa-plus-circle"></i>Add Shipping Method</a>
            
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                            <thead>
                            <tr>
                                <th>Shipping Method</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($shipping->isNotEmpty())
                                @foreach($shipping as $shipping)
                                <tr class="gradeA">
                                    <td>{{ $shipping->name }}</td>
                                    <td>{{ $shipping->cost }}</td>
                                    <td class="actions">
                                        <a href="{{route('shipping.method.edit', $shipping->id)}}">
                                            <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                     data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></button>
                                        </a>
                                        <a href="{{route('shipping.method.delete',$shipping->id)}}" class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                           data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are you sure want to delete this Row?')">
                                            <i class="icon-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
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
