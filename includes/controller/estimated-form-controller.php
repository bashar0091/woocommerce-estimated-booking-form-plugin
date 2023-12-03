<?php
/**
 * 
 * Form Submission Controlling
 * 
 */
add_action('init', 'process_estimated_booking');

function process_estimated_booking() {
    
    if (isset($_POST['estimated_booking'])) {
        session_start();

        $_SESSION['estimated_by'] = isset($_POST['estimated_by']) ? $_POST['estimated_by']: null;
        $_SESSION['estimated_by_holding'] = isset($_POST['estimated_by_holding']) ? $_POST['estimated_by_holding']: null;

        $_SESSION['estimated_middile_points'] = array();
        $_SESSION['estimated_middile_points'][] = isset($_POST['estimated_middile_point']) ? $_POST['estimated_middile_point'] : '';

        $_SESSION['estimated_reach'] = isset($_POST['estimated_reach']) ? $_POST['estimated_reach']: null;
        $_SESSION['estimated_reach_holding'] = isset($_POST['estimated_reach_holding']) ? $_POST['estimated_reach_holding']: null;

        $_SESSION['big_luggage'] = isset( $_POST['big_luggage']) ? $_POST['big_luggage']: null;
        $_SESSION['small_luggage'] = isset( $_POST['small_luggage']) ? $_POST['small_luggage']: null;

        $_SESSION['estimated_current_date'] = isset($_POST['estimated_current_date']) ? $_POST['estimated_current_date']: null;

        $_SESSION['estimated_return_confirm'] = isset($_POST['estimated_return_confirm']) ? $_POST['estimated_return_confirm'] : '';

        $_SESSION['estimated_return_date'] = isset( $_POST['estimated_return_date'] ) ? $_POST['estimated_return_date'] : null ;
        
        $_SESSION['estimated_ride_person'] = isset( $_POST['estimated_ride_person'] ) ? $_POST['estimated_ride_person'] : null ;   

        $_SESSION['distance_result'] = isset( $_POST['distance_result'] ) ? $_POST['distance_result']: null; 


        $_SESSION['bag_extra_1'] = isset ( $_POST['bag_extra_1'] ) ? $_POST['bag_extra_1'] : null; 
        $_SESSION['bag_extra_2'] = isset ( $_POST['bag_extra_2'] ) ? $_POST['bag_extra_2'] : null; 
        $_SESSION['bag_extra_3'] = isset ( $_POST['bag_extra_3'] ) ? $_POST['bag_extra_3'] : null; 
        $_SESSION['bag_extra_4'] = isset ( $_POST['bag_extra_4'] ) ? $_POST['bag_extra_4'] : null; 
        $_SESSION['bag_extra_5'] = isset ( $_POST['bag_extra_5'] ) ? $_POST['bag_extra_5'] : null; 
        $_SESSION['bag_extra_6'] = isset ( $_POST['bag_extra_6'] ) ? $_POST['bag_extra_6'] : null; 
        $_SESSION['bag_extra_7'] = isset ( $_POST['bag_extra_7'] ) ? $_POST['bag_extra_7'] : null; 
        $_SESSION['bag_extra_8'] = isset ( $_POST['bag_extra_8'] ) ? $_POST['bag_extra_8'] : null; 


        $_SESSION['price_range'] = isset ( $_POST['price_range'] ) ? $_POST['price_range'] : null; 
        

        wp_redirect('/easytaxi/fare-form');
        exit();
    }
}