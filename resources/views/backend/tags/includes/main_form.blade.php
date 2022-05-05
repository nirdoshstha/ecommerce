<div class="card-body ">
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
        {{--  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>  --}}
        {{ Form::label('slug', 'Slug', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('slug', null, ['class'=>'form-control','id'=>'slug','placeholder'=>'Slug']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'slug'])

        </div>
      </div>



  </div>
  <!-- /.card-body -->
  <div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
  </div>
  <!-- /.card-footer -->
