<div class="card-body ">


    <div class="form-group row">
        {{ Form::label('title', 'Name *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('title', null, ['class'=>'form-control','id'=>'title','placeholder'=>'Name']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'title'])
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('code', 'Code *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('code', $data['code'] ?? $data['rows']->code, ['class'=>'form-control','id'=>'code','placeholder'=>'Code', 'disabled'=>isset($data['rows']) ? true : false]) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'code'])
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('start_date', 'Start Date *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::date('start_date', now(), ['class'=>'form-control','id'=>'start_date','placeholder'=>'Start Date']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'start_date'])
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('expire_date', 'Expiry Date *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::date('expire_date', now()->addDays(15), ['class'=>'form-control','id'=>'expire_date','placeholder'=>'Expiry Date']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'expire_date'])
        </div>
    </div>

    <div class="form-group row">
        {{ Form::label('discount_amount', 'Discount Amount *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::number('discount_amount', null, ['class'=>'form-control','id'=>'discount_amount','placeholder'=>'Discount Amount']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'discount_amount'])
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
