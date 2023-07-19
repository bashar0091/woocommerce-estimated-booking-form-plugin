<?php

/**
 * 
 * Shortcode for estimated fare form
 * 
 */

 function estimated_fare_template_shortcode() {
    ?>
        <div class="fare_wrapper_section">
            <div class="fare_wrapper_container">
                <div class="fare_wrapper_box">
                    <div class="estimated_header_section">
                        <div class="fare_header_tab">
                            <ul>
                                <li class="active"><a href="#!">Bagage</a></li>
                                <li><a href="#!">Aanbiedingen</a></li>
                                <li><a href="#!">Reisgegevens</a></li>
                                <li><a href="#!">Contactgegevens</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="estimated_body_section">
                        <h2 class="title_1">Aanbiedingen</h2>
                    </div>
                    <div class="estimated_footer_section">
                        
                    </div>
                </div>
            </div>
        </div>
    <?php
 }
 add_shortcode( 'estimated-fare-form', 'estimated_fare_template_shortcode' );