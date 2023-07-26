jQuery(document).ready(function($) {
    
    'use strict';
    $('.estimated_calendar').datetimepicker({
        minute: true
    });

    $('.toogle_switch_outer').click(function(){
        $(this).toggleClass('active');
        $('.fare_retour').toggleClass('fare_retour_disable');
    });

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

});