@extends('admin.layout.master')
@section('title', 'Insert Expense Category')
@section('parentPageTitle', 'Dashboard')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        
            <div class="body">
                <div id="errorElement "></div>

                <form action="{{route('expenseCategory.store')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
                            
                @csrf                      


                            <div class="form-group row col-md-10">
                                <label for="name" class="col-sm-4 text-right control-label col-form-label">Expense Category Name</label>
                                <div class="col-sm-8">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="Category Name Here" >

                                    {{-- validation --}}
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                    
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
