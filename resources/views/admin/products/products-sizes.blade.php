@extends('admin.layout.master')
@section('title', 'Product Sizes')
@section('pageTitle') <a href="{{route('products.sizes')}}">Product Sizes</a> @endsection
@section('parentPageTitle', '')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="body">
                    <div class="row">
                        <div class="col-md-12">
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session()->has('delete'))
                               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                   <strong>{{ session()->get('delete') }}</strong>
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                            @endif
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Product Size List</h2>
                                </div>
                                <div class="body">
                                    <a class=" btn btn-primary m-b-15" href="{{route('products.size.create')}}"><i class="fa fa-plus-circle"></i> Add Size</a>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Actions</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                             @foreach($sizes as $row)
                                             <tr>
                                                 <td>{{$row->name}}</td>
                                                 <td>
                                                     <a href="{{route('products.size.edit',['size'=>$row->id])}}" class="float-left">
                                                         <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                                  data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></button></a>
                                                     <form action="{{route('products.size.delete',['size'=>$row->id])}}" class="deleteForm"
                                                           onsubmit="return confirm('Are you sure want to delete this item?')" method="post">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
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
                </div>
            </div>
        </div>

    </div>

@stop
