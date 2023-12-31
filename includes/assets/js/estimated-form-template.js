jQuery(document).ready(function($) {

    // input add minus script 
    var number_count = 0;
    $('.estimated_input_add').click(function() {
        number_count++;
        var estimated_append_input = `
            <div class="estimated_input_section estimated_input_with_pin">
                <div class="estimated_pin_wrapper">
                    <span class="estimated_pin"></span>
                </div>
                <div class="estimated_location_suggest">
                    <div class="estimated_input_wrapper">
                        <span class="estimated_input_icon">via</span>
                        <input type="text" name="estimated_middile_point[${number_count}]" class="estimated_location_map estimated_addresss" placeholder="Tussenstop straatnaam" required>
                        <input type="text" name="estimated_middile_point_holding[${number_count}"] class="estimated_holding" placeholder="House No.." required>
                        <a href="#!" class="estimated_input_cross">
                            <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.06 12L17.48 7.57996C17.5537 7.5113 17.6128 7.4285 17.6538 7.3365C17.6948 7.2445 17.7168 7.14518 17.7186 7.04448C17.7204 6.94378 17.7018 6.84375 17.6641 6.75036C17.6264 6.65697 17.5703 6.57214 17.499 6.50092C17.4278 6.4297 17.343 6.37356 17.2496 6.33584C17.1562 6.29811 17.0562 6.27959 16.9555 6.28137C16.8548 6.28314 16.7555 6.30519 16.6635 6.34618C16.5715 6.38717 16.4887 6.44627 16.42 6.51996L12 10.94L7.58 6.51996C7.43782 6.38748 7.24978 6.31535 7.05548 6.31878C6.86118 6.32221 6.67579 6.40092 6.53838 6.53834C6.40096 6.67575 6.32225 6.86113 6.31882 7.05544C6.3154 7.24974 6.38752 7.43778 6.52 7.57996L10.94 12L6.52 16.42C6.37955 16.5606 6.30066 16.7512 6.30066 16.95C6.30066 17.1487 6.37955 17.3393 6.52 17.48C6.66062 17.6204 6.85125 17.6993 7.05 17.6993C7.24875 17.6993 7.43937 17.6204 7.58 17.48L12 13.06L16.42 17.48C16.5606 17.6204 16.7512 17.6993 16.95 17.6993C17.1488 17.6993 17.3394 17.6204 17.48 17.48C17.6204 17.3393 17.6993 17.1487 17.6993 16.95C17.6993 16.7512 17.6204 16.5606 17.48 16.42L13.06 12Z" fill="#5a238d"/>
                            </svg>
                        </a>
                    </div>
                    <div class="estimated_location_dropdown"></div>
                </div>
            </div>
        `;

        $('.estimated_input_loop').append(estimated_append_input);

        $('.estimated_input_cross').click(function() {
            $(this).parent().find('.estimated_addresss').val('');
            $('.estimated_addresss_last').focus();
            $(this).parent().parent().parent().remove();
        });

        suggest_input_function();
        map_location();
    });


    // radio active deactive script
    $('.estimated_input_click label').click( function() {
        $('.estimated_input_click label .estimated_radio_circle').removeClass('active');
        $(this).find('.estimated_radio_circle').addClass('active');
    });

    // checkbox active deactive script 
    $('.estimated_check_circle_click label').click(function() {
        $(this).find('.estimated_check_circle').toggleClass('active');
        $('.estimated_input_disabled_check').toggleClass('estimated_input_disabled');
        $('.estimated_input_disabled_check').find('input').val('');
        $('.estimated_input_disabled_check').find('input').prop('required', function(_, attr) {
            return !attr;
        });
    });


    // person increment, decrement script 
    $(".estimated_count_add").click(function(e) {
        e.preventDefault();
        var input = $(this).siblings(".person_count");
        var currentValue = parseInt(input.val());
        var maxValue = parseInt(input.attr("max"));
        
        if (currentValue < maxValue) {
            input.val(currentValue + 1);
        }
    });
    $(".estimated_count_minus").click(function(e) {
        e.preventDefault();
        var input = $(this).siblings(".person_count");
        var currentValue = parseInt(input.val());
        var minValue = parseInt(input.attr("min"));
        
        if (currentValue > minValue) {
            input.val(currentValue - 1);
        }
    });
    $(".person_count").on("input", function() {
        var input = $(this);
        var currentValue = parseInt(input.val());
        var maxValue = parseInt(input.attr("max"));
        var minValue = parseInt(input.attr("min"));

        if (currentValue > maxValue) {
            input.val(maxValue);
        } else if (currentValue < minValue) {
            input.val(minValue);
        }
    });

    // input dropdown open close 
    function suggest_input_function(){
        $('.estimated_input_wrapper input').on('input', function() {
            $('.estimated_input_wrapper').removeClass('active');
            $(this).parent().addClass('active');
        });
        $(window).on('click', function() {
            $('.estimated_input_wrapper').removeClass('active');
        });
    }
    suggest_input_function();

});