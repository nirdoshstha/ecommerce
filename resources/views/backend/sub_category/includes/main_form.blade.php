<div class="card-body ">
    <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-2 col-form-label">Name</label>  --}}
        {{ Form::label('category_id', 'Category *', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::select('category_id',$data['categories'], null, ['class' => 'form-control select2', 'id' => 'category_id', 'placeholder' => 'Please select Subcategory']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'category_id'])

        </div>
      </div>

    <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-2 col-form-label">Name</label>  --}}
        {{ Form::label('name', 'Name *', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
          {{--  <input type="name" name="name" class="form-control"   placeholder="Name" value="{{old('name')}}">  --}}

          {{Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Name']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'name'])

        </div>
      </div>

      <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-2 col-form-label">Name</label>  --}}
        {{ Form::label('rank', 'Rank', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::number('rank', null, ['class'=>'form-control','id'=>'rank','placeholder'=>'Rank']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'rank'])

        </div>
      </div>

      <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-2 col-form-label">Name</label>  --}}
        {{ Form::label('slug', 'Slug', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('slug', null, ['class'=>'form-control','id'=>'slug','placeholder'=>'Slug']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'slug'])

        </div>
      </div>

    <div class="form-group row">
        {{ Form::label('image_field', 'Image', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::file('image_field', null, ['class'=>'form-control','id'=>'image_field']) }}

           @include('backend.includes.validation_error_messages',['fieldname'=>'image_field'])
           @if(isset($data['rows']->image))
               <img src="{{asset($img_path.$data['rows']->image)}}" alt="image" class="img-fluid" width="100">
           @endif

        </div>
      </div>

      <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-2 col-form-label">Name</label>  --}}
        {{ Form::label('short_description', 'Short Description', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
          {{--  <input type="name" name="name" class="form-control"   placeholder="Name" value="{{old('name')}}">  --}}

          {{Form::textarea('short_description', null, ['class'=>'form-control ckeditor','id'=>'short_description','placeholder'=>'Description','rows'=>'3']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'short_description'])

        </div>
      </div>

      <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-2 col-form-label">Name</label>  --}}
        {{ Form::label('description', 'Long Description *', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
          {{--  <input type="name" name="name" class="form-control"   placeholder="Name" value="{{old('name')}}">  --}}

          {{Form::textarea('description', null, ['class' => 'form-control ckeditor','id'=>'description','placeholder'=>'Description','rows'=>'5']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'description'])

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
