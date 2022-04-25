@extends('backend.layouts.master')

@section('content')
<div class="card card-info">
    <div class="card-header">
<h3 class="card-title">Horizontal Form</h3><div class="card-header">
</div>
</div>
<!-- /.card-header -->
<!-- form start -->
{{--  <form action="{{route('test.store')}}" method="POST" class="form-horizontal">
    @csrf  --}}
    {{Form::open(['route' => 'test.store', 'method' => 'post'])}}
        @include('backend.test.includes.main_form')
    {!! Form::close() !!}
{{--  </form>  --}}

@endsection
