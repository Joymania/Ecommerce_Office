@extends('admin.layout.master')
@section('title', 'Add New Tag')
@section('pageTitle') <a href="{{route('tags.create')}}">Add New Tag</a> @endsection
@section('parentPageTitle') <a href="{{route('tags.list')}}">Tags</a> @endsection


@section('content')

    <div class="row clearfix">

        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
                <div class="header">
                    <h2>Add New Tag</h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="body">
                                    <form action="{{route('tags.store')}}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="tagName">Tag Name</label>
                                                <input type="text" id="tagName" name="name" class="form-control" placeholder="Tag name">
                                            </div>
                                        </div>
                                        @foreach($errors->all() as $error)
                                            <p class="ml-1" style="color: red">{{$error}}</p>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary mt-3">Add Tag</button>
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
