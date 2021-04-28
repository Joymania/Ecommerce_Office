@extends('admin.layout.master')
@section('title', 'Add Logo')
@section('pageTitle') <a href="{{route('logo.add')}}">Add Logo</a> @endsection
@section('parentPageTitle') <a href="{{route('logo.view')}}">Logo</a> @endsection


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="body">
                <div id="errorElement "></div>

                <form action="{{route('logo.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">

                @csrf


                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label">Logo Image</label>
                                <div class="col-sm-9">
                                    <input name="image" type="file" class="form-control " id="image" @error('name') is-invalid @enderror>

                                    {{-- validation --}}
                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="createdBy" class="col-sm-3 text-right control-label col-form-label">Created By</label>
                                <div class="col-sm-9">
                                    <input name="createdBy" type="text" class="form-control" id="createdBy" placeholder="Created By">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="updatedBy" class="col-sm-3 text-right control-label col-form-label">Updated By</label>
                                <div class="col-sm-9">
                                    <input name="updatedBy" type="text" class="form-control" id="updatedBy" placeholder="Updated By">
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@stop
