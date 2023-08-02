<?php
$big_luggage = $_SESSION['big_luggage'];
$small_luggage = $_SESSION['small_luggage'];

$estimated_ride_person = $_SESSION['estimated_ride_person'];
$distance_result = $_SESSION['distance_result'];
$result .= '
<form method="post" action="">
    <div id="offers" class="step-tab show">
        <div class="fare_body_top_section">
            <div>
                <h2 class="title_5">Aanbiedingen</h2>
            </div>
        </div>

        <div class="car_list_fare_section">';

            $total_luggage = $big_luggage + $small_luggage;

            $car_filter = '';

            if($total_luggage > 8 && $total_luggage < 17) {
                $car_filter = '8-luggage';
            } elseif($total_luggage > 4 && $total_luggage < 9) {
                $car_filter = '4-luggage';
            } elseif($total_luggage > -1 && $total_luggage < 5) {
                $car_filter = '2-luggage';
            } elseif($estimated_ride_person > 4) {
                $car_filter = '8-seat';
            } elseif($estimated_ride_person > 0 && $estimated_ride_person < 5) {
                $car_filter = '4-seat';
            }
            
            // if($estimated_ride_person > 4) {
            //     $car_filter = '8-seat';
            // } else {
            //     $car_filter = '4-seat';
            // }
            $args = array(
                'post_type'      => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => 4,
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $car_filter,
                    ),
                ),
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
                    
                    $main_price_integer = intval($main_price);
                    $sale_price_integer = intval($sale_price);
                    
                    $product_id = $product->get_id();

                    $result .= '
                    <label>
                        <div class="car_list_fare_item ' . ($i == 1 ? "active" : '') . ' ">    
                            <input type="radio" value="'.$product_id.'" class="car_id" ' . ($i == 1 ? "checked" : '') . '/>
                            <input type="hidden" value="' . $sale_price_integer . '" class="car_price">
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
                                <h5>€ '.$main_price_integer.'</h5>
                                <h4>€ '.$sale_price_integer.'</h4>
                                <button style="pointer-events: none" class="fare_button_submit">Selecteer</button>
                            </div>
                        </div>
                    </label>';
                }
            }
            wp_reset_postdata();
        $result .= '</div>

        <div class="fare_body_footer_section">
            <div>
                <a href="/" class="back_arrow back_arrow_first">
                    <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5303 5.46967C10.8232 5.76256 10.8232 6.23744 10.5303 6.53033L5.81066 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H5.81066L10.5303 17.4697C10.8232 17.7626 10.8232 18.2374 10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303L3.46967 12.5303C3.17678 12.2374 3.17678 11.7626 3.46967 11.4697L9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967Z" fill="#F76D27"></path> </g></svg>
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

// ajax requester 
require_once(dirname(dirname(dirname(dirname(plugin_dir_path( __FILE__ ))))) . '/frontend/ajax/request/offers-template-ajax-request.php');