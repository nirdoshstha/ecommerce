@extends('backend.layouts.master')

@section('title')
Show Test | Admin Dashboard
@endsection

@section('content')
<div class="card card-light">
    <div class="card-header">
<h3 class="card-title">Show all details for <span class="text-primary fw-bold">{{$data['rows']->name}}</span></h3>
<a href="{{route('test.index')}}" class="btn btn-info btn-md float-right ml-2"><i class="fas fa-list"></i>List</a>
<a href="{{route('test.create')}}" class="btn btn-success btn-md float-right"><i class="fas fa-pencil-alt"></i>Create</a>

</div>

<!-- /.card-header -->
<!-- form start -->
<form action="{{route('test.store')}}" method="POST" class="form-horizontal">
    @csrf
  <div class="card-body">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="name" name="name" value="{{$data['rows']->name}}" class="form-control"   placeholder="Name" value="{{old('name')}}">
        @include('backend.includes.validation_error_messages',['fieldname'=>'name'])

        </div>
      </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email" value="{{$data['rows']->email}}" class="form-control" id="inputEmail3" placeholder="Email" value="{{old('email')}}">
         @include('backend.includes.validation_error_messages',['fieldname'=>'email'])
      </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Created Date</label>
        <div class="col-sm-10">
          <input type="name" name="name" value="{{$data['rows']->created_at}}" class="form-control"   placeholder="Name" value="{{old('name')}}">
        @include('backend.includes.validation_error_messages',['fieldname'=>'name'])
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Updated Date</label>
        <div class="col-sm-10">
          <input type="name" name="name" value="{{$data['rows']->updated_at}}" class="form-control"   placeholder="Name" value="{{old('name')}}">
        @include('backend.includes.validation_error_messages',['fieldname'=>'name'])

        </div>
      </div>


  <!-- /.card-body -->
  {{--  <div class="card-footer">
    <button type="submit" class="btn btn-info">Update</button>
  </div>  --}}
  <!-- /.card-footer -->
</form>
@endsection

@section('js')
@endsection
