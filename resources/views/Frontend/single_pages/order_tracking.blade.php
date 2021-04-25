@extends('Frontend.layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
      Order Tracking Status
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text">
          @if ($orders->status==0)
          <span class="badge bg-warning">Pending</span>
          @elseif ($orders->status==1)
          <span class="badge bg-success">Approved</span>
          @elseif ($orders->status==2)
          <span class="badge bg-success">Process</span>
          @elseif ($orders->status==3)
          <span class="badge bg-success">Delivered</span>
          @elseif ($orders->status==4)
          <span class="badge bg-success">Cancel</span>

          @endif
      </p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
@endsection

