$(document).ready(function(){
    // $(document).on('click', '.import_offers', function(){
    //     $('.all_errors').empty();
    //     $('#import_campaign_offers_form').trigger('reset');

    //     var campaign_filter = $('#campaign_filter').val();
    //     if (campaign_filter !== "") {
    //         $.LoadingOverlay("show"); 
    //         $.ajax({
    //             url: '/admin/import-campaign-offers/'+campaign_filter,
    //             type: 'GET',
    //             dataType: 'JSON',
    //             success: function(response) {
    //                 if(response.status == 200){
    //                     var all_campaign_offers = '';
    //                     $.each(response.campaign_offers_data, function(index, value){
    //                         var offer_value = value.split("^");
    //                         var checked = '';
    //                         if(response.existing_campaign_offers.find(e => e.crm_id == index)){
    //                             checked = 'checked';
    //                         }
    //                         all_campaign_offers += `<div class="col-sm-6 mt-1">
    //                                 <div class="input-group">
    //                                     <div class="input-group">
    //                                         <span class="input-group-text">
    //                                             <input type="checkbox" name="campaign_offer_info[]" value="${index}^${value}" id="single_offer" ${checked}>
    //                                         </span>
    //                                     <div class="form-control campaign_offer_name">${offer_value[0]} - ${index}</div>
    //                                 </div>
    //                             </div>
    //                             </div>`;
    //                     });
    //                     $('.campaign_offer_name').html(all_campaign_offers)
    //                     $('#import_offers').modal('show');
    //                 }
    //             },
    //             complete: function() {
    //                 $.LoadingOverlay('hide');
    //             }
    //         });
    //     }else {
    //         if(campaign_filter === ""){
    //             $('.campaign_filter_error').text('This field is required');
    //         }
    //         return;
    //     }

    // });

    // $(document).on('submit', '#import_campaign_offers_form', function(e){
    //     e.preventDefault();
    //     $.LoadingOverlay("show");
    //     var form_obj = $(this);
    //     var form_data= form_obj.serializeArray();
    //     $('.all_errors').empty();
        
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
        
    //     $.ajax({
    //         type: "POST",
    //         url: "/admin/import-selected-campaign-offers",
    //         data: new FormData(this),
    //         contentType: false,
    //         processData: false,
    //         success: function (response) {
        
    //             if(response.status == 200){
    //                 form_obj.trigger("reset");
    //                 swal({
    //                     title: "Success",
    //                     text: response.message,
    //                     icon: "success",
    //                 }).then((value) => {
    //                     if (value) {
    //                         window.location.reload();
    //                     }
    //                 });
    //             }
    //         },
    //         complete: function(){
    //             $.LoadingOverlay("hide");
    //         }
    //     });

    // });

    // $("#add_offer_form select[name='campaign_id']").on('change', function(){
    //     $.LoadingOverlay('show');
    //     var campaign_id = (this.value);
    //     if(campaign_id == ""){
    //         $("#campaign_offers_listing").html("");
    //         return false;
    //     }

    //     $.ajax({
    //         url: '/admin/get-campaign-offers/' + campaign_id,
    //         type: 'GET',
    //         dataType: 'JSON',
    //         success: function(response) {
    //             if(response.status == 200){
    //                 if(response.data){
    //                     $("#campaign_offers_listing").html(response.data);
    //                 }
    //             }
    //         },
    //         complete: function() {
    //             $.LoadingOverlay('hide');
    //         }
    //     });
    // });

    // $("#update_offer_form select[name='campaign_id']").on('change', function(){
    //     $.LoadingOverlay('show');
    //     var campaign_id = (this.value);
    //     if(campaign_id == ""){
    //         $("#offer_listing_edit").html("");
    //         return false;
    //     }

    //     $.ajax({
    //         url: '/admin/get-campaign-offers/' + campaign_id,
    //         type: 'GET',
    //         dataType: 'JSON',
    //         success: function(response) {
    //             if(response.status == 200){
    //                 if(response.data){
    //                     $("#offer_listing_edit").html(response.data);
    //                 }
    //             }
    //         },
    //         complete: function() {
    //             $.LoadingOverlay('hide');
    //         }
    //     });
    // });

    $(document).on('submit', '#add_offer_form', function(e){
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
            url: "/admin/add-offer",
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

    $(document).on('submit', '#update_offer_form', function(e){
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
            url: "/admin/update-offer",
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
                    $("#edit_offer").modal("hide");
                    swal({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                    }).then((value) => {
                        if (value) {
                            $('#offers_table').DataTable().ajax.reload();
                        }
                    });
                }
            },
            complete: function(){
                $.LoadingOverlay("hide");
            }
        });
    });

    $(document).on('click', '.edit_offer_btn', function(){
        $.LoadingOverlay("show");
        $('.all_errors').empty();
        $('#update_offer_form').trigger('reset');

        var offer_id = $(this).attr('rel');
        if(offer_id == ""){
            return false;
        }

        $.ajax({
            url: '/admin/update-offer/' + offer_id,
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                if(response.status == 200){
                    $('#offer_id').val(response.data.id);
                    $('#title').val(response.data.title);
                    $('#price').val(response.data.price);
                    $('#discount').val(response.data.discount);
                    $('#description').val(response.data.description);
                    if(response.data.is_featured == 1){
                        $('input#is_featured').prop('checked', true);
                    }
                    if(response.data.image_data){
                        $('.image_data').html(response.data.image_data);
                    }else {
                        $('.image_data').html('');
                    }
                    // $('#edit_campaign_id option[value="'+response.data.campaign_id+'"]').prop('selected', true);
                    // if(response.data.campaign_offers_data){
                    //     $("#offer_listing_edit").html(response.data.campaign_offers_data);
                    //     $('#offer_listing_edit option[value="'+response.data.crm_id+'"]').prop('selected', true);
                    // } else {
                    //     $("#offer_listing_edit").html("");
                    // }
                }

                if(response.status == 404){
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                    }).then((value) => {
                        if (value) {
                            $('#offers_table').DataTable().ajax.reload();
                        }
                    });
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    $('#offers_table').dataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        searching: true,
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/get-offers-datatable',
            type: 'POST',
            data: function(d){
                d._token = $("input[name=_token]").val()
            }
        },
        columns: [
            { data: 'title' },
            { data: 'crm_id' },
            { data: 'campaign_id' },
            { data: 'price' },
            { data: 'discount' },
            { data: 'is_featured' },
            { data: 'action' }
        ],
        columnDefs: [
            { targets: [0, 3, 4, 6], orderable: false},
            { targets: [5, 6], searchable: false},
        ],
        order: [
            [0, 'ASC']
        ]
    });
    
    $(document).on('click', '.delete_offer_btn', function(){
        swal({
            title: "Warning",
            text: "Offer once deleted can not be recovered. Do you still want to continue?",
            icon: "warning",
            buttons: ['Cancel', 'Yes'],
            dangerMode: true,
        }).then((value) => {
            if(value){
                $.LoadingOverlay("show");

                var offer_id = $(this).attr('rel');
                if(offer_id == ""){
                    return false;
                }

                $.ajax({
                    url: '/admin/delete-offer/' + offer_id,
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
                                    $('#offers_table').DataTable().ajax.reload();
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

    $(document).on('click', '.approve_offer_btn', function(){
        swal({
            title: "Warning",
            text: "Do you want to approve this offer?",
            icon: "warning",
            buttons: ['Cancel', 'Yes'],
            dangerMode: true,
        }).then((value) => {
            if(value){
                $.LoadingOverlay("show");

                var offer_id = $(this).attr('rel');
                if(offer_id == ""){
                    return false;
                }

                $.ajax({
                    url: '/admin/approve-offer/' + offer_id,
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
                                    $('#offers_table').DataTable().ajax.reload();
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

    $(document).on('click', '.reject_offer_btn', function(){
        swal({
            title: "Warning",
            text: "Do you want to reject this offer?",
            icon: "warning",
            buttons: ['Cancel', 'Yes'],
            dangerMode: true,
        }).then((value) => {
            if(value){
                $.LoadingOverlay("show");

                var offer_id = $(this).attr('rel');
                if(offer_id == ""){
                    return false;
                }

                $.ajax({
                    url: '/admin/reject-offer/' + offer_id,
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
                                    $('#offers_table').DataTable().ajax.reload();
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

    function log_errors(errors) {
        if(errors != ""){
            $.each(errors, function (key, val) {
                $("." + key + "_error").text(val);
            });
        }
        return false;
    }

});
