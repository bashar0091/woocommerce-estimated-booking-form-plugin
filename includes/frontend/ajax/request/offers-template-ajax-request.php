<script>
    jQuery(document).ready(function($) {
    $('.offer_button_submit').click(function(e) {
        e.preventDefault();
        
        var car_id = $(this).parent().parent().parent().find('.car_list_fare_item.active .car_id').val();
        var car_price = $(this).parent().parent().parent().find('.car_list_fare_item.active .car_price').val();
        var car_name = $(this).parent().parent().parent().find('.car_list_fare_item.active .car_fare_instruct h3').text();

        $.ajax({
            type: 'POST',
            url: '<?php echo esc_url(admin_url("admin-ajax.php")); ?>',
            data: {
                action: 'offers_template_action',
                car_id_post : car_id,
                car_price_post : car_price,
                car_name_post : car_name,
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
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
        
    });
});
</script>