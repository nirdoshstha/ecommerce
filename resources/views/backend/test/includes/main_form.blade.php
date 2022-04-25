<div class="card-body">
    <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>  --}}
        {{ Form::label('name', 'Name *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{--  <input type="name" name="name" class="form-control"   placeholder="Name" value="{{old('name')}}">  --}}

          {{Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Name']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'name'])

        </div>
      </div>
    <div class="form-group row">
      {{--  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>  --}}
      {{ Form::label('email', 'Email *', ['class'=>'col-sm-2 col-form-label']) }}
      <div class="col-sm-10">
        {{--  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{old('email')}}">  --}}
        {{Form::text('email', null, ['class'=>'form-control','id'=>'email','placeholder'=>'Email']) }}

         @include('backend.includes.validation_error_messages',['fieldname'=>'email'])

      </div>
    </div>

  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-info">Submit</button>
  </div>
  <!-- /.card-footer -->
