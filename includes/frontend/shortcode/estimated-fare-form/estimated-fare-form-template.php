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
    <div class="progress_bare">
        <span class="bare">
            <span class="progressede"></span>
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

    ob_start();
    require_once('partials/travel-data-template.php');
    $result .= ob_get_clean();

    ob_start();
    require_once('partials/estimated-contact.php');
    $result .= ob_get_clean();

    $result .= '
                </div>
            </div>
        </div>
    </div>';

    return $result;
  
 }
 add_shortcode( 'estimated-fare-form', 'estimated_fare_template_shortcode' );