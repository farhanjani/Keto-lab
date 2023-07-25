$(document).ready(function(){

    // Log errors script
    function log_errors(errors) {
        if(errors != ""){
            $.each(errors, function (key, val) {
                $("." + key + "_error").text(val);
            });
        }
        return false;
    }


    // Update Setting script
    $(document).on('submit', '#update_setting_form', function(e){
        e.preventDefault();
        $.LoadingOverlay("show");
        var form_obj = $(this);
        var form_data= form_obj.serializeArray();
        $('.all_errors').empty();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: "/admin/update-setting",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.status == 400) {
                    if(response.errors){
                        log_errors(response.errors);
                    }
                } 
        
                if(response.status == 200){
                    form_obj.trigger("reset");
                    $("#edit_setting").modal("hide");
                    swal({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                    }).then((value) => {
                        if (value) {
                            window.location.reload();
                        }
                    });
                }
            },
            complete: function(){
                $.LoadingOverlay("hide");
            }
        });
    });

});