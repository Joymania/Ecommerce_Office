@extends('admin.layout.master')
@section('title','Contacts')
@section('pageTitle')<a href="{{route("contact.view")}}">Contacts</a> @endsection
@section('parentPageTitle')  @endsection

@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Contact List</h2>
            </div>
            <div class="body">
                {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                </button>  --}}
                <a class=" btn btn-primary m-b-15" href="{{ route('contact.add') }}"><i class="fa fa-plus-circle"></i> Add contact</a>
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped js-basic-example dataTable table-custom" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Youtube</th>
                            <th>Instagram</th>
                            <th>Pioneer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $key=>$contact)
                            <tr class="gradeA">
                                <td>{{$key+1 }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->mobile_no }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->facebook }}</td>
                                <td>{{ $contact->twitter }}</td>
                                <td>{{ $contact->youtube }}</td>
                                <td>{{ $contact->instagram }}</td>
                                <td>{{ $contact->pioneer }}</td>
                            <td class="actions">

                                <a href="{{ route('contact.edit',$contact->id) }}">
                                <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                                <a href="{{ route('contact.delete',$contact->id) }}">
                                <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                        data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button></a>

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


@if(session()->has('success_msg'))
@section('page-script')
    $(document).ready(function(){
    toastr.options.timeOut = "3500";
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-top-right';
    toastr['success']('{{session('success_msg')}}');
    });
@endsection
@endif

@stop
