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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        // $('.ckeditor').ckeditor();
        // script
        $('#category_id').on('change', function() {
        let category_id = $(this).val();
        if(category_id.length > 0){
            $.ajax({
            url: "{{route('products.get_sub_category')}}",
            data: {_token: "{{csrf_token()}}", category_id: category_id},
            dataType: "JSON",
            method: "POST",
            success: function(resp) {
            $('#sub_category_id').children('option').not(':first').remove();
                $.each(resp, (key, value) => {
                    $('#sub_category_id').append('<option value=' + key + '>' + value + '</option>');
                })
                },
            })
        }
        else{
            $('#sub_category_id').children('option').not(':first').remove();
        }
        });
    });
</script>

@endsection
