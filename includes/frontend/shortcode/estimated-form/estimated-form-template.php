<?php
/**
 * 
 * Shortcode for estimated form
 * 
 */

function estimated_template_shortcode() {

    $estimated_by = isset($_SESSION['estimated_by']) ? $_SESSION['estimated_by'] : null;
    $estimated_by_holding = isset($_SESSION['estimated_by_holding']) ? $_SESSION['estimated_by_holding'] : null;

    $estimated_reach = isset($_SESSION['estimated_reach']) ? $_SESSION['estimated_reach'] : null;
    $estimated_reach_holding = isset($_SESSION['estimated_reach_holding']) ? $_SESSION['estimated_reach_holding'] : null;

    $big_luggage = isset($_SESSION['big_luggage']) ? $_SESSION['big_luggage'] : null;
    $small_luggage = isset($_SESSION['small_luggage']) ? $_SESSION['small_luggage'] : null;

    $estimated_current_date = isset($_SESSION['estimated_current_date']) ? $_SESSION['estimated_current_date'] : null;

    $estimated_return_confirm = isset($_SESSION['estimated_return_confirm']) ? $_SESSION['estimated_return_confirm'] : null;

    $estimated_return_date = isset($_SESSION['estimated_return_date']) ? $_SESSION['estimated_return_date'] : null;

    $estimated_ride_person = isset($_SESSION['estimated_ride_person']) ? $_SESSION['estimated_ride_person'] : 1;

    $distance_result = isset($_SESSION['distance_result']) ? $_SESSION['distance_result'] : null;


    $price_range = isset($_SESSION['price_range']) ? $_SESSION['price_range'] : null;

    $result = '';
    $result .= '
    
        <div class="estimated_wrapper_section">
            <div class="estimated_wrapper_container">
                <form action="" method="post">
                    <input type="hidden" value="'.$distance_result.'" id="distance-result" name="distance_result" />

                    <div class="estimated_body_section">
                        <div class="estimated_body_left">
                            <h3 class="title_2 title_2_flex">
                                Waar wil je heen?

                                <span class="value_swiper">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7 4V20M7 20L3 16M7 20L11 16M17 4V20M17 4L21 8M17 4L13 8" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </span>
                            </h3>

                            <div class="estimated_input_loop">

                                <div class="estimated_input_section estimated_input_with_pin">
                                    <div class="estimated_pin_wrapper">
                                        <span class="estimated_pin"></span>
                                    </div>
                                    <div class="estimated_location_suggest">
                                        <div class="estimated_input_wrapper">
                                            <select class="price_range_select" style="height: auto;padding: 0;">
                                                <option> Kilometer prijs</option>
                                                <option '.($price_range ? "selected" : "").' value="fixed_price">Vaste prijs</option>
                                            </select>
                                            <select '.($price_range ? "name='price_range';" : "").' class="price_range_show" style="height: auto;padding: 0; '.($price_range ? "" : 'display: none;').'" required>';
                                                
                                                $args = array(
                                                    'post_type'      => 'fixed_price_location',
                                                    'posts_per_page' => -1,
                                                    'order' => 'ASC'
                                                );
                                                
                                                $query = new WP_Query($args);
                                                
                                                if ($query->have_posts()) {
                                                    while ($query->have_posts()) {
                                                        $query->the_post();
                                                        $result .= '<option '.($price_range == get_field('location_price') ? "selected" : '').' value="'.get_field('location_price').'">'.get_the_title().'</option>';
                                                    }
                                                    
                                                    wp_reset_postdata();
                                                }

                                            $result .='
                                            </select>
                                            
                                            <input type="text" name="estimated_by" class="estimated_location_map estimated_addresss estimated_addresss_first" placeholder="straatnaam" value="'.$estimated_by.'" required style="'.($price_range ? "display: none;" : '').'">
                                            <input type="text" name="estimated_by_holding" class="estimated_holding estimated_holding_first" placeholder="Huis nr.." value="'.$estimated_by_holding.'">
                                        </div>
                                        <div class="estimated_location_dropdown"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="estimated_input_with_pin estimated_input_with_pin_margin">
                                <div class="estimated_pin_wrapper estimated_input_add">
                                    <span class="estimated_pin estimated_plus">
                                        <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            viewBox="0 0 455 455" xml:space="preserve">
                                        <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                            455,242.5 "/>
                                        </svg>
                                    </span>
                                </div>
                                <a href="#!" class="title_3 estimated_input_add">
                                    tussenstop toevoegen 
                                </a>
                            </div>

                            <div class="estimated_input_section estimated_input_with_pin">
                                <div class="estimated_pin_wrapper">
                                    <span class="estimated_pin estimated_location">
                                        <svg width="800px" height="800px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                        <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-106.000000, -413.000000)" fill="#000000">
                                        <path d="M118,422 C116.343,422 115,423.343 115,425 C115,426.657 116.343,428 118,428 C119.657,428 121,426.657 121,425 C121,423.343 119.657,422 118,422 L118,422 Z M118,430 C115.239,430 113,427.762 113,425 C113,422.238 115.239,420 118,420 C120.761,420 123,422.238 123,425 C123,427.762 120.761,430 118,430 L118,430 Z M118,413 C111.373,413 106,418.373 106,425 C106,430.018 116.005,445.011 118,445 C119.964,445.011 130,429.95 130,425 C130,418.373 124.627,413 118,413 L118,413 Z" id="location" sketch:type="MSShapeGroup">
                                        </path>
                                        </g>
                                        </g>
                                        </svg>
                                    </span>
                                </div>
                                <div class="estimated_location_suggest">
                                    <div class="estimated_input_wrapper">
                                        <span class="estimated_input_icon">naar</span>
                                        <input type="text" name="estimated_reach" class="estimated_location_map estimated_addresss estimated_addresss_last" placeholder="straatnaam" value="'.$estimated_reach.'" required>
                                        <input type="text" name="estimated_reach_holding" class="estimated_holding estimated_holding_last" placeholder="Huis nr.." value="'.$estimated_reach_holding.'">
                                    </div>
                                    <div class="estimated_location_dropdown"></div>
                                </div>
                            </div>

                            <div class="estimated_input_radio_section">
                                
                                <div>
                                    <p class="title_3 title_3_gap">Grote koffers</p>
                                    <div class="estimated_input_wrapper estimated_input_count estimated_input_radius_fix">
                                        <a href="#!" class="estimated_count_minus">
                                            <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="1" height="1" fill="#000"/>
                                            <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <input type="number" name="big_luggage" value="'.($big_luggage ? $big_luggage : 0).'" class="person_count" min="0" max="8">
                                        <a href="#!" class="estimated_count_add">
                                            <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                            <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                455,242.5 "></polygon>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div>
                                    <p class="title_3 title_3_gap">Handbagages</p>
                                    <div class="estimated_input_wrapper estimated_input_count estimated_input_radius_fix">
                                        <a href="#!" class="estimated_count_minus">
                                            <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="1" height="1" fill="#000"/>
                                            <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <input type="number" name="small_luggage" value="'.($small_luggage ? $small_luggage : 0).'" class="person_count" min="0" max="8">
                                        <a href="#!" class="estimated_count_add">
                                            <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                            <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                455,242.5 "></polygon>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>





                            <div class="baggage_popup">
                                <a href="#!" class="estimated_button_submit title_3 title_pop baggage_popup_click">Bijzondere Bagages</a>

                                <div class="baggage_popup_box">

                                    <a href="#!" class="baggage_popup_close">
                                        <svg fill="#f76d27" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M33.934,54.458l30.822,27.938c0.383,0.348,0.864,0.519,1.344,0.519c0.545,0,1.087-0.222,1.482-0.657 c0.741-0.818,0.68-2.083-0.139-2.824L37.801,52.564L64.67,22.921c0.742-0.818,0.68-2.083-0.139-2.824 c-0.817-0.742-2.082-0.679-2.824,0.139L33.768,51.059c-0.439,0.485-0.59,1.126-0.475,1.723 C33.234,53.39,33.446,54.017,33.934,54.458z"></path> </g> </g></svg>
                                    </a>
                                    
                                    <div class="extra_carry_list_section">
                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg fill="#f76d27" width="35px" height="35px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="m 4.5113849,0.99997741 c 0.57023,0 1.03302,0.46278999 1.03302,1.03301999 0,0.57022 -0.46279,1.03298 -1.03302,1.03298 -0.5702298,0 -1.0330194,-0.46276 -1.0330194,-1.03298 0,-0.57023 0.4627896,-1.03301999 1.0330194,-1.03301999 M 3.8519069,5.8816874 c -0.6394327,0.34236 -1.1190148,0.80225 -1.4613138,1.40698 -0.3393003,0.60626 -0.6544759,1.41609 -0.5700201,2.19276 0.088962,0.7765796 0.3362811,1.6316596 0.867118,2.2198296 0.5353148,0.58206 1.5472379,1.13399 2.3042909,1.2547 0.760062,0.1146 1.72521,0.009 2.423417,-0.35591 0.698208,-0.37099 1.26375,-0.97274 1.728254,-1.83531 L 8.6821569,9.9112674 c -0.196031,0.5443796 -0.521775,1.0963296 -1.011923,1.5169996 -0.493121,0.4178 -0.895771,0.7254 -2.035847,0.79782 -1.087282,-0.10858 -1.7312263,-0.58661 -2.2288969,-1.03449 -0.4901126,-0.45097 -0.6484579,-1.07532 -0.7118169,-1.6392896 -0.060298,-0.56705 0.1071057,-1.27581 0.3378319,-1.72822 0.2352497,-0.45243 0.5790811,-0.76762 1.0510719,-0.96368 l -0.2306885,-0.97875 z m 0.836855,1.9424 c -0.202102,-0.64996 -0.373996,-1.24261 -0.515758,-1.81872 -0.1432697,-0.57758 -0.3453357,-1.17776 -0.3393004,-1.60301 0.00455,-0.42678 0.1191328,-0.75855 0.3559084,-0.92596 0.238269,-0.1659 0.803759,-0.16892 1.051072,-0.0723 0.23827,0.092 0.288051,0.36041 0.393623,0.62431 0.10254,0.26089 0.179476,0.56403 0.230726,0.92593 0.628867,-0.0271 1.103936,-0.0332 1.443227,-0.0181 0.336281,0.0108 0.464468,-0.0196 0.57002,0.10704 0.09651,0.12819 0.143269,0.52632 0.03617,0.65902 -0.111589,0.12367 -0.372456,0.086 -0.677076,0.10715 -0.306113,0.021 -0.68012,0.0271 -1.140075,0.0181 l 0.26693,0.85505 c 0.325761,0.001 0.634883,0.0137 0.944051,0.0362 0.307621,0.0227 0.631875,0.007 0.891258,0.0889 0.251844,0.0784 0.446311,0.11012 0.6409,0.37403 0.19452,0.25935 0.324254,0.78119 0.517262,1.17626 0.191504,0.38903 0.413215,0.76153 0.624318,1.15819 0.2080981,0.39513 0.4026501,0.7857096 0.6062311,1.1943696 0.553473,-0.23227 0.959131,-0.33933 1.229044,-0.32123 0.266891,0.0181 0.393622,0.29856 0.374031,0.42822 -0.02262,0.12517 -0.173441,0.17951 -0.499175,0.33783 -0.334774,0.15538 -0.808306,0.35745 -1.461278,0.60627 -0.4132151,-0.64398 -0.8113511,-1.28184 -1.2290791,-1.9424296 -0.419197,-0.66352 -0.823351,-1.31498 -1.247131,-1.99514 l -3.065892,0 z"></path></g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Opvouwbare rolstoel</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_1" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg viewBox="-1.05 0 20.104 20.104" xmlns="http://www.w3.org/2000/svg" fill="#f76d27" stroke="#f76d27"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="walker" transform="translate(-3 -2)"> <circle id="secondary" fill="#ffffff" cx="2" cy="2" r="2" transform="translate(16 17)"></circle> <path id="primary" d="M17.87,17,16.12,3.87a1,1,0,0,0-1-.87H7.9a1,1,0,0,0-1,.89L5,21" fill="none" stroke="#ffffff76d27" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-2" data-name="primary" d="M17,12H6m14,7a2,2,0,1,1-2-2A2,2,0,0,1,20,19ZM4,21H6" fill="none" stroke="#ffffff76d27" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Rollator</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_2" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg fill="#f76d27" width="64px" height="64px" viewBox="-1.5 0 19 19" xmlns="http://www.w3.org/2000/svg" class="cf-icon-svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M4.086 7.9a1.91 1.91 0 0 1-.763 2.52c-.81.285-1.782-.384-2.17-1.492a1.91 1.91 0 0 1 .762-2.521c.81-.285 1.782.384 2.171 1.492zm6.521 7.878a2.683 2.683 0 0 1-1.903-.788.996.996 0 0 0-1.408 0 2.692 2.692 0 0 1-3.807-3.807 6.377 6.377 0 0 1 9.022 0 2.692 2.692 0 0 1-1.904 4.595zM7.73 6.057c.127 1.337-.563 2.496-1.54 2.588-.977.092-1.872-.917-1.998-2.254-.127-1.336.563-2.495 1.54-2.587.977-.093 1.871.916 1.998 2.253zm.54 0c-.127 1.337.563 2.496 1.54 2.588.977.092 1.871-.917 1.998-2.254.127-1.336-.563-2.495-1.54-2.587-.977-.093-1.872.916-1.998 2.253zm3.644 1.842a1.91 1.91 0 0 0 .763 2.522c.81.284 1.782-.385 2.17-1.493a1.91 1.91 0 0 0-.762-2.521c-.81-.285-1.782.384-2.171 1.492z"></path></g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Huisdieren</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_3" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.30727 15.706C9.29598 17.511 7.86208 18.9659 6.10221 18.958C4.34234 18.9501 2.9209 17.4824 2.925 15.6774C2.92909 13.8724 4.35718 12.4115 6.11707 12.412C6.53111 12.4115 6.94121 12.4944 7.32412 12.656L8.7759 10H14.6259L15.8359 12.77C16.2843 12.5334 16.7814 12.4103 17.2857 12.411C18.905 12.4088 20.2699 13.6495 20.4623 15.2986C20.6548 16.9477 19.6139 18.4837 18.0397 18.8735C16.4656 19.2633 14.8561 18.3836 14.2937 16.8261C13.7313 15.2686 14.3939 13.5258 15.8359 12.77L14.6259 10L11.7009 15H9.23415C9.283 15.232 9.30752 15.4687 9.30727 15.706Z" stroke="#f76d27" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13.9271 10.2725C14.0776 10.6584 14.5125 10.8492 14.8984 10.6987C15.2843 10.5482 15.4751 10.1134 15.3246 9.72749L13.9271 10.2725ZM12.6759 5L13.3746 4.72749C13.2623 4.43957 12.9849 4.25 12.6759 4.25V5ZM10.7259 4.25C10.3116 4.25 9.97585 4.58579 9.97585 5C9.97585 5.41421 10.3116 5.75 10.7259 5.75V4.25ZM11.0573 15.3852C11.2701 15.7406 11.7307 15.8563 12.0861 15.6435C12.4415 15.4308 12.5571 14.9702 12.3444 14.6148L11.0573 15.3852ZM10.2247 12.534L9.57362 12.9063C9.5761 12.9106 9.57862 12.9149 9.58119 12.9192L10.2247 12.534ZM8.77585 10L8.1056 10.3365C8.11167 10.3486 8.11806 10.3605 8.12477 10.3723L8.77585 10ZM7.26948 7L7.93973 6.66345C7.81246 6.40999 7.5531 6.25 7.26948 6.25V7ZM4.87585 6.25C4.46164 6.25 4.12585 6.58579 4.12585 7C4.12585 7.41421 4.46164 7.75 4.87585 7.75V6.25ZM16.516 12.454C16.3415 12.0783 15.8954 11.9153 15.5198 12.0898C15.1442 12.2644 14.9811 12.7104 15.1557 13.086L16.516 12.454ZM16.2057 15.346C16.3803 15.7217 16.8263 15.8847 17.2019 15.7102C17.5776 15.5356 17.7406 15.0896 17.5661 14.714L16.2057 15.346ZM7.95907 13.0551C8.17949 12.7044 8.07388 12.2414 7.72318 12.021C7.37248 11.8006 6.9095 11.9062 6.68908 12.2569L7.95907 13.0551ZM5.85085 15L5.21586 14.6009C5.0706 14.832 5.06238 15.1238 5.19442 15.3628C5.32645 15.6017 5.57787 15.75 5.85085 15.75V15ZM9.2341 15.75C9.64832 15.75 9.9841 15.4142 9.9841 15C9.9841 14.5858 9.64832 14.25 9.2341 14.25V15.75ZM15.3246 9.72749L13.3746 4.72749L11.9771 5.27251L13.9271 10.2725L15.3246 9.72749ZM12.6759 4.25H10.7259V5.75H12.6759V4.25ZM12.3444 14.6148L10.8682 12.1488L9.58119 12.9192L11.0573 15.3852L12.3444 14.6148ZM10.8758 12.1617L9.42694 9.62773L8.12477 10.3723L9.57362 12.9063L10.8758 12.1617ZM9.4461 9.66345L7.93973 6.66345L6.59923 7.33655L8.1056 10.3365L9.4461 9.66345ZM7.26948 6.25H4.87585V7.75H7.26948V6.25ZM15.1557 13.086L16.2057 15.346L17.5661 14.714L16.516 12.454L15.1557 13.086ZM6.68908 12.2569L5.21586 14.6009L6.48585 15.3991L7.95907 13.0551L6.68908 12.2569ZM5.85085 15.75H9.2341V14.25H5.85085V15.75Z" fill="#f76d27"></path> </g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Fiets</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_4" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg fill="#f76d27" height="64px" width="64px" version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve" stroke="#f76d27"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_1_" d="M72.6,138.7l64.8-75.1l-16.9-0.1L91,97.5c-1.7,2.1-4.4,3.5-7.3,3.5c-5.3,0-9.5-4.3-9.5-9.5 c0-2.8,1.2-5.4,3.2-7.1l31.7-36.5c1.8-2.1,4.4-3.4,7.3-3.4l45.9,0c3.4,0,6.4,1.4,8.6,3.5l29.3,29.3l24.3-24.2 c1.7-1.4,3.9-2.3,6.3-2.3c5.4,0,9.8,4.4,9.8,9.8c0,2.4-0.8,4.5-2.2,6.2l-11.8,11.9L176,225h-8.1l45.9-133.6l-4.6,4.7 c-8.9,8.9-16,1.3-16,1.3l-17.9-18l-28.1,32.4l25.7,25.7c0,0,5.4,5,2.3,15l-14.4,64.2c-1.1,5.6-6.1,9.8-12,9.8 c-6.8,0-12.2-5.5-12.2-12.2c0-1.1,0.1-2.1,0.4-3.1l11.8-52.7l-29.2-28.4l-25.1,28c0,0-4.1,5-14.8,4.6L28.7,163 c-5.7,0.1-10.9-3.8-12.1-9.6c-1.5-6.6,2.6-13,9.2-14.5c1-0.2,2.1-0.3,3.1-0.3L72.6,138.7z M185.5,49.5c10.4,0,18.9-8.5,18.9-18.9 c0-10.4-8.5-18.9-18.9-18.9c-10.4,0-18.9,8.5-18.9,18.9C166.6,41,175.1,49.5,185.5,49.5z M79.6,217.9l-5.5-5.9c0,0-5.4,3.6-8.3,0.5 l-0.1-0.2L2.8,149.2l0,11L61.4,219C68.1,226.3,79.6,217.9,79.6,217.9z M242.8,224.7c0,6.3-5.3,11.3-11.6,11.3H43v8h188.2 c10.6,0,19.3-8.5,19.3-19.2L242.8,224.7z M68,93H3v8h65V93z"></path> </g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Wintersport</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_5" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg fill="#f76d27" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 209 256" enable-background="new 0 0 209 256" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M96.571,96.408V2.003C96.57,2.002,96.569,2.001,96.568,2C44.367,1.858,2.021,44.204,2.164,96.405 c0.001,0.001,0.002,0.002,0.003,0.003H96.571z M127.129,151.723c26.556-0.039,48.075-21.558,48.114-48.114l30.153-30.153 c1.921-1.92,1.921-5.034,0-6.954c-1.919-1.92-5.034-1.92-6.953,0l-37.036,37.036H10.527c0,26.613,21.574,48.187,48.187,48.187h7.302 l23.602,23.602l-21.762,21.762c-5.195-3.786-11.583-6.027-18.489-6.027c-17.352,0-31.469,14.117-31.469,31.469 S32.015,254,49.368,254s31.469-14.117,31.469-31.469c0-6.905-2.241-13.294-6.027-18.489l21.762-21.762l21.761,21.761 c-3.786,5.195-6.027,11.584-6.027,18.489c0,17.352,14.117,31.469,31.469,31.469s31.469-14.117,31.469-31.469 s-14.117-31.469-31.469-31.469c-6.905,0-13.294,2.241-18.489,6.027l-21.761-21.762L127.129,151.723z M49.368,240.232 c-9.761,0-17.701-7.941-17.701-17.701s7.941-17.701,17.701-17.701s17.701,7.941,17.701,17.701S59.128,240.232,49.368,240.232z M161.477,222.531c0,9.76-7.941,17.701-17.701,17.701c-9.76,0-17.701-7.941-17.701-17.701s7.941-17.701,17.701-17.701 C153.535,204.829,161.477,212.771,161.477,222.531z M79.923,151.725h33.297l-16.648,16.648L79.923,151.725z"></path> </g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Kinderwagen</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_6" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg fill="#f76d27" width="64px" height="64px" viewBox="-48 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M96 416h224c0 17.7-14.3 32-32 32h-16c-17.7 0-32 14.3-32 32v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-20c0-17.7-14.3-32-32-32h-16c-17.7 0-32-14.3-32-32zm320-208c0 74.2-39 139.2-97.5 176h-221C39 347.2 0 282.2 0 208 0 93.1 93.1 0 208 0s208 93.1 208 208zm-180.1 43.9c18.3 0 33.1-14.8 33.1-33.1 0-14.4-9.3-26.3-22.1-30.9 9.6 26.8-15.6 51.3-41.9 41.9 4.6 12.8 16.5 22.1 30.9 22.1zm49.1 46.9c0-14.4-9.3-26.3-22.1-30.9 9.6 26.8-15.6 51.3-41.9 41.9 4.6 12.8 16.5 22.1 30.9 22.1 18.3 0 33.1-14.9 33.1-33.1zm64-64c0-14.4-9.3-26.3-22.1-30.9 9.6 26.8-15.6 51.3-41.9 41.9 4.6 12.8 16.5 22.1 30.9 22.1 18.3 0 33.1-14.9 33.1-33.1z"></path></g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Golftas</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_7" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="extra_carry_list_item luggage_list_item">
                                            <div class="luggage_list_icon">
                                            <svg fill="#f76d27" height="64px" width="64px" version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_8_"> <path id="XMLID_12_" d="M253.4,141.2c-6.4-19.6-31.4-20.8-54.5-10.8c-4,1.7-9.2,3.2-15.2,4.3l-4.7-18.2c3.8-1.9,6.2-5.9,6-10.4 c-0.3-6.1-5.4-10.9-11.5-10.6l-3.4-13.4c3.4-2.6,5.2-6.9,4.2-11.3c-1.4-6-7.3-9.8-13.3-8.4c0,0-48.7,0.4-64,4.5 c-15.2,4.1-20.4,29.7-20.4,29.7L63.3,140H0v20h168.3C187.9,160,239.3,154.8,253.4,141.2z M124.5,85.9l37.8-1.6l3,11.6 c-10.2,0.5-28.4,1.4-44.6,2.4L124.5,85.9z M114,120.5l57-2.6l4.7,18.2c-23.3,3.4-53.4,3.8-67.7,3.9L114,120.5z"></path> <path id="XMLID_14_" d="M220.4,206c-5.7,0-11.2,1.3-16,3.6c-0.4,0.2-0.8,0.3-1.1,0.4l-4.8-18.6c0.9-0.3,1.7-0.6,2.6-1 c6.1-2.8,12.9-4.3,19.5-4.3c0,0,34.5-0.4,34.5-34.2c0-1.3-0.1-2.8-0.3-4.1c-21.5,15.6-79.1,18.2-86.4,18.2H0v27 c4,0,8.2-0.9,11.9-2.6c6.1-2.8,12.8-4.3,19.5-4.3c6.6,0,13.3,1.5,19.3,4.3c4,1.8,8,2.6,12.2,2.6c4.2,0,8.3-0.9,12-2.6 c6.1-2.8,12.9-4.3,19.5-4.3c6.7,0,13.3,1.4,19.4,4.3c3.8,1.8,8,2.6,12.2,2.6c4.1,0,8.2-0.9,12-2.6c6.1-2.8,12.9-4.3,19.4-4.3 c6.8,0,13.3,1.4,19.4,4.3c3.9,1.8,8.1,2.6,12.2,2.6c0.5,0,1-0.1,1.5-0.1l5,19.3c-2.2,0.4-4.3,0.6-6.6,0.6c-5.5,0-10.8-1.2-15.5-3.3 c-4.8-2.3-10.3-3.6-16-3.6s-11.2,1.3-16,3.6c-4.7,2.1-10,3.3-15.5,3.3c-5.5,0-10.8-1.2-15.5-3.3c-4.8-2.3-10.3-3.6-16-3.6 c-5.7,0-11.2,1.3-16,3.6c-4.7,2.1-10,3.3-15.5,3.3c-5.5,0-10.8-1.2-15.5-3.3c-4.8-2.3-10.3-3.6-16-3.6c-5.6,0-11,1.3-15.9,3.6 c-4.8,2.1-10.5,3.3-15.5,3.3v23.3c5,0,10.7-1.2,15.5-3.3c4.8-2.3,10.2-3.6,15.9-3.6c5.7,0,11.1,1.3,16,3.6c4.7,2.1,10,3.3,15.5,3.3 c5.5,0,10.8-1.2,15.5-3.3c4.8-2.3,10.3-3.6,16-3.6c5.7,0,11.2,1.3,16,3.6c4.7,2.1,10,3.3,15.5,3.3c5.5,0,10.8-1.2,15.5-3.3 c4.8-2.3,10.3-3.6,16-3.6s11.2,1.3,16,3.6c4.7,2.1,10,3.3,15.5,3.3c5.5,0,10.8-1.2,15.5-3.3c4.8-2.3,10.3-3.6,16-3.6 c5.7,0,11.2,1.3,16,3.6c4.7,2.1,9.6,3.3,15.6,3.3v-23.3c-6,0-10.9-1.2-15.6-3.3C231.6,207.3,226.1,206,220.4,206z"></path> <circle id="XMLID_15_" cx="106.8" cy="39.6" r="21.6"></circle> </g> </g></svg>
                                            </div>
                                            <div class="luggage_list_title">
                                                <h5>Watersport</h5>
                                            </div>
                                            <div class="luggage_list_number">
                                                <a href="#!" class="luggage_count_minus">
                                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="1" height="1" fill="#000"/>
                                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <input type="number" class="luggage_count" name="bag_extra_8" value="0" min="0" max="3">
                                                <a href="#!" class="luggage_count_plus">
                                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                                        455,242.5 "></polygon>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                    <a href="#!" class="baggage_popup_close estimated_button_submit">toevoegen</a>
                                </div>
                            </div>





                        </div>

                        <div class="estimated_body_right">
                            <h3 class="title_3">Ophaalmoment taxi</h3>

                            <div class="estimated_input_section">
                                <div class="estimated_input_wrapper">
                                    <span class="estimated_input_icon">
                                        <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="#F76D27"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="#F76D27"/>
                                        </svg>
                                    </span>
                                    <input type="text" class="estimated_calendar" name="estimated_current_date" value="'.$estimated_current_date.'" placeholder="Selecteer datum en tijd" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="estimated_input_radio_wrapper estimated_input_radio_wrapper_topgap estimated_check_circle_click">
                                <label for="retour_confirm">
                                    <span class="estimated_radio_circle estimated_check_circle '.($estimated_return_confirm ? 'active' : '').'">
                                        <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Interface / Check">
                                        <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        </svg>
                                    </span>
                                    Retour
                                </label>
                                <input type="checkbox" name="estimated_return_confirm" value="return_yes" id="retour_confirm" '.($estimated_return_confirm ? 'checked' : '').'>
                            </div>

                            <div class="estimated_input_section estimated_input_disabled_check '.($estimated_return_confirm ? '' : 'estimated_input_disabled').'">
                                <div class="estimated_input_wrapper">
                                    <span class="estimated_input_icon">
                                        <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="#F76D27"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="#F76D27"/>
                                        </svg>
                                    </span>
                                    <input type="text" class="estimated_calendar" name="estimated_return_date" value="'.$estimated_return_date.'" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <p class="title_3 title_3_gap">Aantal reizigers</p>

                            <div class="estimated_input_wrapper estimated_input_count estimated_input_radius_fix">
                                <a href="#!" class="estimated_count_minus">
                                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="1" height="1" fill="#000"/>
                                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                                <input type="number" name="estimated_ride_person" value="'.$estimated_ride_person.'" class="person_count" min="1" max="8">
                                <a href="#!" class="estimated_count_add">
                                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                        455,242.5 "></polygon>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="estimated_footer_section">
                        <button type="submit" class="estimated_button_submit" name="estimated_booking">Bereken mijn ritprijs</button>
                    </div>
                </form>
            </div>
        </div>
    ';

    return $result;
}
add_shortcode( 'estimated-form', 'estimated_template_shortcode' );