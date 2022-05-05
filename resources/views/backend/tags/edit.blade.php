@extends('backend.layouts.master',['page'=>'Edit'])
@section('title','Edit'.' '.$panel)

@section('content')
<div class="card card-info">
    <div class="card-header">
<h3 class="card-title">Edit Page of {{$panel}}</h3><div class="card-header">
    <a href="{{route($base_route.'index')}}" class="btn btn-info btn-md float-right ml-2"><i class="fas fa-list"></i>List</a>
<a href="{{route($base_route.'create')}}" class="btn btn-success btn-md float-right"><i class="fas fa-pencil-alt"></i>Create</a>
</div>
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

@section('js')
<script>
    $("#name").keyup(function(){
        let name = $(this).val();
        let slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $("#slug").val(slug);
    });
</script>
@endsection
