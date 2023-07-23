<?php

/**
 * 
 * Checkout submission 
 * 
 */
// $user_first_name = isset($_POST['user_first_name']) ? sanitize_text_field($_POST['user_first_name']) : '';
//         $user_last_name = isset($_POST['user_last_name']) ? sanitize_text_field($_POST['user_last_name']) : '';
//         $user_email_add = isset($_POST['user_email_add']) ? sanitize_email($_POST['user_email_add']) : '';
//         $user_telephone = isset($_POST['user_telephone']) ? sanitize_text_field($_POST['user_telephone']) : '';

// Process the estimated contact form submission
function process_estimated_contact() {
    if (isset($_POST['estimated_submit_checkout'])) {
        
        $product_id = 16429;

        $color = 'Amsterdam'; 

        $cart_item_data = array(
            'color' => $color
        );
        
        WC()->cart->add_to_cart($product_id, 1, 0, array(), $cart_item_data);
        
        $checkout_url = wc_get_checkout_url();
        wp_redirect($checkout_url);
        exit;
    }
}
add_action('template_redirect', 'process_estimated_contact');
        
function display_custom_product_field_on_cart($cart_item_data, $cart_item) {
    if (isset($cart_item['color'])) {
        $cart_item_data[] = array(
            'name' => 'From : ',
            'value' => $cart_item['color'],
        );
    }
    return $cart_item_data;
}
add_filter('woocommerce_get_item_data', 'display_custom_product_field_on_cart', 10, 2);

function display_custom_product_field_on_checkout($item, $cart_item_key, $values, $order) {
    if (isset($values['color'])) {
        $item->add_meta_data('Color', $values['color'], true);
    }
    return $item;
}
add_filter('woocommerce_checkout_create_order_line_item', 'display_custom_product_field_on_checkout', 10, 4);
