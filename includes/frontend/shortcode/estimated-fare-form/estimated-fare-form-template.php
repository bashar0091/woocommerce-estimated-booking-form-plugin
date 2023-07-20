<?php

session_start();

/**
 * 
 * Shortcode for estimated fare form
 * 
 */

 function estimated_fare_template_shortcode() {
    $result = '';

    $result .= '
    <div class="progress-bar">
        <span class="bar">
            <span class="progress"></span>
        </span>
    </div>

    <div class="fare_wrapper_section">
        <div class="fare_wrapper_container">
            <div class="fare_wrapper_box">
                <div class="estimated_header_section">
                    <div class="fare_header_tab">';

    ob_start();
    require_once('partials/tab-item.php');
    $result .= ob_get_clean();

    $result .= '
                    </div>
                </div>
                <div class="fare_body_section">';

    ob_start();
    require_once('partials/offers-template.php');
    $result .= ob_get_clean();

    $result .= '
                </div>
            </div>
        </div>
    </div>';

    return $result;
  
 }
 add_shortcode( 'estimated-fare-form', 'estimated_fare_template_shortcode' );