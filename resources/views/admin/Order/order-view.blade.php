@extends('admin.layout.master')
@section('title', 'Orders')
@section('pageTitle') <a href="{{route('order.view')}}">Orders</a> @endsection
@section('parentPageTitle', '')


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
                {{-- <a class=" btn btn-primary m-b-15" href="{{ route('brand.add') }}"><i
                    class="fa fa-plus-circle"></i> Add Brand</a> --}}
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alldata as $key=>$order)
                            <tr class="gradeA">
                                <td>{{ $order->id }}</td>
                                @if(!empty($order['user']['name']))
                                <td>{{ $order['user']['name'] }}</td>
                                @else
                                <td></td>
                                @endif
                                <td>

                                    <div class="btn-group">
                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            @if ($order->status==0)
                                            Pending
                                            @elseif($order->status==1)
                                            Accepted
                                            @elseif($order->status==2)
                                            Delivered

                                            @endif

                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="{{ route('order.returnPending',$order->id) }}">Pending</a>

                                            <a class="dropdown-item"
                                                href="{{ route('order.status',$order->id) }}">Accept</a>

                                            <a class="dropdown-item"
                                                href="{{ route('order.delivarystatus',$order->id) }}">Delivary</a>
                                        </div>
                                    </div>

                                </td>

                                <td>{{ $order->payment }}</td>
                                <td class="actions">

                                    <a href="{{ route('order.details',$order->id) }}"
                                        class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-"
                                        data-toggle="tooltip" data-original-title="Details">
                                        <i class="icon-eye" aria-hidden="true"></i>
                                    </a>

                                    <!-- for deleting using one form -->
                                    <div hidden> {{$route = route('order.delete',$order->id) }}</div>
                                    <a href="{{ route('order.delete',$order->id) }}"
                                        class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                        data-toggle="tooltip" data-original-title="Remove"
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
                    <form id="delete-form" method="POST" class="d-none">
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
@endsection
