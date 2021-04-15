@extends('admin.layout.master')
@section('title', 'Products List')
@section('parentPageTitle', 'Products')


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Products Size List</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
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
                                    <a href="{{route('products.size.create')}}">
                                        <button class="btn-primary" type="submit">Add New Size <i class="icon-plus"></i></button>
                                    </a>
                                </div>
                                <div class="body">
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
                                                     <a href="{{route('products.size.edit',['size'=>$row->id])}}" class="editLink" data-toggle="tooltip" title="Edit Product!">
                                                         <button class="editBtn"><i class="icon-note"></i></button>
                                                     </a>
                                                     <form action="{{route('products.size.delete',['size'=>$row->id])}}" class="deleteForm"
                                                           onsubmit="return confirm('Are you sure want to delete this item?')" method="post">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button class="deleteBtn" type="submit" data-toggle="tooltip" title="Delete product!"><i class="icon-trash"></i></button>
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
