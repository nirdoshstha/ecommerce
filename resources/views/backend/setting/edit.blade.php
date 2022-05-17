@extends('backend.layouts.master',['page'=>'Edit'])
@section('title','Edit'.' '.$panel)

@section('content')
<div class="card card-info">
    <div class="card-header">
<h3 class="card-title">Edit {{$panel}}</h3>
@include('backend.includes.flash_message')
</div>
<!-- /.card-header -->
<!-- form start -->
{{--  <form action="{{route('test.update',['id'=>$data['rows']->id ])}}" method="POST" class="form-horizontal">
    @csrf
    @method('put')  --}}
    {{Form::model($data['rows'], ['route' => [$base_route.'update', $data['rows']->id], 'method'=>'put','files'=>'true'])}}
    @include($view_path.'includes.main_form')
    {!! Form::close() !!}

@endsection

