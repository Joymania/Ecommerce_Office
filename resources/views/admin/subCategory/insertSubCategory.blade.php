@extends('admin.layout.master')
@section('title', 'Add Sub Category')
@section('parentPageTitle') <a href="{{route('subCategory.view')}}">Sub Categories</a> @endsection
@section('pageTitle') <a href="#">Add Sub Category</a> @endsection


@section('content')
    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <form method="post" action="{{route('subCategory.store')}}" method="post" class="form-horizontal"
                          id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row col-md-6">
                            <label for="category_id">Category</label>
                            <select class="form-control col-sm-11 @error('category_id') is-invalid @enderror" id="category_id" id="category_id" name="category_id" required autofocus>
                                <option value="">Select Category</option>
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}" required>{{$categorie->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Category Name is required</strong>
                                </span>
                            @enderror
                    
                        </div>

                        <div class="form-row col-md-6">
                            <label for="sub_category_name">Sub-category</label>
                            <input type="text" id="sub_category_name"
                                   class="form-control @error('sub_category_name') is-invalid @enderror"
                                   name="sub_category_name" placeholder="Sub-category" required>
                            @error('sub_category_name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>                  
                            @enderror
                        </div>

                        <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>

                        </div>

                    </form>
                </div>

            </div>
</div>
</div>

@stop
