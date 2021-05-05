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
                @if(session()->has('success_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success_msg') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="body">
                {{--  <button id="addToTable" class="btn btn-primary m-b-15" type="button">
                    <i class="icon wb-plus" aria-hidden="true"></i> Add Brand
                </button>  --}}
                <a class=" btn btn-primary m-b-15" href="{{ route('contact.add') }}"><i class="fa fa-plus-circle"></i> Add contact</a>
                <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
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
