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

        $_SESSION['estimated_by'] = $_POST['estimated_by'];
        $_SESSION['estimated_by_holding'] = $_POST['estimated_by_holding'];

        $_SESSION['estimated_middile_points'] = array();
        $_SESSION['estimated_middile_points'][] = isset($_POST['estimated_middile_point']) ? $_POST['estimated_middile_point'] : '';

        $_SESSION['estimated_reach'] = $_POST['estimated_reach'];
        $_SESSION['estimated_reach_holding'] = $_POST['estimated_reach_holding'];

        $_SESSION['big_luggage'] = $_POST['big_luggage'];
        $_SESSION['small_luggage'] = $_POST['small_luggage'];

        $_SESSION['estimated_current_date'] = $_POST['estimated_current_date'];

        $_SESSION['estimated_return_confirm'] = isset($_POST['estimated_return_confirm']) ? $_POST['estimated_return_confirm'] : '';

        $_SESSION['estimated_return_date'] = $_POST['estimated_return_date'];
        
        $_SESSION['estimated_ride_person'] = $_POST['estimated_ride_person'];   

        $_SESSION['distance_result'] = $_POST['distance_result'];   

        wp_redirect('/easytaxi/fare-form');
        exit();
    }
}