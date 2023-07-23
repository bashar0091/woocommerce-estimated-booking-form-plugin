<?php
add_action('wp_ajax_offers_template_action', 'offers_template_handler');
add_action('wp_ajax_nopriv_offers_template_action', 'offers_template_handler');

function offers_template_handler(){
    
    $_SESSION['car_id'] = $_POST['car_id_post'];
    $_SESSION['car_price'] = $_POST['car_price_post'];
    $_SESSION['car_name'] = $_POST['car_name_post'];
    
    echo json_encode(
        array(
            'car_price' => $_SESSION['car_price'],
        ),
    );

    wp_die();
}