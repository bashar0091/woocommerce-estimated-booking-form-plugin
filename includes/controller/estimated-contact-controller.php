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

        $_SESSION['user_first_name'] = $user_first_name;
        $_SESSION['user_last_name'] = $user_last_name;
        $_SESSION['user_email_add'] = $user_email_add;
        $_SESSION['user_telephone'] = $user_telephone;
        $_SESSION['checkout_car_price'] = $checkout_car_price;
        $_SESSION['checkout_car_person'] = $checkout_car_person;

        $product_id = $_POST['checkout_car_id'];
        $estimated_by = $_SESSION['estimated_by']; 
        $estimated_to = $_SESSION['estimated_reach']; 
        $passengar = $_SESSION['checkout_car_person']; 
        $date = $_SESSION['estimated_current_date']; 

        $cart_item_data = array(
            'estimated_by' => $estimated_by,
            'estimated_to' => $estimated_to,
            'passengar' => $passengar,
            'date' => $date,
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
            $new_price = $_SESSION['checkout_car_price']; 
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
    if (isset($cart_item['estimated_to'])) {
        $cart_item_data[] = array(
            'name' => 'Bestemming',
            'value' => $cart_item['estimated_to'],
        );
    }
    if (isset($cart_item['passengar'])) {
        $cart_item_data[] = array(
            'name' => 'Passengers',
            'value' => $cart_item['passengar'],
        );
    }
    if (isset($cart_item['date'])) {
        $cart_item_data[] = array(
            'name' => 'Date',
            'value' => $cart_item['date'],
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
    if (isset($values['estimated_to'])) {
        $item->add_meta_data('Bestemming', $values['estimated_to'], true);
    }
    if (isset($values['passengar'])) {
        $item->add_meta_data('Passengar', $values['passengar'], true);
    }
    if (isset($values['date'])) {
        $item->add_meta_data('Date', $values['date'], true);
    }
    return $item;
}
add_filter('woocommerce_checkout_create_order_line_item', 'display_custom_product_field_on_checkout', 10, 4);