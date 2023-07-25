$(document).ready(function(){
    // Import upsell_product script
    $(document).on('submit', '#import_upsell_product_form', function(e){
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
            url: "/admin/import-selected-upsell-products",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
        
                if(response.status == 200){
                    form_obj.trigger("reset");
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

    // Add upsell_product script
    $(document).on('submit', '#add_upsell_product_form', function(e){
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
            url: "/admin/add-upsell-product",
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


    // Log errors script
    function log_errors(errors) {
        if(errors != ""){
            $.each(errors, function (key, val) {
                $("." + key + "_error").text(val);
            });
        }
        return false;
    }

    // Load upsell_products datatable script
    $('#upsell_products_table').dataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        searching: true,
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/get-upsell-products-datatable',
            type: 'POST',
            data: function(d){
                d._token = $("input[name=_token]").val();
            }
        },
        columns: [
            { data: 'title' },
            { data: 'upsell_crm_id' },
            { data: 'campaign_id' },
            { data: 'price' },
            { data: 'action' }
        ],
        columnDefs: [
            { targets: [0, 3, 4], orderable: false},
            { targets: [4], searchable: false},
        ],
        order: [
            [0, 'ASC']
        ]
    });

    // Delete upsell_product script
    $(document).on('click', '.delete_upsell_product_btn', function(){
    
        swal({
            title: "Warning",
            text: "Upsell Product once deleted can not be recovered. Do you still want to continue?",
            icon: "warning",
            buttons: ['Cancel', 'Yes'],
            dangerMode: true,
        }).then((value) => {
            if(value){
                $.LoadingOverlay("show"); 
        
                var upsell_product_id = $(this).attr('rel');
                if(upsell_product_id == ""){
                    return false;
                }

                $.ajax({
                    url: '/admin/delete-upsell-product/' + upsell_product_id,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(response) {
                        if(response.status == 200){
                            swal({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                            }).then((value) => {
                                if (value) {
                                    $('#upsell_products_table').DataTable().ajax.reload();
                                }
                            });
                        }
        
                        if(response.status == 404){
                            swal({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                            }).then((value) => {
                                if (value) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                    complete: function() {
                        $.LoadingOverlay('hide');
                    }
                });
            }
        });
    });

    // Approve upsell_product script
    $(document).on('click', '.approve_upsell_product_btn', function(){
    
        swal({
            title: "Warning",
            text: "Do you want to approve this upsell?",
            icon: "warning",
            buttons: ['Cancel', 'Yes'],
            dangerMode: true,
        }).then((value) => {
            if(value){
                $.LoadingOverlay("show"); 
        
                var upsell_product_id = $(this).attr('rel');
                if(upsell_product_id == ""){
                    return false;
                }

                $.ajax({
                    url: '/admin/approve-upsell-product/' + upsell_product_id,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(response) {
                        if(response.status == 200){
                            swal({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                            }).then((value) => {
                                if (value) {
                                    $('#upsell_products_table').DataTable().ajax.reload();
                                }
                            });
                        }
        
                        if(response.status == 404){
                            swal({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                            }).then((value) => {
                                if (value) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                    complete: function() {
                        $.LoadingOverlay('hide');
                    }
                });
            }
        });
    });

    // Reject upsell_product script
    $(document).on('click', '.reject_upsell_product_btn', function(){
    
        swal({
            title: "Warning",
            text: "Do you want to reject this upsell?",
            icon: "warning",
            buttons: ['Cancel', 'Yes'],
            dangerMode: true,
        }).then((value) => {
            if(value){
                $.LoadingOverlay("show"); 
        
                var upsell_product_id = $(this).attr('rel');
                if(upsell_product_id == ""){
                    return false;
                }

                $.ajax({
                    url: '/admin/reject-upsell-product/' + upsell_product_id,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(response) {
                        if(response.status == 200){
                            swal({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                            }).then((value) => {
                                if (value) {
                                    $('#upsell_products_table').DataTable().ajax.reload();
                                }
                            });
                        }
        
                        if(response.status == 404){
                            swal({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                            }).then((value) => {
                                if (value) {
                                    window.location.reload();
                                }
                            });
                        }
                    },
                    complete: function() {
                        $.LoadingOverlay('hide');
                    }
                });
            }
        });
    });

    // Update upsell_product modal
    $(document).on('click', '.edit_upsell_product_btn', function(){
        $.LoadingOverlay("show"); 
        $('input').attr('readonly', false);
        $('.all_errors').empty();
        $('#update_upsell_product_form').trigger('reset');

        var upsell_product_id = $(this).attr('rel');
        if(upsell_product_id == ""){
            return false;
        }

        $.ajax({
            url: '/admin/update-upsell-product/' + upsell_product_id,
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {

                if(response.status == 200){
                    console.log(response.data);
                    $('#upsell_product_id').val(response.data.id);
                    $('#title').val(response.data.title);
                    $('#upsell_crm_id').val(response.data.upsell_crm_id);
                    // $('#features').val(response.data.features);
                    // $('#btn_title').val(response.data.btn_title);
                    $('#description').val(response.data.description);
                    $('#price').val(response.data.price);
                    $('#discounted_price').val(response.data.discounted_price);
                    $('#slug').val(response.data.slug);
                    if(response.data.image_data){
                        $('.image_data').html(response.data.image_data);
                    }
                    if (response.data.campaign_id) {
                        $('#campaign_id option[value="' + response.data.campaign_id + '"]').prop('selected', true);
                    }
                }

                if(response.status == 404){
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                    }).then((value) => {
                        if (value) {
                            $('#upsell_products_table').DataTable().ajax.reload();
                        }
                    });
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    // Import upsell_product modal
    $(document).on('click', '.import_upsell_products', function(){
        $('.all_errors').empty();
        $('#import_upsell_product_form').trigger('reset');
        var campaign_filter = $('#campaign_filter').val();
        
        if(campaign_filter !== ""){
            $.LoadingOverlay("show"); 
            $.ajax({
                url: '/admin/import-upsell-products/'+campaign_filter,
                type: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    if(response.status == 200){
                        var all_upsell_products = '';
                        $.each(response.upsell_products_data, function(index, value){
                            var upsell_value = value.split("^");
                            var checked = '';
                            if(response.existing_upsell_products.find(e => e.upsell_crm_id == index)){
                                checked = 'checked';
                            }
                            all_upsell_products += `<div class="col-sm-6 mt-1">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <input type="checkbox" name="upsell_product_info[]" value="${index}^${value}" id="single_upsell_product" ${checked}>
                                            </span>
                                        <div class="form-control upsell_product_name">${upsell_value[0]} - ${index}</div>
                                    </div>
                                </div>
                                </div>`;
                        });
                        $('#import_upsell_products').modal('show');
                        $('.upsell_product_name').html(all_upsell_products)
                    }
                },
                complete: function() {
                    $.LoadingOverlay('hide');
                }
            });
        }else {
            $('.campaign_filter_error').text('This field is required');
        }

    });

    // Update Upsell Product script
    $(document).on('submit', '#update_upsell_product_form', function(e){
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
            url: "/admin/update-upsell-product",
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
                    $("#edit_upsell_product").modal("hide");
                    swal({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                    }).then((value) => {
                        if (value) {
                            $('#upsell_products_table').DataTable().ajax.reload();
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