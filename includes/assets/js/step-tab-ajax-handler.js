jQuery(document).ready(function($) {

    $('.fare_header_tab ul li a').click(function() {
        var same = $(this);
        $('.progress-bar').addClass('active');
        setTimeout(function() {
            $('.progress-bar').removeClass('active');
            $('.fare_header_tab ul li').removeClass('active');
            same.parent().addClass('active');

            var get_id = same.attr('href');
            $('.step-tab').removeClass('show');
            $(get_id).addClass('show');
        }, 1000);
    });

    $('.luggage_open').click(function() {
        var same = $(this);
        $('.progress-bar').addClass('active');
        setTimeout(function() {
            $('.progress-bar').removeClass('active');
            var get_id = same.attr('href');
            $('.step-tab').removeClass('show');
            $(get_id).addClass('show');
        }, 1000);
    });

    $('.luggage_close').click(function() {
        var same = $(this);
        $('.progress-bar').addClass('active');
        setTimeout(function() {
            $('.progress-bar').removeClass('active');
            var get_id = same.attr('href');
            $('.step-tab').removeClass('show');
            $(get_id).addClass('show');
        }, 1000);
    });

});