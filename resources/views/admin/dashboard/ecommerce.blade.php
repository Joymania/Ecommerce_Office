@extends('admin.layout.master')
@section('title', 'eCommerce')
@section('parentPageTitle', 'Dashboard')

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
                <h3>2,318 <i class="fa fa-dollar float-right"></i></h3>
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
                <h3>68% <i class=" icon-heart float-right"></i></h3>
                <span>Customer Satisfaction</span>
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
                <h2>Annual Report <small>Description text here...</small></h2>
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
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <span class="text-muted">Sales Report</span>
                        <h3 class="text-warning">$4,516</h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <span class="text-muted">Annual Revenue </span>
                        <h3 class="text-info">$6,481</h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <span class="text-muted">Total Profit</span>
                        <h3 class="text-success">$3,915</h3>
                    </div>
                </div>
                <div id="area_chart" class="graph"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Income Analysis<small>8% High then last month</small></h2>
            </div>
            <div class="body">
                <div class="sparkline-pie text-center">6,4,8</div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2>Sales Income</h2>
            </div>
            <div class="body">
                <h6>Overall <b class="text-success">7,000</b></h6>
                <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="#445771" data-highlight-Line-Color="#222"
                    data-min-Spot-Color="#445771" data-max-Spot-Color="#445771" data-spot-Color="#445771"
                    data-offset="90" data-width="100%" data-height="95px" data-line-Width="1" data-line-Color="#ffcd55"
                    data-fill-Color="#ffcd55">2,4,3,1,5,7,3,2</div>
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
                    <table class="table table-hover">
                        <thead class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom thead-dark" >
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
                                @php($name = $orders->biling_fname)
                                @foreach($orders->products as $product)
                                    <tr>
                                        {{--<td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>--}}
                                        <td>{{$name}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$orders->biling_address}}</td>
                                        <td>{{$product->pivot->qty}}</td>
                                        @if($orders->status == 0)
                                            <td><span class="badge badge-success">PENDING</span></td>
                                        @elseif($orders->status == 1)
                                            <td><span class="badge badge-success">APPROVED</span></td>
                                        @else
                                            <td><span class="badge badge-success">APPROVED</span></td>
                                        @endif
                                        <td>{{(integer)$product->price * (integer)$product->pivot->qty}}Tk.</td>
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
                        <table class="table table-hover table-bordered table-striped">
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
