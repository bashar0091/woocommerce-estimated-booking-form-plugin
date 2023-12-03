jQuery(document).ready(function($) {
    
    'use strict';
    $('.estimated_calendar').datetimepicker({
        step: 5,
        format:'d-m-Y H:i',
    });

    // fixed location logical show hide
    $('.price_range_select').on('change', function(){
        var get_val = $(this).val();
        if(get_val == 'fixed_price') {
        
            $('.price_range_show').attr('name','price_range');
            $('.price_range_show').show();
            $('.estimated_addresss_first').hide();
            $('.price_range_show option:first-child').prop('selected', true);
            
            $('.estimated_addresss_first').val($('.price_range_show option:first-child').text());
            
        } else {
        
        	$('.price_range_show').attr('name','');
            $('.price_range_show').hide();
            $('.estimated_addresss_first').show();
            $('.estimated_addresss_first').val('');
        }
    });   
    
    // fixed location price value in input
    $('.price_range_show').on('change', function(){
    
        var get_text = $(this).find('option:selected').text();
        $('.estimated_addresss_first').val(get_text);
        
    }); 

    // toggleClass button active deactive 
    $('.toogle_switch_outer').click(function(){
        $(this).toggleClass('active');
        $('.fare_retour').toggleClass('fare_retour_disable');

        var currentValue = $('#checkout_return_yes').val();
        if (currentValue === '') {
            $('#checkout_return_yes').val('return_yes');
        } else {
            $('#checkout_return_yes').val('');
        }

    });

    // location script 
    $('.location_edit').click(function() {
        $('.popup_location').addClass('show');
    });

    $('.location_update').click(function() {
        var estimated_addresss_first = $('.estimated_addresss_first').val();
        var estimated_addresss_last = $('.estimated_addresss_last').val();

        $('.location_first').text(estimated_addresss_first);
        $('.location_last').text(estimated_addresss_last);
        
        $('.popup_location').removeClass('show');
    });

    $('.location_cancel').click(function() {
        $('.popup_location').removeClass('show');
    });


    // popular_location click to field show 
    $('.popular_location_click .elementor-widget-wrap').click(function(){
        var location_text = $(this).find('.location_title .elementor-heading-title').text();
        sessionStorage.setItem("location_text_session", location_text);

        window.location.href = `/`;
    });

    var location_session_get = sessionStorage.getItem("location_text_session");
    if(location_session_get){
        $('.estimated_addresss_last').val(location_session_get);
    }

    // session remove 
    $('.back_arrow_first').click(function(){
        sessionStorage.removeItem("location_text_session")
    });

    // flight number 
    $('.flight_number').on('input', function() {
        var flight_num = $(this).val();
        // $('.flight_number').val(flight_num);
        $('#flight_number').val(flight_num);
    });

    // bagage popup open 
    $('.baggage_popup_click').click(function() {
        $('.baggage_popup_box').addClass('show');
    });

    // bagage popup close 
    $('.baggage_popup_close').click(function() {
        $('.baggage_popup_box').removeClass('show');
    });

    // text changed 
    jQuery('#billing_first_name_field').find('label').text('Voornaam'); 
    jQuery('#billing_last_name_field').find('label').text('Achternaam'); 
    jQuery('#billing_phone_field').find('label').text('Telefoon'); 
    jQuery('#billing_email_field').find('label').text('E-mailadres'); 

    jQuery('.woocommerce-billing-fields').find('h3').text('Facturering details'); 

    jQuery('#order_review_heading').text('Reservering'); 


    $('.value_swiper').click(function() {
        var estimated_addresss_first = $('.estimated_addresss_first').val();
        var estimated_addresss_last = $('.estimated_addresss_last').val();

        var swipe_value = estimated_addresss_first;

        $('.estimated_addresss_first').val(estimated_addresss_last);
        $('.estimated_addresss_last').val(swipe_value);



        var estimated_holding_first = $('.estimated_holding_first').val();
        var estimated_holding_last = $('.estimated_holding_last').val();

        var holding_swipe_value = estimated_holding_first;

        $('.estimated_holding_first').val(estimated_holding_last);
        $('.estimated_holding_last').val(holding_swipe_value);
    });


    // price symbol organize 
    var price_symbol = $('.woocommerce-order-overview__total .woocommerce-Price-currencySymbol')
    $('.woocommerce-order-overview__total .woocommerce-Price-amount.amount bdi').prepend(price_symbol);

});