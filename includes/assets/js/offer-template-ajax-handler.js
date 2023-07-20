jQuery(document).ready(function($) {

    $('.car_list_fare_section .car_list_fare_item').click(function() {
        $('.car_list_fare_section .car_list_fare_item').removeClass('active');
        $(this).addClass('active');
    });

});