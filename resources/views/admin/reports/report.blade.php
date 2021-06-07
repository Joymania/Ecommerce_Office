@extends('admin.layout.master')
@section('title', 'Sales Report')
@section('pageTitle') <a href="{{route('sales.report')}}">Sales Report</a> @endsection
@section('parentPageTitle', '')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<div class="d-flex flex-row-reverse bd-highlight">
            <div class="btn-group">
                <button class="btn btn-primary todaybtn">Today</button>
                <button class="btn btn-primary lastsevenbtn">Last 7 Days</button>
                <button class="btn btn-primary monthbtn">Last Month</button>
                <button class="btn btn-primary date">Total Sell</button>                          
           </div>
    </div>
<div class="row">
        <div class="col-md-12">

            <div class="row clearfix">
                <div id="all" class="col-lg-12 col-md-12">
                        <h5>Total Sales Report</h5>
                        <hr>
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{$data['allp']}} <i class="icon-basket float-right"></i></h3>
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
                                <h3>{{$data['alle']}} <i class="fa fa-dollar float-right"></i></h3>
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
                                <h3>{{$data['all']}}<i class="fa fa-dollar float-right"></i></h3>
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
        <div id="today" class="col-lg-12 col-md-12">
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
        <div id="lastseven" class="col-lg-12 col-md-12">
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
        <div id="month" class="col-lg-12 col-md-12">
            <h5>Last Month's Sales Report</h5>
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
    
  {{-- report --}}
<section  class="content">
<br>
<div id="date">
    <div class="panel panel-default">
     <div class="panel-heading">
      <div class="row">
       <div class="col-md-5">Total Records <b><span id="total_records"></span></b></div>
       <div class="col-md-5">
        <div class="input-group  input-daterange">
            <input type="text" placeholder="select date" name="from_date" id="from_date" readonly class="form-control" />
            <div class="input-group-addon">&nbsp; To &nbsp;</div>
            <input type="text"  placeholder="select date" name="to_date" id="to_date" readonly class="form-control" />
        </div>
       </div>
       <div class="col-md-2">
        <button type="button" name="filter" id="filter" class="btn btn-success btn-sm">Filter</button>
        <button type="button" name="refresh" id="refresh" class="btn btn-warning btn-sm">Refresh</button>
       
       </div>
      </div>
     </div>
     <a href="/admin/export" id="e" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Excel All</a>    
     <div  class="table mt-1">
        <table id="d" class="table">

            <thead>
                <tr>
                <th>Date</th>
                <th>Biller Name</th>
                <th>Biller Phone</th>
                <th>Biller Address</th>
                <th>Products</th>
                <th>payment Method</th>
                <th>Payment Number</th>
                <th>Transaction ID</th>
                <th>Total</th>

         </tr>
        </thead>
        <tbody id="tbody">        
        </tbody >
       </table>
       {{ csrf_field() }}

      </div>
    </div>
</div>
</div>
    {{-- lastm--}}
<div id="lastr" class="table">
        <table id="l" class="table js-basic-example dataTable table-custom">
            <thead>
           <tr>
        <th>Date</th>
        <th>Biller Name</th>
        <th>Biller Phone</th>
        <th>Biller Address</th>
        <th>Products</th>
        <th>payment Method</th>
        <th>Payment Number</th>
        <th>Transaction ID</th>
        <th>Total</th>
        </tr>
        </thead>
        
        <tbody>
        <tr>
        @foreach ($last as $row)       
       <td> {{ $row->created_at->format('Y-m-d') }}</td>
        <td>{{$row->biling_fname}} {{$row->biling_lname}}</td>
        <td>{{$row->biling_phone}}</td>
        <td>{{$row->biling_address}}</td>
        <td>{{$row->qty}}</td>
        <td>{{$row->payment}}</td>
        <td>{{$row->bkash_mobile}}</td>
        <td>{{$row->transaction}}</td>
        <td>{{$row->subtotal}}</td>        
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    {{-- today --}}
<div id="todayr" class="table">
<table id="r" class="table js-basic-example dataTable table-custom">
 <thead>
<tr>
<th>Date</th>
<th>Biller Name</th>
<th>Biller Phone</th>
<th>Biller Address</th>
<th>Products</th>
<th>payment Method</th>
<th>Payment Number</th>
<th>Transaction ID</th>
<th>Total</th>
</tr>
</thead>

<tbody>
<tr>
@foreach ($today as $row)       
<td> {{ $row->created_at->format('Y-m-d') }}</td>
<td>{{$row->biling_fname}} {{$row->biling_lname}}</td>
<td>{{$row->biling_phone}}</td>
<td>{{$row->biling_address}}</td>
<td>{{$row->qty}}</td>
<td>{{$row->payment}}</td>
<td>{{$row->bkash_mobile}}</td>
<td>{{$row->transaction}}</td>
<td>{{$row->subtotal}}</td>

</tr>
@endforeach
</tbody>
</table>
</div>
{{-- seven --}}
<div id="sevenr" class="table">
        <table id="s" class="table js-basic-example dataTable table-custom">
         <thead>
        <tr>
    <th>Date</th>
    <th>Biller Name</th>
    <th>Biller Phone</th>
    <th>Biller Address</th>
    <th>Products</th>
    <th>payment Method</th>
    <th>Payment Number</th>
    <th>Transaction ID</th>
    <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    @foreach ($seven as $row)       
    <td> {{ $row->created_at->format('Y-m-d') }}</td>
    <td>{{$row->biling_fname}} {{$row->biling_lname}}</td>
    <td>{{$row->biling_phone}}</td>
    <td>{{$row->biling_address}}</td>
    <td>{{$row->qty}}</td>
    <td>{{$row->payment}}</td>
    <td>{{$row->bkash_mobile}}</td>
    <td>{{$row->transaction}}</td>
    <td>{{$row->subtotal}}</td>
    
    </tr>
    @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>

</section> 
   
<script>

var date = new Date();
 $('.input-daterange').datepicker({
  todayBtn: 'linked',
  format: 'yyyy-mm-dd',
  autoclose: true
 });
 var _token = $('input[name="_token"]').val();

 fetch_data();


function fetch_data(from_date = '', to_date = '')
{

 $.ajax({
    url:"/admin/dateby",
    type: 'post',
  data:{from_date:from_date, to_date:to_date, _token:_token},
  success:function(data)
  {
      
   var output = '';
   $('#total_records').text(data.length);
   for(var count = 0; count < data.length; count++)
   {
    output += '<tr>';
    output += '<td>' + data[count].date+ '</td>';
    output += '<td>' + data[count].biling_fname + data[count].biling_lname +'</td>';
    output += '<td>' + data[count].biling_phone + '</td>';
    output += '<td>' + data[count].biling_address + '</td>';
    output += '<td>' + data[count].qty + '</td>';
    output += '<td>' + data[count].payment + '</td>';
    output += '<td>' + data[count].bkash_mobile + '</td>';
    output += '<td>' + data[count].transaction + '</td>';
    output += '<td>' + data[count].subtotal + '</td></tr>'; 
   }
   $('#tbody').html(output);
  }
 })
}
$('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
   $('#e').hide();

  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
    $('#e').show();

  $('#from_date').val('');
  $('#to_date').val('');
  fetch_data();
 });

 
    $("#lastseven").hide();
    $("#month").hide();
    $("#sevenr").hide();
    $("#lastr").hide();
    $("#date").hide();
    $("#all").hide();




        $(".todaybtn").on("click", function() {
        $("#today").show();
        $("#todayr").show();
        $("#lastseven").hide();
        $("#month").hide();
        $("#sevenr").hide();
        $("#lastr").hide();
        $("#date").hide();
        $("#all").hide();



        });

        $(".lastsevenbtn").on("click", function() {
        $("#today").hide();
        $("#lastseven").show();
        $("#month").hide();
        $("#todayr").hide();
        $("#sevenr").show();
        $("#lastr").hide();
        $("#date").hide();
        $("#all").hide();



        });

        $(".monthbtn").on("click", function() {
        $("#today").hide();
        $("#lastseven").hide();
        $("#month").show();
        $("#todayr").hide();
        $("#sevenr").hide();
        $("#lastr").show();
        $("#date").hide();
        $("#all").hide();


        });
        $(".date").on("click", function() {
        $("#today").hide();
        $("#lastseven").hide();
        $("#month").hide();
        $("#todayr").hide();
        $("#sevenr").hide();
        $("#lastr").hide();
        $("#date").show();
        $("#all").show();


        });

        $(document).ready(function() {
     $('#r').dataTable({
   "aLengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ],
   "iDisplayLength": 5,        
       });
});




$(document).ready(function() {
    $('#s').dataTable({
   "aLengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ],
   "iDisplayLength": 5,        
       });
});

$(document).ready(function() {
  $('#l').dataTable({
   "aLengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ],
   "iDisplayLength": 5,        
       });
});

</script>
@stop

