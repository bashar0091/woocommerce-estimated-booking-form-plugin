<?php
/**
 * Plugin Name: Woocommerce Estimated Booking Form
 * Plugin URI: 
 * Description: Estimated Booking Form
 * Version: 1.0.0
 * Author: Dev Bucks
 * Author URI: 
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wc-es-booking-form
 */


// Prevent direct access to the plugin file
defined( 'ABSPATH' ) || exit;

/**
 * 
 * Require All Css Files Here
 * 
 */
function wc_ws_bf_enqueue_style() {
    wp_enqueue_style( 'datetimepicker-style', plugin_dir_url( __FILE__ ) . 'includes/assets/jQueryPlugin/datetimepicker/jquery.datetimepicker.min.css', array(), '1.0.0' );
    wp_enqueue_style( 'frontend-custom-style', plugin_dir_url( __FILE__ ) . 'includes/assets/css/custom-frontend.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'wc_ws_bf_enqueue_style' );


/**
 * 
 * Require All Js Files Here
 * 
 */
function wc_ws_bf_enqueue_scripts() {
    wp_enqueue_script( 'estimated-form-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/estimated-form-template.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'tab-ajax-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/step-tab-ajax-handler.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'offer-template-ajax-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/offer-template-ajax-handler.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'offer-template-ajax-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/offer-template-ajax-handler.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'luggage-handler-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/luggage-handler.js', array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'mapbox-gl-script', 'https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js', array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'map-location-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/map-location-handler.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'datetimepicker-script', plugin_dir_url( __FILE__ ) . 'includes/assets/jQueryPlugin/datetimepicker/jquery.datetimepicker.full.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'custom-inject-script', plugin_dir_url( __FILE__ ) . 'includes/assets/js/custom-handler.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wc_ws_bf_enqueue_scripts' );



/**
 * 
 * Require All Includes Files Here
 * 
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend/frontend.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/controller/estimated-form-controller.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/controller/estimated-contact-controller.php';

/**
 * 
 * One Product Cart Item
 * 
 */
add_filter('woocommerce_add_cart_item_data', 'restrict_single_product_to_cart', 10, 3);
function restrict_single_product_to_cart($cart_item_data, $product_id, $variation_id) {
    WC()->cart->empty_cart();

    return $cart_item_data;
}


/**
 * 
 * Show cancel in woocommmerce 
 * 
 */
function add_cancel_order_button_to_my_orders_actions($actions, $order) {
    if ($order->has_status('processing')) {
        $order_id = $order->get_id();
        $redirect_url = wc_get_account_endpoint_url('dashboard');
        $cancel_url = add_query_arg(
            array(
                'cancel_order' => 'true',
                'order_id' => $order_id,
                'redirect' => urlencode($redirect_url),
                'nonce' => wp_create_nonce('cancel_order_' . $order_id),
            ),
            home_url()
        );

        $actions['cancel'] = array(
            'url'    => $cancel_url,
            'name'   => __('Annuleren', 'your-textdomain'),
            'action' => 'cancel',
        );
    }

    return $actions;
}
add_filter('woocommerce_my_account_my_orders_actions', 'add_cancel_order_button_to_my_orders_actions', 10, 2);

function handle_order_cancellation() {
    if (isset($_GET['cancel_order']) && isset($_GET['order_id']) && isset($_GET['nonce'])) {
        $order_id = absint($_GET['order_id']);

        if (wp_verify_nonce($_GET['nonce'], 'cancel_order_' . $order_id)) {
            $order = wc_get_order($order_id);

            if ($order) {
                if ($order->has_status('processing')) {
                    $order->update_status('cancelled', __('Order was cancelled by customer.', 'your-textdomain'));
                }
            }

            $redirect_url = wc_get_account_endpoint_url('dashboard');
            wp_redirect($redirect_url);
            exit;
        }
    }
}
add_action('template_redirect', 'handle_order_cancellation');


// woocommerce remove quantity 
function remove_checkout_quantity_field( $cart_item, $cart_item_key ) {
    return false;
}
add_filter( 'woocommerce_checkout_cart_item_quantity', 'remove_checkout_quantity_field', 10, 2 );

function remove_order_quantity_field( $show_quantity, $product ) {
    return false;
}
add_filter( 'woocommerce_checkout_cart_item_quantity', 'remove_order_quantity_field', 10, 2 );

function remove_checkout_order_quantity_input_fields( $html, $cart_item, $cart_item_key ) {
    return $html;
}
add_filter( 'woocommerce_checkout_cart_item_quantity', 'remove_checkout_order_quantity_input_fields', 10, 3 );


// session close 
function session_close($order_id) {
    $order = wc_get_order($order_id);

    if (!$order || !in_array($order->get_status(), ['processing', 'completed'])) {
        return;
    }

    session_unset();
}
add_action('woocommerce_thankyou', 'session_close', 10, 1);


// all session list for handle 
// echo '
// <h2>Session Data</h2>
// <div style="background: sky-blue; padding: 15px;">
//     <table cellspacing="0" border="1">
//         <tr>
//             <th>First Location</th>
//             <td>'.$_SESSION['estimated_by'].'</td>

//             <th>First Location Holding</th>
//             <td>'.$_SESSION['estimated_by_holding'].'</td>

//             <th>Second Location</th>
//             <td>'.$_SESSION['estimated_reach'].'</td>

//             <th>Second Location Holding</th>
//             <td>'.$_SESSION['estimated_reach_holding'].'</td>
//         </tr>

//         <tr>
//             <th>Total Distance</th>
//             <td>'.$_SESSION['distance_result'].'</td>

//             <th>Tour Date</th>
//             <td>'.$_SESSION['estimated_current_date'].'</td>

//             <th>Return Yes / Not</th>
//             <td>'. $_SESSION['estimated_return_confirm'].'</td>

//             <th>Return Date</th>
//             <td>'.$_SESSION['estimated_return_date'].'</td>
//         </tr>

//         <tr>
//             <th>Big Luggage</th>
//             <td>'.$_SESSION['big_luggage'].'</td>

//             <th>Small Luggage</th>
//             <td>'.$_SESSION['small_luggage'].'</td>

//             <th>Total Person</th>
//             <td>'.$_SESSION['estimated_ride_person'].'</td>

//             <th>Return Date</th>
//             <td>'.$_SESSION['estimated_return_date'].'</td>
//         </tr>
//     </table>
// </div>

// <h2>Final Checkout Data</h2>
// ';