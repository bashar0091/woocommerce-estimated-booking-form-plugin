<script>
    jQuery(document).ready(function($) {
    $('.luggage_button_submit').click(function(e) {
        e.preventDefault();
 
        var large_luggage_count = $(this).parent().parent().parent().find('.large_luggage_count').val();
        var small_luggage_count = $(this).parent().parent().parent().find('.small_luggage_count').val();
        var hand_luggage_count = $(this).parent().parent().parent().find('.hand_luggage_count').val();

        console.log(large_luggage_count);
        console.log(small_luggage_count);
        console.log(hand_luggage_count);

        $.ajax({
            type: 'POST',
            url: '<?php echo esc_url(admin_url("admin-ajax.php")); ?>',
            data: {
                action: 'luggage_template_action',
                large_luggage_count : large_luggage_count,
                small_luggage_count : small_luggage_count,
                hand_luggage_count : hand_luggage_count
            },
            beforeSend: function() {
                $('.progress-bar').addClass('active');
                $('.progress-bar.active .progress').css('animation' , `loader 5s ease infinite`);
            },
            success: function(response) {
                
                $('.progress-bar').removeClass('active');
                $('#luggage').removeClass('show');
                $('#offers').addClass('show allow');
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
        
    });
});
</script>