<div class="card-body ">
    <div class="form-group row">
        {{ Form::label('parent_id', 'Parent ', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::select('parent_id',$data['parent_id'], null, ['class'=>'form-control','id'=>'parent_id','placeholder'=>'Please Select Parent']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'parent_id'])
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('title', 'Title *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('title', null, ['class'=>'form-control','id'=>'title','placeholder'=>'Title']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'title'])
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('rank', 'Rank *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::number('rank', null, ['class'=>'form-control','id'=>'rank','placeholder'=>'Rank']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'rank'])
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('route', 'Route *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('route', null, ['class'=>'form-control','id'=>'route','placeholder'=>'Route']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'route'])
        </div>
    </div>

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('status', 'Status',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('status', 1, true) }} Hide </label>
            <label class="radio-inline">
            {{ Form::radio('status',0, false) }} Show </label>
        </div>
    </div>



  </div>
  <!-- /.card-body -->
  <div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
  </div>
  <!-- /.card-footer -->
