<?php
add_action('wp_ajax_luggage_template_action', 'luggage_template_handler');
add_action('wp_ajax_nopriv_luggage_template_action', 'luggage_template_handler');

function luggage_template_handler(){
    
    $_SESSION['large_luggage_count'] = $_POST['large_luggage_count'];
    $_SESSION['small_luggage_count'] = $_POST['small_luggage_count'];
    $_SESSION['hand_luggage_count'] = $_POST['hand_luggage_count'];
    
    echo json_encode(
        array(
            'large_luggage_count' => $_SESSION['large_luggage_count'],
            'small_luggage_count' => $_SESSION['small_luggage_count'],
            'hand_luggage_count' => $_SESSION['hand_luggage_count'],
        ),
    );

    wp_die();
}