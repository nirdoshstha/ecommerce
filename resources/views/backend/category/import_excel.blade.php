@extends('backend.layouts.master',['page'=>'Import Excel'])
@section('title','Import Excel'.' '.$panel)

@section('content')
<div class="card card-info">
    <div class="card-header">
<h3 class="card-title">Import File</h3>
    <a href="{{route($base_route.'index')}}" class="btn btn-info btn-md float-right ml-2"><i class="fas fa-list"></i> List</a>

</div>
<!-- /.card-header -->


<div class="card-body ">
    <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>  --}}
        {{ Form::label('file_name', 'Import Excel *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{--  <input type="file_name" file_name="file_name" class="form-control"   placeholder="Name" value="{{old('file_name')}}">  --}}

          {{Form::file('file_name', null, ['class'=>'form-control','id'=>'file_name']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'file_name'])

        </div>
      </div>

  </div>
  <!-- /.card-body -->
  <div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
  </div>
  <!-- /.card-footer -->

  @endsection
