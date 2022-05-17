<script>
    $("#name").keyup(function(){
        let name = $(this).val();
        let slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $("#slug").val(slug);
    });
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        // $('.ckeditor').ckeditor();
        // script
        $('#category_id').on('change', function() {
        let category_id = $(this).val();
        if(category_id.length > 0){
            $.ajax({
            url: "{{route('products.get_sub_category')}}",
            data: {_token: "{{csrf_token()}}", category_id: category_id},
            dataType: "JSON",
            method: "POST",
            success: function(resp) {
            $('#sub_category_id').children('option').not(':first').remove();
                $.each(resp, (key, value) => {
                    $('#sub_category_id').append('<option value=' + key + '>' + value + '</option>');
                })
                },
            })
        }
        else{
            $('#sub_category_id').children('option').not(':first').remove();
        }
        });

        var y=1;
            $('#addMoreAttribute').click(function(){
                var max_limit = 5;
                if(y < max_limit)
                {
                    y++;
                    $("#attribute_wrapper tr:last").after(
                '<tr>'+
                '  <td>{!! Form::select('attribute_id[]',$data['attribute'],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}'+
                '   </td>'+
                '   <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
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


        //Remove

        $(document).on("click",".remove_row",function() {
            y--;
            $(this).parents("tr").remove();
        });


        //form submit
    $('form#main_form').on('submit', function(event) {
        event.preventDefault();
        let route = $(this).attr('action');
        let method = $(this).attr('method');
        let data = new FormData(this);
        $.ajax({
          url: route,
          data: data,
          method: method,
          dataType: "JSON",
          contentType: false,
          cache: false,
          processData: false,
          success: function(res) {
            window.location.href = "{{route($base_route.'index')}}";
          },
          error: function(err) {
            $('span.text-danger').remove();
            if (err.responseJSON.errors) {
              $.each(err.responseJSON.errors, function(key, value) {
                let splitted_key = key.split('.');
                if (splitted_key.length > 1) {
                  $("<span class='text-danger'>" + value + "<br></span>").insertAfter($("[name='" + splitted_key[0] + "[]']")[splitted_key[1]]);
                }
                $('#' + key).after("<span class='text-danger'>" + value + "<br></span>");
              });
            }
          },
        });
      });


    });
</script>
