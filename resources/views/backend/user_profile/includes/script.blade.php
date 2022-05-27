<script>
    $(document).ready(function){
        //form submit
            $('form').on('submit', function(event) {
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
                    window.location.href = "{{route($base_route.'create')}}";
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


        function showOldPassword()
        {
            let type = $("#old_password").attr('type');
                if(type == 'password'){
                    $("#old_password").attr('type','text');
                }else{
                    $("#old_password").attr('type','password');
                }
        }
</script>
