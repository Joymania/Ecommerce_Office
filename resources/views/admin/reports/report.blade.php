@extends('admin.layout.master')
@section('title', 'Sales Report')
@section('pageTitle') <a href="{{route('sales.report')}}">Sales Report</a> @endsection
@section('parentPageTitle', '')


@section('content')

    <div class="row">
        <div class="col-md-11 ml-auto mr-auto">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
                <h5>Today's Sales Report</h5>
                <hr>

        <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{$data['saleToday']}} <i class="icon-basket float-right"></i></h3>
                    <span>Products Sold</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal="64"></div>
                </div>
            </div>
        </div>
            <div class="col-lg-4 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{$data['expenseToday']}} <i class="fa fa-dollar float-right"></i></h3>
                        <span>Expense</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                        <div class="progress-bar" data-transitiongoal="64"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{$data['todaySellingAmount ']}}<i class="fa fa-dollar float-right"></i></h3>
                        <span>Total Selling Amount</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                        <div class="progress-bar" data-transitiongoal="64"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <h5>Last 7 Days Sales Report</h5>
            <hr>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{$data['sale7Days']}} <i class="icon-basket float-right"></i></h3>
                            <span>Products Sold</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{$data['expense7Day']}} <i class="fa fa-dollar float-right"></i></h3>
                            <span>Expense</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{$data['last7daySellingAmount']}}<i class="fa fa-dollar float-right"></i></h3>
                            <span>Total Selling Amount</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <h5>Last 30 Days Sales Report</h5>
            <hr>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{$data['sale30Days']}} <i class="icon-basket float-right"></i></h3>
                            <span>Products Sold</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{$data['expense30Day']}} <i class="fa fa-dollar float-right"></i></h3>
                            <span>Expense</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{$data['last1monthSellingAmount']}} <i class="fa fa-dollar float-right"></i></h3>
                            <span>Total Selling Amount</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@stop
