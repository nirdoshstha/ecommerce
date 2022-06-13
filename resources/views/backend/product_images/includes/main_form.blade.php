<div class="card-body ">

    <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>  --}}
        {{ Form::label('product_id', 'Product Name *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{--  <input type="product_id" product_id="product_id" class="form-control"   placeholder="Product Id" value="{{old('product_id')}}">  --}}

          {{Form::select('product_id', $data['product'],null, ['class'=>'form-control select2','id'=>'product_id','placeholder'=>'Product Id']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'product_id'])

        </div>
      </div>

    <div class="form-group row">
        {{--  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>  --}}
        {{ Form::label('name', 'Name *', ['class'=>'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
          {{--  <input type="name" name="name" class="form-control"   placeholder="Name" value="{{old('name')}}">  --}}

          {{Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Name']) }}

        @include('backend.includes.validation_error_messages',['fieldname'=>'name'])

        </div>
      </div>

      <table class="table table-striped table-bordered" id="attribute_wrapper">
      <div class="form-group row">
        {{ Form::label('image_field', 'Image', ['class'=>'col-2 col-form-label']) }}
        <div class="col-sm-10">
          {{Form::file('image_field[]', null, ['class'=>'form-control','id'=>'image_field']) }}

           @include('backend.includes.validation_error_messages',['fieldname'=>'image_field'])
           @if(isset($data['rows']->image))
               <img src="{{asset($img_path.$data['rows']->image)}}" alt="image" class="img-fluid" width="100">
           @endif
        </div>
    </table>
           <button class="btn btn-info" type="button" id="addMoreAttribute" style="margin-bottom: 20px">
            <i class="fa fa-plus"></i>
            Add
        </button>

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


  <script>
    var y=1;
    $('#addMoreAttribute').click(function(){
        var max_limit = 5;
        if(y < max_limit)
        {
            y++;
            $("#attribute_wrapper tr:last").after(
        '<tr>'+
        '   <td><input type="text" name="image_field[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
        '   <td>'+
        '       <a class="btn btn-block btn-danger sa-warning remove_row"><i class="fa fa-trash"></i></a>'+
        '   </td>'+
        '</tr>'
    );
        }

        else{
            alert('Max Attribute limit is 5');
        }

});
  </script>
