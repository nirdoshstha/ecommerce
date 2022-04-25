@extends('backend.layouts.master')

@section('content')
<div class="card card-info">
    <div class="card-header">
<h3 class="card-title">Edit Page</h3><div class="card-header">
</div>
</div>
<!-- /.card-header -->
<!-- form start -->
{{--  <form action="{{route('test.update',['id'=>$data['rows']->id ])}}" method="POST" class="form-horizontal">
    @csrf
    @method('put')  --}}
    {{Form::model($data['rows'], ['route' => ['test.update', $data['rows']->id], 'method'=>'put'])}}
    @include('backend.test.includes.main_form')
    {!! Form::close() !!}

@endsection
