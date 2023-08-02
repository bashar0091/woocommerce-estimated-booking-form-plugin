<?php

/**
 * 
 * Shortcode for estimated form
 * 
 */

function estimated_template_shortcode() {

    $estimated_by = isset($_SESSION['estimated_by']) ? $_SESSION['estimated_by'] : '';
    $estimated_by_holding = isset($_SESSION['estimated_by_holding']) ? $_SESSION['estimated_by_holding'] : '';

    $estimated_reach = isset($_SESSION['estimated_reach']) ? $_SESSION['estimated_reach'] : '';
    $estimated_reach_holding = isset($_SESSION['estimated_reach_holding']) ? $_SESSION['estimated_reach_holding'] : '';

    $big_luggage = isset($_SESSION['big_luggage']) ? $_SESSION['big_luggage'] : '';
    $small_luggage = isset($_SESSION['small_luggage']) ? $_SESSION['small_luggage'] : '';

    $estimated_current_date = isset($_SESSION['estimated_current_date']) ? $_SESSION['estimated_current_date'] : '';

    $estimated_return_confirm = isset($_SESSION['estimated_return_confirm']) ? $_SESSION['estimated_return_confirm'] : '';

    $estimated_return_date = isset($_SESSION['estimated_return_date']) ? $_SESSION['estimated_return_date'] : '';

    $estimated_ride_person = isset($_SESSION['estimated_ride_person']) ? $_SESSION['estimated_ride_person'] : 1;

    $distance_result = isset($_SESSION['distance_result']) ? $_SESSION['distance_result'] : '';

    $result = '';
    $result .= '
    
        <div class="estimated_wrapper_section">
            <div class="estimated_wrapper_container">
                <form action="" method="post">
                    <input type="hidden" value="'.$distance_result.'" id="distance-result" name="distance_result" />

                    <div class="estimated_body_section">
                        <div class="estimated_body_left">
                            <h3 class="title_2">Waar wil je heen?</h3>

                            <div class="estimated_input_loop">

                                <div class="estimated_input_section estimated_input_with_pin">
                                    <div class="estimated_pin_wrapper">
                                        <span class="estimated_pin"></span>
                                    </div>
                                    <div class="estimated_location_suggest">
                                        <div class="estimated_input_wrapper">
                                            <span class="estimated_input_icon">van</span>
                                            <input type="text" name="estimated_by" class="estimated_location_map estimated_addresss" placeholder="straatnaam" value="'.$estimated_by.'" required>
                                            <input type="text" name="estimated_by_holding" class="estimated_holding" placeholder="House No.." value="'.$estimated_by_holding.'">
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
                                        <input type="text" name="estimated_reach_holding" class="estimated_holding" placeholder="House No.." value="'.$estimated_reach_holding.'">
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
                                    <input type="text" class="estimated_calendar" name="estimated_return_date" value="'.$estimated_return_date.'" placeholder="Enkele reis" autocomplete="off">
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