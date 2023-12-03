<?php
/**
 * 
 * Checkout submission 
 * 
 */
// Process the estimated contact form submission
function process_estimated_contact() {
    if (isset($_POST['estimated_submit_checkout'])) {
        
        $user_first_name = isset($_POST['user_first_name']) ? sanitize_text_field($_POST['user_first_name']) : null;
        $user_last_name = isset($_POST['user_last_name']) ? sanitize_text_field($_POST['user_last_name']) : null;
        $user_email_add = isset($_POST['user_email_add']) ? sanitize_email($_POST['user_email_add']) : null;
        $user_telephone = isset($_POST['user_telephone']) ? sanitize_text_field($_POST['user_telephone']) : null;
        $checkout_car_price = isset($_POST['checkout_car_price']) ? sanitize_text_field($_POST['checkout_car_price']) : null;
        $checkout_car_person = isset($_POST['checkout_car_person']) ? sanitize_text_field($_POST['checkout_car_person']) : null;

        $checkout_return_yes = isset($_POST['checkout_return_yes']) ? sanitize_text_field($_POST['checkout_return_yes']) : null;

        $user_flight_number = isset($_POST['flight_number']) && !empty($_POST['flight_number']) ? sanitize_text_field($_POST['flight_number']) : null;

        $_SESSION['user_first_name'] = $user_first_name;
        $_SESSION['user_last_name'] = $user_last_name;
        $_SESSION['user_email_add'] = $user_email_add;
        $_SESSION['user_telephone'] = $user_telephone;
        $_SESSION['checkout_car_price'] = $checkout_car_price;
        $_SESSION['checkout_car_person'] = $checkout_car_person;

        $_SESSION['checkout_return_yes'] = $checkout_return_yes;

        $_SESSION['flight_number'] = $user_flight_number;

        $product_id = $_POST['checkout_car_id'];
        $estimated_by = isset($_SESSION['estimated_by']) ? $_SESSION['estimated_by'] : null; 
        $estimated_to = isset($_SESSION['estimated_reach']) ? $_SESSION['estimated_reach'] : null; 
        $passengar = isset($_SESSION['checkout_car_person']) ? $_SESSION['checkout_car_person'] : null; 

        $flight_number = isset($_SESSION['flight_number']) ? $_SESSION['flight_number']: null; 
        
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


        $estimated_by_holding = isset($_SESSION['estimated_by_holding']) && !empty($_SESSION['estimated_by_holding'])  ? $_SESSION['estimated_by_holding'] : null; 
        $estimated_reach_holding = isset($_SESSION['estimated_reach_holding']) && !empty($_SESSION['estimated_reach_holding']) ? $_SESSION['estimated_reach_holding'] : null; 

        $big_luggage = isset($_SESSION['big_luggage']) ? $_SESSION['big_luggage'] : null; 
        $small_luggage = isset($_SESSION['small_luggage']) ? $_SESSION['small_luggage'] : null; 
        

        $bag_extra_1 = isset($_SESSION['bag_extra_1']) && $_SESSION['bag_extra_1'] > 0 ? $_SESSION['bag_extra_1'] : null; 
        $bag_extra_2 = isset($_SESSION['bag_extra_2']) && $_SESSION['bag_extra_2'] > 0 ? $_SESSION['bag_extra_2'] : null; 
        $bag_extra_3 = isset($_SESSION['bag_extra_3']) && $_SESSION['bag_extra_3'] > 0 ? $_SESSION['bag_extra_3'] : null; 
        $bag_extra_4 = isset($_SESSION['bag_extra_4']) && $_SESSION['bag_extra_4'] > 0 ? $_SESSION['bag_extra_4'] : null; 
        $bag_extra_5 = isset($_SESSION['bag_extra_5']) && $_SESSION['bag_extra_5'] > 0 ? $_SESSION['bag_extra_5'] : null; 
        $bag_extra_6 = isset($_SESSION['bag_extra_6']) && $_SESSION['bag_extra_6'] > 0 ? $_SESSION['bag_extra_6'] : null; 
        $bag_extra_7 = isset($_SESSION['bag_extra_7']) && $_SESSION['bag_extra_7'] > 0 ? $_SESSION['bag_extra_7'] : null; 
        $bag_extra_8 = isset($_SESSION['bag_extra_8']) && $_SESSION['bag_extra_8'] > 0 ? $_SESSION['bag_extra_8'] : null;

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

            'flight_number' => $flight_number,

            'extra_bag_1' => $bag_extra_1,
            'extra_bag_2' => $bag_extra_2,
            'extra_bag_3' => $bag_extra_3,
            'extra_bag_4' => $bag_extra_4,
            'extra_bag_5' => $bag_extra_5,
            'extra_bag_6' => $bag_extra_6,
            'extra_bag_7' => $bag_extra_7,
            'extra_bag_8' => $bag_extra_8,
            
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
            'name' => 'Huis nr',
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
            'name' => 'Huis nr',
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
            'name' => 'Datum',
            'value' => $cart_item['journey_date'],
        );
    }

    if (isset($cart_item['ride_person'])) {
        $cart_item_data[] = array(
            'name' => 'Passagiers',
            'value' => $cart_item['ride_person'],
        );
    }

    if (isset($cart_item['return'])) {
        $cart_item_data[] = array(
            'name' => 'Retour',
            'value' => $cart_item['return'],
        );
    }
    if (isset($cart_item['return_date'])) {
        $cart_item_data[] = array(
            'name' => 'Retour datum',
            'value' => $cart_item['return_date'],
        );
    }

    if (isset($cart_item['flight_number'])) {
        $cart_item_data[] = array(
            'name' => 'Vluchtnummer',
            'value' => $cart_item['flight_number'],
        );
    }


    if (isset($cart_item['extra_bag_1'])) {
        $cart_item_data[] = array(
            'name' => 'Opvouwbare rolstoel',
            'value' => $cart_item['extra_bag_1'],
        );
    }
    if (isset($cart_item['extra_bag_2'])) {
        $cart_item_data[] = array(
            'name' => 'Rollator',
            'value' => $cart_item['extra_bag_2'],
        );
    }
    if (isset($cart_item['extra_bag_3'])) {
        $cart_item_data[] = array(
            'name' => 'Huisdieren',
            'value' => $cart_item['extra_bag_3'],
        );
    }
    if (isset($cart_item['extra_bag_4'])) {
        $cart_item_data[] = array(
            'name' => 'Fiets',
            'value' => $cart_item['extra_bag_4'],
        );
    }
    if (isset($cart_item['extra_bag_5'])) {
        $cart_item_data[] = array(
            'name' => 'Wintersport',
            'value' => $cart_item['extra_bag_5'],
        );
    }
    if (isset($cart_item['extra_bag_6'])) {
        $cart_item_data[] = array(
            'name' => 'Wintersport',
            'value' => $cart_item['extra_bag_6'],
        );
    }
    if (isset($cart_item['extra_bag_7'])) {
        $cart_item_data[] = array(
            'name' => 'Golftas',
            'value' => $cart_item['extra_bag_7'],
        );
    }
    if (isset($cart_item['extra_bag_8'])) {
        $cart_item_data[] = array(
            'name' => 'Watersport',
            'value' => $cart_item['extra_bag_8'],
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
        $item->add_meta_data('Huis nr', $values['estimated_by_holding'], true);
    }

    if (isset($values['estimated_to'])) {
        $item->add_meta_data('Bestemming', $values['estimated_to'], true);
    }
    if (isset($values['estimated_to_holding'])) {
        $item->add_meta_data('Huis nr', $values['estimated_to_holding'], true);
    }

    if (isset($values['big_bag'])) {
        $item->add_meta_data('Grote koffers', $values['big_bag'], true);
    }
    if (isset($values['small_bag'])) {
        $item->add_meta_data('Handbagages', $values['small_bag'], true);
    }

    if (isset($values['journey_date'])) {
        $item->add_meta_data('Datum', $values['journey_date'], true);
    }

    if (isset($values['ride_person'])) {
        $item->add_meta_data('Passagiers', $values['ride_person'], true);
    }

    if (isset($values['return'])) {
        $item->add_meta_data('Retour', $values['return'], true);
    }
    if (isset($values['return_date'])) {
        $item->add_meta_data('Retour datum', $values['return_date'], true);
    }

    if (isset($values['flight_number'])) {
        $item->add_meta_data('Vluchtnummer', $values['flight_number'], true);
    }

    if (isset($values['extra_bag_1'])) {
        $item->add_meta_data('Opvouwbare rolstoel', $values['extra_bag_1'], true);
    }
    if (isset($values['extra_bag_2'])) {
        $item->add_meta_data('Rollator', $values['extra_bag_2'], true);
    }
    if (isset($values['extra_bag_3'])) {
        $item->add_meta_data('Huisdieren', $values['extra_bag_3'], true);
    }
    if (isset($values['extra_bag_4'])) {
        $item->add_meta_data('Fiets', $values['extra_bag_4'], true);
    }
    if (isset($values['extra_bag_5'])) {
        $item->add_meta_data('Wintersport', $values['extra_bag_5'], true);
    }
    if (isset($values['extra_bag_6'])) {
        $item->add_meta_data('Kinderwagen', $values['extra_bag_6'], true);
    }
    if (isset($values['extra_bag_7'])) {
        $item->add_meta_data('Golftas', $values['extra_bag_7'], true);
    }
    if (isset($values['extra_bag_8'])) {
        $item->add_meta_data('Watersport', $values['extra_bag_8'], true);
    }

    return $item;
}
add_filter('woocommerce_checkout_create_order_line_item', 'display_custom_product_field_on_checkout', 10, 4);