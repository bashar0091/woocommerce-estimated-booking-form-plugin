<?php
/**
 * Plugin Name: Woocommerce Estimated Booking Form
 * Plugin URI: 
 * Description: Estimated Booking Form
 * Version: 1.0.0
 * Author: Awal Bashar
 * Author URI: https://bashar0091.github.io/awalbasharofficial
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
}
add_action( 'wp_enqueue_scripts', 'wc_ws_bf_enqueue_scripts' );


/**
 * 
 * Require All Includes Files Here
 * 
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/frontend/frontend.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/controller/estimated-form-controller.php';