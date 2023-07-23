<script>
    jQuery(document).ready(function($) {
    $('.travel_data_submit').click(function(e) {
        e.preventDefault();
 
        $.ajax({
            type: 'POST',
            url: '<?php echo esc_url(admin_url("admin-ajax.php")); ?>',
            data: {
                action: 'offers_template_action',
            },
            beforeSend: function() {
                $('.progress-bar').addClass('active');
                $('.progress-bar.active .progress').css('animation' , `loader 5s ease infinite`);
            },
            success: function(response) {
                
                $('.progress-bar').removeClass('active');
                $('.estimated_info').removeClass('active');
                $('.estimated_contact').addClass('active');

                $('#travel_data').removeClass('show');
                $('#contact_details').addClass('show allow');
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
        
    });
});
</script>