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