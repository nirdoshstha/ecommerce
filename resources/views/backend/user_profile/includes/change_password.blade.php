{{Form::open(['route' => $base_route.'update_password', 'method' => 'post', 'files'=>'true'])}}
<div class="form-group row mb-3">
    {{ Form::label('old_password', 'Old Password *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::password('old_password', ['class' => 'form-control', 'id' => 'old_password', 'placeholder' => 'Old Password']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'old_password',])
        <span class="fas fa-eye" onclick="showOldPassword()"></span>
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('new_password', 'New Password *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::password('new_password', ['class' => 'form-control', 'id' => 'new_password', 'placeholder' => 'New Password']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'new_password',])
    </div>
</div>

<div class="form-group row mb-3">
    {{ Form::label('new_password_confirmation', 'Confirm New Password *', ['class' => 'col-3 col-form-label']) }}
    <div class="col-9">
        {{ Form::password('new_password_confirmation', ['class' => 'form-control', 'id' => 'new_password_confirmation', 'placeholder' => 'Confirm New Password']) }}
        @include('backend.includes.validation_error_messages', ['fieldname' => 'new_password_confirmation',])
    </div>
</div>

<button type="submit" class="btn btn-info">Submit</button>
{!! Form::close() !!}

<script>
    function showOldPassword()
    {
        let type = $("#old_password").attr('type');
            if(type == 'password'){
                $("#old_password").attr('type','text');
            }else{
                $("#old_password").attr('type','password');
            }
    }
</script>

{{--  @section('js')

@include($view_path.'includes.script');

@endsection  --}}

