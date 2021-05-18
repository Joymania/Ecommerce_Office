@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('pageTitle') <a href="{{route('admin.dashboard')}}">Dashboard</a> @endsection
@section('parentPageTitle', '')

@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$sales}} <i class="icon-basket-loaded float-right"></i></h3>
                <span>Products Sold</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                <div class="progress-bar" data-transitiongoal="64"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$customers}} <i class="icon-user-follow float-right"></i></h3>
                <span>Total Customers</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                <div class="progress-bar" data-transitiongoal="67"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['netProfit']}}<small>tk.</small> <i class="fa fa-dollar float-right"></i></h3>
                <span>Net Profit</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                <div class="progress-bar" data-transitiongoal="89"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['customerSatisfaction']}} <i class=" icon-heart float-right"></i></h3>
                <span>Customer Reviews</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                <div class="progress-bar" data-transitiongoal="68"></div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['pending']}} <i class="icon-hourglass float-right"></i></h3>
                <span>Order Pending</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                <div class="progress-bar" data-transitiongoal="64"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['processing']}} <i class="fa fa-cogs float-right"></i></h3>
                <span>Order Processing</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                <div class="progress-bar" data-transitiongoal="67"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['completed']}} <i class="fa fa-check-square-o float-right"></i></h3>
                <span>Order Complete</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                <div class="progress-bar" data-transitiongoal="89"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card overflowhidden">
            <div class="body">
                <h3>{{$data['totalItems']}} <i class="fa fa-archive float-right"></i></h3>
                <span>Total Items</span>
            </div>
            <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                <div class="progress-bar" data-transitiongoal="68"></div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Current Report <small>Description text here...</small></h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <span class="text-muted">Total Expense</span>
                        <h3 class="text-warning">{{$data['totalExpense']}}<small>tk.</small></h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <span class="text-muted">Total Purchase</span>
                        <h3 class="text-info">{{$data['totalPurchase']}}<small>tk.</small></h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <span class="text-muted">Total Sales</span>
                        <h3 class="text-success">{{$data['totalSales']}}<small>tk.</small></h3>
                    </div>
                </div>
                <div id="area_chart" class="graph"></div>
            </div>
        </div>
    </div>

</div>

<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Recent Transactions</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table table-bordered table-hover table-striped js-basic-example dataTable table-custom">
                        <thead class="thead-dark">
                            <tr>
                                {{--<th style="width:60px;">#</th>--}}
                                <th>Name</th>
                                <th>Item</th>
                                <th>Address</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count((array)$recentOrders) > 0)
                            @foreach($recentOrders as $orders)
                                @foreach($orders->products as $product)
                                <tr>
                                    <td>{{$orders->biling_fname}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$orders->biling_address}}</td>
                                    <td>{{$product->pivot->qty}}</td>
                                    @if($orders->status == 0)
                                        <td><span class="badge badge-danger">PENDING</span></td>
                                    @elseif($orders->status == 1)
                                        <td><span class="badge badge-warning">APPROVED</span></td>
                                    @elseif($orders->status == 2)
                                        <td><span class="badge badge-success">DELIVERED</span></td>
                                    @endif

                                    @if(empty($product->promo_price))
                                    <td>{{(integer)$product->price * (integer)$product->pivot->qty}}Tk.</td>
                                    @else
                                        <td>{{(integer)$product->promo_price * (integer)$product->pivot->qty}}Tk.</td>
                                    @endif
                                </tr>
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>Top Selling Products</h2>
            </div>
            <div class="body">
                <div id="world-map-markers" class="jvector-map" style="height: 300px">
                    <div class="table-responsive">
                        <table id="" class="table table-hover table-bordered table-striped">
                            <thead class="thead-success">
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($i = 0)
                            @foreach($tsp as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$a[$i]->total_sales}}</td>
                            </tr>
                            @php($i++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="col-lg-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2>New Orders</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-success">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newOrders as $order)
                            @php($name = $order->biling_fname)
                            @foreach($order->products as $product)
                                <tr>
                                    <td>01</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$name}}</td>
                                    <td>{{(integer)$product->price * (integer)$product->pivot->qty}}Tk.</td>
                                </tr>
                                @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>--}}
</div>

@stop

