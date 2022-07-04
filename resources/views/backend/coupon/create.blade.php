@extends('backend.layouts.master',['page'=>'Create'])
@section('title','Create'.' '.$panel)

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
    {{Form::open(['route' => $base_route.'store', 'method' => 'post', 'files'=>'true'])}}
        @include($view_path.'includes.main_form')
    {!! Form::close() !!}
{{--  </form>  --}}

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
