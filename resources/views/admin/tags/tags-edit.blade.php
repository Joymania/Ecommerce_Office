@extends('admin.layout.master')
@section('title', 'Edit Tag')
@section('pageTitle') <a href="#">Edit Tag</a> @endsection
@section('parentPageTitle') <a href="{{route('tags.list')}}">Tags</a> @endsection


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Edit Tag</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="body">
                                    <form action="{{route('tags.update',['tag'=>$tag->id])}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="sizeName">Size Name</label>
                                                <input type="text" id="sizeName" name="name" class="form-control" value="{{old('name',$tag->name)}}">
                                            </div>
                                        </div>
                                        @foreach($errors->all() as $error)
                                            <p class="ml-1" style="color: red">{{$error}}</p>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary mt-3">Update Tag</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
