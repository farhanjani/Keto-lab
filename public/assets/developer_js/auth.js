$(document).ready(function(){
    // Admin login script
    $(document).on('submit', '#admin_login', function (e) {
        e.preventDefault();
        $.LoadingOverlay("show");
        $('.all_errors').empty();
        var form_obj = $(this);
        var form_data= form_obj.serializeArray();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/admin/login-processing",
            data: form_data,
            dataType: "JSON",
            success: function (response) {
                console.log(response.redirect_url);
                if(response.status == 400) {
                    if(response.errors){
                        log_errors(response.errors);
                    }
                }

                if(response.status == 200){
                    form_obj.trigger("reset");
                    swal({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        buttons: false
                    });
                    setTimeout(function(){
                        window.location.href = response.redirect_url;
                    }, 1000);
                }

                if(response.status == 404){
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                    });
                }

                if(response.status == 401){
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                    });
                }
            },
            complete: function(){
                $.LoadingOverlay("hide");
            }
        });

    });

    // Log errors script
    function log_errors(errors) {
        if(errors != ""){
            $.each(errors, function (key, val) {
                $("." + key + "_error").text(val);
            });
        }
        return false;
    }
});
