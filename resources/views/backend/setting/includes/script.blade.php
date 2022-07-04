<script>
    $(document).ready(function(){

        if("{{isset($data['rows'])}}"){
                if("{{$data['rows']->shipping_type==2}}")
                {
                    $('.shipping_value').hide();
                }
        }
        else{
            $('.shipping_value').hide();
        }



        $('#shipping_type').change(function(){
           let shipping_type = $(this).val();
           if(shipping_type.length>0)// For Choose Shipping Type not input value shown
           {
                    if(shipping_type==0 || shipping_type==1)//0= Flat, 1=Percentage, 2=Free
                {
                    $('.shipping_value').show();
                }
                else{
                    $('.shipping_value').hide();
                }
           }
           else{
            $('.shipping_value').hide();
           }

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
            window.location.href = res.url;

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
