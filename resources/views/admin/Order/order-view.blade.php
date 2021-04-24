@extends('admin.layout.master')
@section('title', 'jQuery Datatable')
@section('parentPageTitle', 'Table')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Order List</h2>
            </div>
            <div class="body">
                {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                </button>  --}}
                {{-- <a class=" btn btn-primary m-b-15" href="{{ route('brand.add') }}"><i class="fa fa-plus-circle"></i> Add Brand</a> --}}
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $key=>$order)
                            <tr class="gradeA">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $order['user']['name'] }}</td>
                            <td>
                                @if ($order->status==0)
                                    <button type="button" class="btn btn-warning"><i class="fa fa-warning"></i> <span>Pending</span></button>
                                @elseif ($order->status==1)
                                <button type="button" class="btn btn-info"><i class="fa fa-check"></i> <span>Accepted</span></button>

                                @endif
                                 <a href="{{ route('order.status',$order->id) }}" class="btn btn-success" ><i class="fa fa-arrow-up"></i> <span>Approve</span></a>

                            </td>

                            <td></td>
                            <td class="actions">

                                <a href="{{ route('order.details',$order->id) }}">
                                <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-"
                                data-toggle="tooltip" data-original-title="Details"><i class="icon-eye" aria-hidden="true"></i></a>

                                <a href="{{ route('order.delete',$order->id) }}">
                                <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></a>

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

@endsection
