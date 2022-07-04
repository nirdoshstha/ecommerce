@extends('backend.layouts.master',['page'=>'Create'])
@section('title','Create'.' '.$panel)

@section('content')
<div class="card card-info">
    <div class="card-header">
<h3 class="card-title">Add Details {{$panel}}</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
{{--  <form action="{{route('test.store')}}" method="POST" class="form-horizontal">
    @csrf  --}}
    {{Form::open(['route' => $base_route.'store', 'method' => 'post', 'files'=>'true', 'id'=>'main_form', 'files'=>'true'])}}
        @include($view_path.'includes.main_form')
    {!! Form::close() !!}
{{--  </form>  --}}

@endsection

@section('js')
   @include($view_path.'includes.script')
@endsection

