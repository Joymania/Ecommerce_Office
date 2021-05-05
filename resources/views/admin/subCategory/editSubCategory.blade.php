@extends('admin.layout.master')
@section('title', 'Edit Sub-Category')
@section('pageTitle') <a href="#">Edit Sub-Category</a> @endsection
@section('parentPageTitle') <a href="{{route('subCategory.view')}}">Sub-Categories</a> @endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h3>

            </h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('subCategory.update')}}" method="post" class="form-horizontal" id="form" enctype="multipart/form-data">
                @csrf
                <input name="id" type="hidden" class="form-control" id="fname" value="{{$edits->id}}">

                <div class="form-row col-md-6">
                    <label for="category_id">Category</label>
                    <select class="form-control col-sm-11  @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value=""  required>Select Category</option>
                        @foreach($categories as $categorie)
                            <option {{ $edits->category_id == $categorie->id ? 'selected' : null}} value="{{$categorie->id}}" required>{{$categorie->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-row col-md-6">
                    <label for="sub_category_name">Sub-category</label>
                    <input type="text" id="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror" name="sub_category_name" value="{{$edits->sub_category_name}}" required>
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

@stop
