@extends('admin.layout.master')
@section('title', 'Insert Category')
@section('parentPageTitle', 'Dashboard')


@section('content')
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        
            <div class="body">
                <form action="{{route('subCategory.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            
                @csrf


                    <div class="form-group row">
                                        <label class="col-sm-3 text-right control-label col-form-label" for="category_id">Category</label>
                                        <select class="form-control col-sm-9" id="category_id" name="category_id" required>
                                          <option required>Select Category</option>

                                @foreach($categories as $categorie)         
                                          <option value="{{$categorie->id}}" required>{{$categorie->name}}</option>
                                @endforeach
                                        </select>
                                    </div>

                            <div class="form-group row">
                                <label for="sub_category_name" class="col-sm-3 text-right control-label col-form-label">Sub-category</label>
                                <div class="col-sm-9">
                                    <input name="sub_category_name" type="text" class="form-control @error('sub_category_name') is-invalid @enderror" id="sub_category_name" placeholder="Sub-category">

                                    {{-- validation --}}
                                @error('sub_category_name')
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
