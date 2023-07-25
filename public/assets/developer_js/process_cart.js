$(document).ready(function(){
    $(document).on('submit', '#submitForm', function(event){
        event.preventDefault();
        $.LoadingOverlay("show");
        let form_obj = $(this);
        let form_data = form_obj.serialize();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: form_obj.attr('rel'),
            type: 'POST',
            // dataType: 'JSON',
            data: form_data,
            success: function(response) {
                if(response.status == 200){
                    window.location.replace(response.data);
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    $(document).on('click', '.empty_cart_btn', function(){
        $.LoadingOverlay("show");
        let clicked_btn = $(this);
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: clicked_btn.attr('rel'),
            type: 'POST',
            dataType: 'JSON',
            success: function(response) {
                if(response.status == 200){
                    display_total(response.data.total);
                    $('.total-items').text("("+response.data.cart_items+")");
                    $('.offers-listing').empty();
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    $(document).on('click', '.process-cart', function(){
        $.LoadingOverlay("show");
        let clicked_btn = $(this);
    
        let offer_id = clicked_btn.attr('rel');
        if(offer_id == ""){
            return false;
        }
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: clicked_btn.attr('url'),
            type: 'POST',
            dataType: 'JSON',
            data: {
                offer_id: offer_id
            },
            success: function(response) {
                if(response.status == 200){
                    display_total(response.data.total);
                    $('.total-items').text("("+response.data.cart_items+")");
                    clicked_btn.text(response.data.btn_text);
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    $(document).on('click', '.remove-offer', function(){
        $.LoadingOverlay("show");
        let clicked_btn = $(this);
    
        let offer_id = clicked_btn.attr('rel');
        if(offer_id == ""){
            return false;
        }
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: clicked_btn.attr('url'),
            type: 'POST',
            dataType: 'JSON',
            data: {
                offer_id: offer_id
            },
            success: function(response) {
                if(response.status == 200){
                    display_total(response.data.total);
                    $('.total-items').text("("+response.data.cart_items+")");
                    clicked_btn.parent().parent().parent().remove();
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    $(document).on('click', '.plus-offer', function(){
        $.LoadingOverlay("show");
        let clicked_btn = $(this);
        let offer_id = clicked_btn.attr('rel');
        if(offer_id == ""){
            return false;
        }
        
        let qty_btn = clicked_btn.prev();
        let qty = qty_btn.val();
        qty = parseInt(qty);
        qty_btn.val(++qty);
        let subtotal_obj = clicked_btn.parent().next().children();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: clicked_btn.attr('url'),
            type: 'POST',
            dataType: 'JSON',
            data: {
                offer_id: offer_id,
                quantity: qty
            },
            success: function(response) {
                if(response.status == 200){
                    display_total(response.data.total);
                    subtotal_obj.text(response.data.subtotal);
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    $(document).on('click', '.minus-offer', function(){
        $.LoadingOverlay("show");
        let clicked_btn = $(this);
        let offer_id = clicked_btn.attr('rel');
        if(offer_id == ""){
            return false;
        }

        let qty_btn = clicked_btn.next();
        let qty = qty_btn.val();
        qty = parseInt(qty);
        if(qty < 2){
            $.LoadingOverlay('hide');
            return false;
        }
        qty_btn.val(--qty);
    
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            url: clicked_btn.attr('url'),
            type: 'POST',
            dataType: 'JSON',
            data: {
                offer_id: offer_id,
                quantity: qty
            },
            success: function(response) {
                if(response.status == 200){
                    display_total(response.data.total);
                }
            },
            complete: function() {
                $.LoadingOverlay('hide');
            }
        });
    });

    function display_total(total){
        $('#total-price').text("$"+total);
        $('#grand-total').text("$"+total);
    }
})