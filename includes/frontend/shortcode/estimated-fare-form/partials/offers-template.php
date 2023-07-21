<?php

$estimated_ride_person = $_SESSION['estimated_ride_person'];
$distance_result = $_SESSION['distance_result'];

$result .= '
<form method="post" action="">
    <div id="offers" class="step-tab show">
        <div class="fare_body_top_section">
            <div>
                <h2 class="title_5">Aanbiedingen</h2>
            </div>
            <div class="fare_d_flex_center">

                <a href="#luggage" class="fare_button_submit fare_button_icon luggage_open">
                    <svg fill="#6728A1" height="100%" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 128 128" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M79.9,23.4c0-4-3.5-6.5-7.8-6.5c0,0-16.4,0-16.3,0c-4.2,0-7.8,2.5-7.8,6.5v11H32.7v76.5h62.6V34.4H79.9V23.4z M74.2,34.4 H53.7V23.1h20.5V34.4z"></path> <path d="M7.2,45.8c0,0.2,0,53.3,0,53.3c0,7.4,5.6,11.7,11.4,11.7H27V34.2h-8.4C12.7,34.2,7.2,39.2,7.2,45.8z"></path> <path d="M109.4,34.2H101v76.6h8.4c5.8,0,11.4-4.3,11.4-11.7c0,0,0-53.1,0-53.3C120.8,39.2,115.3,34.2,109.4,34.2z"></path> </g> </g></svg>
                    Bagage
                </a>

                <span class="title_6">Passagiers</span>
                <div class="estimated_input_wrapper estimated_input_count estimated_input_count_border">
                    <a href="#!" class="estimated_count_minus">
                        <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="1" height="1" fill="#000"/>
                        <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <input type="number" name="estimated_ride_person" value="'.$estimated_ride_person.'" class="person_count" min="0" max="8">
                    <a href="#!" class="estimated_count_add">
                        <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                        <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                            455,242.5 "></polygon>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="car_list_fare_section">';
            $args = array(
                'post_type'      => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => 4,
                'order'          => 'ASC'
            );
            
            $products_query = new WP_Query( $args );
            
            if ( $products_query->have_posts() ) {
                $i = 0;
                while ( $products_query->have_posts() ) {
                    $i++;
                    $products_query->the_post();
                    global $product;

                    $regular_price = (float) $product->get_regular_price();
                    $sale_price = (float) $product->get_price();

                    $main_price = $distance_result * $regular_price;
                    $sale_price = $distance_result * $sale_price;

                    $main_price_formatted = wc_price($main_price);
                    $sale_price_formatted = wc_price($sale_price);
                    
                    $result .= '<div class="car_list_fare_item ' . ($i == 1 ? "active" : '') . ' ">
                        <div class="car_fare_image">
                            <img src="'.get_the_post_thumbnail_url().'" alt="car-image">
                        </div>
                        <div class="car_fare_instruct">
                            <h3>'.get_the_title().'</h3>
                            <ul>
                                <li>
                                    <span>
                                        <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Interface / Check">
                                        <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#24cd85" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                        </svg>
                                    </span>
                                    <span>
                                        Altijd een privé-taxi
                                    </span>
                                </li>
                                <li>
                                    <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Interface / Check">
                                    <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#24cd85" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    </svg>
                                    Bagage gratis mee
                                </li>
                                <li>
                                    <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Interface / Check">
                                    <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#24cd85" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    </svg>
                                    Gecertificeerde taxibedrijven
                                </li>
                            </ul>
                        </div>
                        <div class="car_fare_price_confirm">
                            <h5>'.$main_price_formatted.'</h5>
                            <h4>'.$sale_price_formatted.'</h4>
                            <button class="fare_button_submit">Selecteer</button>
                        </div>
                    </div>';
                }
            }
            wp_reset_postdata();
        $result .= '</div>

        <div class="fare_body_footer_section">
            <div>
                <a href="http://localhost/easytaxi/booking-form/" class="back_arrow">
                    <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5303 5.46967C10.8232 5.76256 10.8232 6.23744 10.5303 6.53033L5.81066 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H5.81066L10.5303 17.4697C10.8232 17.7626 10.8232 18.2374 10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303L3.46967 12.5303C3.17678 12.2374 3.17678 11.7626 3.46967 11.4697L9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967Z" fill="#6728a1"></path> </g></svg>
                    terug
                </a>
            </div>

            <div>
                <button class="offer_button_submit fare_button_submit fare_button_next">Verder</button>
            </div>
        </div>
    </div>
</form>
';

?>
<!-- 
<script>
    jQuery(document).ready(function($) {
    $('.offer_button_submit').click(function(e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: '<?php echo esc_url(admin_url("admin-ajax.php")); ?>',
            data: {
                action: 'offers_template_action',
            },
            beforeSend: function() {
                
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
        
    });
});
</script> -->