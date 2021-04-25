@extends('Frontend.layouts.master')

@section('content')

<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order Id:#{{ $orders->id }}</h6>
            <article class="card">

            </article>
            <div class="track">
                @if ($orders['status']=='0')
                <div class="progress-bar bg-warnign" role="progressbar" style="width: 33.3%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Order Pending</div>
                 @endif
                @if ($orders['status']=='1')
                <div class="progress-bar bg-info" role="progressbar" style="width: 66.6%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Order Confirmed</div>
                @endif
                @if ($orders['status']=='2')
                <div class="progress-bar bg-success" role="progressbar" style="width: 99.9%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Picked by Courier</div>
                @endif
        </div>
    </article>
</div>
@endsection

