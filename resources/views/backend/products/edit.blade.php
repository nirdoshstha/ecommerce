@extends('backend.layouts.master',['page'=>'Edit'])
@section('title','Edit'.' '.$panel)

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
<h3 class="card-title">Edit Page of {{$panel}}</h3>
<a href="{{route($base_route.'index')}}" class="btn btn-info btn-md float-right ml-2"><i class="fas fa-list"></i>List</a>
<a href="{{route($base_route.'create')}}" class="btn btn-success btn-md float-right"><i class="fas fa-pencil-alt"></i>Create</a>

</div>
<!-- /.card-header -->
<!-- form start -->
{{--  <form action="{{route('test.update',['id'=>$data['rows']->id ])}}" method="POST" class="form-horizontal">
    @csrf
    @method('put')  --}}
    {{--  {{ Form::model($data['row'], ['route' => [$base_route.'update', $data['row']->id],'method' => 'put','id' => 'main_form']) }}  --}}
    {{Form::model($data['rows'], ['route' => [$base_route.'update', $data['rows']->id], 'method'=>'put','id' => 'main_form', 'files'=>'true'])}}
    @include($view_path.'includes.main_form')
    {!! Form::close() !!}

@endsection

@section('js')

@include($view_path.'includes.script');
@endsection
