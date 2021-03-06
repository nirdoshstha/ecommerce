@extends('backend.layouts.master',['page'=>'Create'])
@section('title','Create'.' '.$panel)

@section('css')
    <style>
        .select2-selection__choice{
            background-color : #1c21ccd0 !important;
        }
    </style>
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
<h3 class="card-title">Add Details {{$panel}}</h3>
    <a href="{{route($base_route.'index')}}" class="btn btn-info btn-md float-right ml-2"><i class="fas fa-list"></i> List</a>
</div>
<!-- /.card-header -->
<!-- form start -->
{{--  <form action="{{route('test.store')}}" method="POST" class="form-horizontal">
    @csrf  --}}
    {{Form::open(['route' => $base_route.'store', 'method' => 'post', 'files'=>'true', 'id'=>'main_form'])}}
        @include($view_path.'includes.main_form')
    {!! Form::close() !!}
{{--  </form>  --}}

@endsection

@section('js')

@include($view_path.'includes.script');

@endsection
