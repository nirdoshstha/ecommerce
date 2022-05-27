{{--2nd method for show data like edit
      @if(isset($data['row']))
            {{Form::model($data['row'], ['route' => [$base_route.'update_basic_info', $data['row']->id], 'method'=>'put','files'=>'true'])}}
        @else
            {{Form::open(['route' => $base_route.'update_basic_info', 'method' => 'post', 'files'=>'true'])}}
@endif  --}}
{{Form::open(['route' => $base_route.'update_basic_info', 'method' => 'post', 'files'=>'true'])}}
<div class="form-group row mb-3">
    {{ Form::label('phone', 'Phone *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('phone', $data['row'] ? $data['row']->phone : null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'phone',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('address', 'Address', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('address', $data['row'] ? $data['row']->address : null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'address',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('dob', 'Date of Birth', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::date('dob', $data['row'] ? $data['row']->dob : null, ['class' => 'form-control', 'id' => 'dob', 'placeholder' => 'Date of Birth']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'dob',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('father_name', 'Father Name', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('father_name', $data['row'] ? $data['row']->father_name : null, ['class' => 'form-control', 'id' => 'father_name', 'placeholder' => 'Father Name']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'father_name',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('mother_name', 'Mother Name', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::text('mother_name', $data['row'] ? $data['row']->mother_name : null, ['class' => 'form-control', 'id' => 'mother_name', 'placeholder' => 'Mother Name']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'mother_name',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('image_field', 'Image', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::file('image_field', null, ['class' => 'form-control', 'id' => 'image_field']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'image_field',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('facebook_link', 'Facebook Link', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::url('facebook_link', $data['row'] ? $data['row']->facebook_link : null, ['class' => 'form-control', 'id' => 'facebook_link', 'placeholder' => 'Facebook Link']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'facebook_link',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('short_bio', 'Short Bio', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::textarea('short_bio', $data['row'] ? $data['row']->short_bio : null, ['class' => 'form-control', 'id' => 'short_bio', 'placeholder' => 'Short Bio', 'rows' => 3]) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'short_bio',])
    </div>
</div>

<button type="submit" class="btn btn-info">Submit</button>

{!! Form::close() !!}

@section('js')

@include($view_path.'includes.script');

@endsection
