<script>
    jQuery(document).ready(function($) {
    $('.offer_button_submit').click(function(e) {
        e.preventDefault();
        
        var car_id = $(this).parent().parent().parent().find('.car_list_fare_item.active .car_id').val();
        var car_price = $(this).parent().parent().parent().find('.car_list_fare_item.active .car_price').val();
        var car_name = $(this).parent().parent().parent().find('.car_list_fare_item.active .car_fare_instruct h3').text();

        var person_count_get = $('.person_count_get').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo esc_url(admin_url("admin-ajax.php")); ?>',
            data: {
                action: 'offers_template_action',
                car_id_post : car_id,
                car_price_post : car_price,
                car_name_post : car_name,
                person_count_get : person_count_get,
            },
            beforeSend: function() {
                $('.progress-bar').addClass('active');
                $('.progress-bar.active .progress').css('animation' , `loader 5s ease infinite`);
            },
            success: function(response) {
                
                $('.progress-bar').removeClass('active');
                $('.estimated_info').addClass('active allow');
                $('.estimated_car').removeClass('active');

                $('#offers').removeClass('show');
                $('#travel_data').addClass('show');

                var data = JSON.parse(response);
                $('.fare_price_show').text(data.car_price);
                $('.passenger').text(data.estimated_ride_person);
                $('.fare_car').text(data.car_name);

                $('#checkout_car_id').val(data.car_id);
                $('#checkout_car_price').val(data.car_price);
                $('#checkout_car_person').val(data.estimated_ride_person);

                $(window).load();
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
        
    });
});
</script>