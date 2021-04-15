@extends('admin.layout.master')
@section('title', 'jQuery Datatable')
@section('parentPageTitle', 'Table')


@section('content')

<div class="container-fluid">

    <div class="row">
      <!-- Left col -->
      <section class="col-md-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3>
              Slider List
            </h3>
            <a class=" btn btn-primary m-b-15" href="{{ route('slider.add') }}"><i class="fa fa-plus-circle"></i> Add Slider</a>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Short Title</th>
                        <th>Long Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alldata as $key=> $slider)
                    <tr>
                        <td>{{$key+1 }}</td>
                        <td>{{ $slider->short_title }}</td>
                        <td>{{ $slider->long_title }}</td>
                        <td><img src="{{ (!empty($slider->image))?url('upload/Slider_images/'.$slider->image):url('upload/noImage.jpg') }}" alt="" style="width: 120px" height="130px"></td>
                        <td class="actions">

                            <a href="{{ route('slider.edit',$slider->id) }}">
                            <button  class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                            data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                            <a href="{{ route('slider.delete',$slider->id) }}">
                            <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                            data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
          </div>
        </div>

      </section>
    </div>

  </div>
@stop
