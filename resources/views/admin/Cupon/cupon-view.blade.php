@extends('admin.layout.master')
@section('title', 'jQuery Datatable')
@section('parentPageTitle', 'Table')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Cupon List</h2>
            </div>
            <div class="body">
                {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                </button>  --}}
                <a class=" btn btn-primary m-b-15" href="{{ route('cupon.add') }}"><i class="fa fa-plus-circle"></i> Add Cupon</a>
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Cupon</th>
                            <th>Discount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $key=>$cupon)
                            <tr class="gradeA">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $cupon->cupon }}</td>
                            <td>{{ $cupon->discount }}</td>
                            <td class="actions">
                                <a href="{{ route('cupon.delete',$cupon->id) }}">
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

@stop
