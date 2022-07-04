<div class="card-body">
    <div class="form-group row mb-3">
        {{ Form::label('name', 'Name *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'name'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('address', 'Address *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'address'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('email', 'Email *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'email'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('phone', 'Phone *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'phone'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('website', 'Website *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('website', null, ['class' => 'form-control', 'id' => 'website', 'placeholder' => 'Website']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'website'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('webpan_no', 'Pan no *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('pan_no', null, ['class' => 'form-control', 'id' => 'pan_no', 'placeholder' => 'Pan no']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'pan_no'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('image_field', 'Logo', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::file('image_field', null, ['class' => 'form-control', 'id' => 'image_field']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'image_field'])
            @if(isset($data['rows']->logo))
                <img src="{{ asset('images/setting/' . $data['rows']->logo) }}" class="img-fluid" width="100px">
            @endif
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('fav_icon', 'Fab Icon *', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::text('fav_icon', null, ['class' => 'form-control', 'id' => 'fav_icon', 'placeholder' => 'Fab Icon']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'fav_icon'])
        </div>
    </div>


    <div class="form-group row mb-3">
        {{ Form::label('facebook_link', 'Facebook Link', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::url('facebook_link', null, ['class' => 'form-control', 'id' => 'facebook_link', 'placeholder' => 'Facebook Link']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'facebook_link'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('twitter_link', 'Twitter Link', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::url('twitter_link', null, ['class' => 'form-control', 'id' => 'twitter_link', 'placeholder' => 'Twitter Link']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'twitter_link'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('youtube_link', 'Youtube Link', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::url('youtube_link', null, ['class' => 'form-control', 'id' => 'youtube_link', 'placeholder' => 'Youtube Link']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'youtube_link'])
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('instagram_link', 'Instagram Link', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::url('instagram_link', null, ['class' => 'form-control', 'id' => 'instagram_link', 'placeholder' => 'Instagram Link']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'instagram_link'])
        </div>
    </div>


    <div class="form-group row mb-3">
        {{ Form::label('google_map', 'Google Map', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::url('google_map', null, ['class' => 'form-control', 'id' => 'google_map', 'placeholder' => 'Google Map']) }}
            {{--  @include('backend.includes.validation_error_messages',['fieldname' => 'google_map'])  --}}
        </div>
    </div>

    <div class="form-group row mb-3">
        {{ Form::label('shipping_type', 'Shipping Type', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::select('shipping_type',['Flat','Percentage','Free'], null, ['class' => 'form-control', 'id' => 'shipping_type', 'placeholder' => 'Select Shipping Type']) }}
            @include('backend.includes.validation_error_messages',['fieldname' => 'shipping_type'])
        </div>
    </div>

    <div class="form-group row mb-3 shipping_value">
        {{ Form::label('value', 'Value', ['class' => 'col-3 col-form-label']) }}
        <div class="col-9">
            {{ Form::number('value', null, ['class' => 'form-control', 'id' => 'value', 'placeholder' => 'Type Value']) }}
            {{--  @include('backend.includes.validation_error_messages',['fieldname' => 'value'])  --}}
        </div>
    </div>






    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('status', 'Status',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('status', 1, true) }} Active </label>
            <label class="radio-inline">
            {{ Form::radio('status',0, false) }} In-Active </label>
        </div>
    </div>

</div>


  <div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
  </div>

