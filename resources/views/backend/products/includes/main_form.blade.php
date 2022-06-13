<div class="card-body ">
    <div class="form-group row">
        {{ Form::label('category_id', 'Category *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::select('category_id',$data['categories'], null, ['class' => 'form-control', 'id' => 'category_id', 'placeholder' => 'Please select category']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'category_id'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('subcategory_id', 'Subcategory *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::select('subcategory_id',$data['subcategories'], null, ['class' => 'form-control', 'id' => 'sub_category_id', 'placeholder' => 'Please select category']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'subcategory_id'])
        </div>
      </div>


    <div class="form-group row">
        {{ Form::label('name', 'Name *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Name']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'name'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('slug', 'Slug', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::text('slug', null, ['class'=>'form-control','id'=>'slug','placeholder'=>'Slug']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'slug'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('tag_id', 'Tags *', ['class' =>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::select('tag_id[]',$data['tags'],isset($data['rows']) ? $data['rows']->tags->pluck('id') : null, ['class' => 'form-control select2', 'id' => 'tag_id', 'multiple' => true]) }}
        </div>
    </div>


      <div class="form-group row">
        {{ Form::label('code', 'Code *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::number('code', null, ['class'=>'form-control','id'=>'code','placeholder'=>'Code']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'code'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('short_description', 'Short Description', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::textarea('short_description', null, ['class'=>'form-control ckeditor','id'=>'short_description','placeholder'=>'Description','rows'=>'3']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'short_description'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('description', 'Long Description *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::textarea('description', null, ['class'=>'form-control ckeditor','id'=>'description','placeholder'=>'Description','rows'=>'5']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'description'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('price', 'Price *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::number('price', null, ['class'=>'form-control','id'=>'price','placeholder'=>'Price']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'price'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('quantity', 'Quantity *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::number('quantity', null, ['class'=>'form-control','id'=>'quantity','placeholder'=>'Quantity']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'quantity'])
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('stock', 'Stock ', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::number('stock', null, ['class'=>'form-control','id'=>'stock','placeholder'=>'Stock']) }}
        @include('backend.includes.validation_error_messages',['fieldname'=>'stock'])
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

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('fetature_key', 'Feature key',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('feature_key', 1, true) }} Yes </label>
            <label class="radio-inline">
            {{ Form::radio('feature_key',0, false) }} No </label>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('flash_key', 'Flash key',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('flash_key', 1, true) }} Yes </label>
            <label class="radio-inline">
            {{ Form::radio('flash_key',0, false) }} No </label>
        </div>
    </div>


    <table class="table table-striped table-bordered" id="attribute_wrapper">
        <tr>
            <th>Attribute</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>
                {!! Form::select('attribute_id[]',$data['attribute'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}
            </td>
            <td>
                <input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>
            <td>
                <a class="btn btn-block btn-danger sa-warning remove_row "><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    </table>
    <button class="btn btn-info" type="button" id="addMoreAttribute" style="margin-bottom: 20px">
        <i class="fa fa-plus"></i>
        Add
    </button>

    <hr/>
    <table class="table table-striped table-bordered" id="image_wrapper">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>
                {!! Form::file('image_field[]',null,['class' => 'form-control']) !!}
            </td>
            <td>
                {{ Form::text('image_name[]',null,['class' => 'form-control','id'=>'image_name','placeholder'=>'Enter Image Name']) }}
            <td>
                <a class="btn btn-block btn-danger sa-warning remove_image "><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    </table>
    <button class="btn btn-info" type="button" id="addMoreImage" style="margin-bottom: 20px">
        <i class="fa fa-plus"></i>
        Add
    </button>



  </div>
  <!-- /.card-body -->
  <div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
  </div>
  <!-- /.card-footer -->
