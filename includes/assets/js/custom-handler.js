jQuery(document).ready(function($) {
    
    'use strict';
    $('.estimated_calendar').datetimepicker({
        step: 5,
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
    $('.popular_location_click .elementor-post__card').click(function(){
        var location_text = $(this).find('.elementor-post__excerpt p').text();
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

});