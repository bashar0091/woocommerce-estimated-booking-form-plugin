<?php

/**
 * 
 * Checkout submission 
 * 
 */
// Process the estimated contact form submission
function process_estimated_contact() {
    if (isset($_POST['estimated_submit_checkout'])) {
        
        $user_first_name = isset($_POST['user_first_name']) ? sanitize_text_field($_POST['user_first_name']) : '';
        $user_last_name = isset($_POST['user_last_name']) ? sanitize_text_field($_POST['user_last_name']) : '';
        $user_email_add = isset($_POST['user_email_add']) ? sanitize_email($_POST['user_email_add']) : '';
        $user_telephone = isset($_POST['user_telephone']) ? sanitize_text_field($_POST['user_telephone']) : '';
        $checkout_car_price = isset($_POST['checkout_car_price']) ? sanitize_text_field($_POST['checkout_car_price']) : '';
        $checkout_car_person = isset($_POST['checkout_car_person']) ? sanitize_text_field($_POST['checkout_car_person']) : '';

        $checkout_return_yes = isset($_POST['checkout_return_yes']) ? sanitize_text_field($_POST['checkout_return_yes']) : '';

        $_SESSION['user_first_name'] = $user_first_name;
        $_SESSION['user_last_name'] = $user_last_name;
        $_SESSION['user_email_add'] = $user_email_add;
        $_SESSION['user_telephone'] = $user_telephone;
        $_SESSION['checkout_car_price'] = $checkout_car_price;
        $_SESSION['checkout_car_person'] = $checkout_car_person;

        $_SESSION['checkout_return_yes'] = $checkout_return_yes;

        $product_id = $_POST['checkout_car_id'];
        $estimated_by = $_SESSION['estimated_by']; 
        $estimated_to = $_SESSION['estimated_reach']; 
        $passengar = $_SESSION['checkout_car_person']; 
        $date = date('d-n-Y | H:i', strtotime($_SESSION['estimated_current_date']));

        $return =  $_SESSION['checkout_return_yes'];
        $return_date = date('d-n-Y | H:i', strtotime($_SESSION['estimated_return_date']));
        $return_val;
        if($return == 'return_yes') {
            $return_val = 'Yes';
        } else {
            $return_val = null;
            $return_date = null;
        }


        $estimated_by_holding = isset($_SESSION['estimated_by_holding']) ? $_SESSION['estimated_by_holding'] : ''; 
        $estimated_reach_holding = isset($_SESSION['estimated_reach_holding']) ? $_SESSION['estimated_reach_holding'] : ''; 

        $big_luggage = isset($_SESSION['big_luggage']) ? $_SESSION['big_luggage'] : ''; 
        $small_luggage = isset($_SESSION['small_luggage']) ? $_SESSION['small_luggage'] : ''; 
        

        $cart_item_data = array(
            'estimated_by' => $estimated_by,
            'estimated_by_holding' => $estimated_by_holding,

            'estimated_to' => $estimated_to,
            'estimated_to_holding' => $estimated_reach_holding,

            'big_bag' => $big_luggage,
            'small_bag' => $small_luggage,

            'journey_date' => $date,

            'return' => $return_val,
            'return_date' => $return_date,
            
            'ride_person' => $passengar,
            
        );
        
        WC()->cart->add_to_cart($product_id, 1, 0, array(), $cart_item_data);
        
        $checkout_url = wc_get_checkout_url();
        wp_redirect($checkout_url);
        exit;
    }
}
add_action('template_redirect', 'process_estimated_contact');

// update woocommerce checkout 
function modify_checkout_fields($fields) {
    $user_first_name = isset($_SESSION['user_first_name']) ? $_SESSION['user_first_name'] : '';
    $user_last_name = isset($_SESSION['user_last_name']) ? $_SESSION['user_last_name'] : '';
    $user_email_add = isset($_SESSION['user_email_add']) ? $_SESSION['user_email_add'] : '';
    $user_telephone = isset($_SESSION['user_telephone']) ? $_SESSION['user_telephone'] : '';

    $fields['billing']['billing_first_name']['default'] = $user_first_name;
    $fields['billing']['billing_last_name']['default'] = $user_last_name;
    $fields['billing']['billing_email']['default'] = $user_email_add;
    $fields['billing']['billing_phone']['default'] = $user_telephone;

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'modify_checkout_fields');
 

// price update function 
function update_cart_item_price($cart_object) {
    foreach ($cart_object->cart_contents as $cart_item_key => $cart_item) {
        if (isset($cart_item['estimated_by']) && isset($cart_item['estimated_to'])) {

            $return =  $_SESSION['checkout_return_yes'];

            if($return == 'return_yes'){
                $new_price = 2 * $_SESSION['checkout_car_price']; 
            } else {
                $new_price = $_SESSION['checkout_car_price']; 
            }
            
            $cart_item['data']->set_price($new_price);
        }
    }
}
add_action('woocommerce_before_calculate_totals', 'update_cart_item_price', 10, 1);


// display custom field 
function display_custom_product_field_on_cart($cart_item_data, $cart_item) {

    if (isset($cart_item['estimated_by'])) {
        $cart_item_data[] = array(
            'name' => 'Vertrek Locatie',
            'value' => $cart_item['estimated_by'],
        );
    }
    if (isset($cart_item['estimated_by_holding'])) {
        $cart_item_data[] = array(
            'name' => '&nbsp;&nbsp;&nbsp; House No',
            'value' => $cart_item['estimated_by_holding'],
        );
    }

    if (isset($cart_item['estimated_to'])) {
        $cart_item_data[] = array(
            'name' => 'Bestemming',
            'value' => $cart_item['estimated_to'],
        );
    }
    if (isset($cart_item['estimated_to_holding'])) {
        $cart_item_data[] = array(
            'name' => '&nbsp;&nbsp;&nbsp; House No',
            'value' => $cart_item['estimated_to_holding'],
        );
    }

    if (isset($cart_item['big_bag'])) {
        $cart_item_data[] = array(
            'name' => 'Grote koffers',
            'value' => $cart_item['big_bag'],
        );
    }
    if (isset($cart_item['small_bag'])) {
        $cart_item_data[] = array(
            'name' => 'Handbagages',
            'value' => $cart_item['small_bag'],
        );
    }

    if (isset($cart_item['journey_date'])) {
        $cart_item_data[] = array(
            'name' => 'Journey Date',
            'value' => $cart_item['journey_date'],
        );
    }

    if (isset($cart_item['ride_person'])) {
        $cart_item_data[] = array(
            'name' => 'Passengers',
            'value' => $cart_item['ride_person'],
        );
    }

    if (isset($cart_item['return'])) {
        $cart_item_data[] = array(
            'name' => 'Return',
            'value' => $cart_item['return'],
        );
    }
    if (isset($cart_item['return_date'])) {
        $cart_item_data[] = array(
            'name' => 'Return Date',
            'value' => $cart_item['return_date'],
        );
    }

    return $cart_item_data;
}
add_filter('woocommerce_get_item_data', 'display_custom_product_field_on_cart', 10, 2);


// update custom field 
function display_custom_product_field_on_checkout($item, $cart_item_key, $values, $order) {

    if (isset($values['estimated_by'])) {
        $item->add_meta_data('Vertrek Locatie', $values['estimated_by'], true);
    }
    if (isset($values['estimated_by_holding'])) {
        $item->add_meta_data('&nbsp;&nbsp;&nbsp; House No', $values['estimated_by_holding'], true);
    }

    if (isset($values['estimated_to'])) {
        $item->add_meta_data('Bestemming', $values['estimated_to'], true);
    }
    if (isset($values['estimated_to_holding'])) {
        $item->add_meta_data('&nbsp;&nbsp;&nbsp; House No', $values['estimated_to_holding'], true);
    }

    if (isset($values['big_bag'])) {
        $item->add_meta_data('Grote koffers', $values['big_bag'], true);
    }
    if (isset($values['small_bag'])) {
        $item->add_meta_data('Handbagages', $values['small_bag'], true);
    }

    if (isset($values['journey_date'])) {
        $item->add_meta_data('Journey Date', $values['journey_date'], true);
    }

    if (isset($values['ride_person'])) {
        $item->add_meta_data('Passengers', $values['ride_person'], true);
    }

    if (isset($values['return'])) {
        $item->add_meta_data('Return', $values['return'], true);
    }
    if (isset($values['return_date'])) {
        $item->add_meta_data('Return Date', $values['return_date'], true);
    }

    return $item;
}
add_filter('woocommerce_checkout_create_order_line_item', 'display_custom_product_field_on_checkout', 10, 4);