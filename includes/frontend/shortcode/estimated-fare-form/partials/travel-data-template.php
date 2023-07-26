<?php

$estimated_current_date = $_SESSION['estimated_current_date'];
$estimated_by = $_SESSION['estimated_by'];
$estimated_by_holding = $_SESSION['estimated_by_holding'];

$estimated_reach = $_SESSION['estimated_reach'];
$estimated_reach_holding = $_SESSION['estimated_reach_holding'];

$estimated_return_date = $_SESSION['estimated_return_date'];

$car_price = isset($_SESSION['car_price']) ? $_SESSION['car_price'] : '' ;
$car_name = isset($_SESSION['car_name']) ? $_SESSION['car_name'] : '';

$estimated_ride_person = isset($_SESSION['estimated_ride_person']) ? $_SESSION['estimated_ride_person'] : '';

$estimated_return_confirm = $_SESSION['estimated_return_confirm'];

$result .= '

<div id="travel_data" class="step-tab">
    <div class="fare_body_top_section">
        <div>
            <h2 class="title_5">Reisgegevens</h2>
        </div>
    </div>

    
    <div class="toogle_switch">
        <span class="toogle_switch_outer '.($estimated_return_confirm == 'return_yes' ? 'active' : '').'">
            <span class="toogle_switch_inner"></span>
        </span>
    </div>

    <div class="fare_details_section">

        <div class="travel_data_top">
            <div>
                <div>
                    <h4 class="title_7">Reis</h4>
                </div>
                <div>
                    <span class="fare_price">€ <span class="fare_price_show">'.$car_price.'</span></span>
                </div>
            </div>

            <div class="text_right">
                <div>
                    <span class="fare_car">'.$car_name.'</span>
                </div>
                <div>
                    <span class="fare_price"> <span class="passenger">'.$estimated_ride_person.'</span> passagier</span>
                </div>
            </div>
        </div>
        
        <div class="fare_details">    
            <div class="fare_details_info">
                <a href="#!" class="fare_car_edit location_edit">Edit</a>
                
            <div class="popup_location">
                    <div class="estimated_input_loop">
                        <div class="estimated_input_section estimated_input_with_pin">
                            <div class="estimated_pin_wrapper">
                                <span class="estimated_pin"></span>
                            </div>
                            <div class="estimated_location_suggest">
                                <div class="estimated_input_wrapper">
                                    <span class="estimated_input_icon">van</span>
                                    <input type="text" name="estimated_by" value="'.$estimated_by.'" class="estimated_location_map estimated_addresss estimated_addresss_first" placeholder="straatnaam met huisnummer" required="">
                                    <input type="text" name="estimated_by_holding" value="'.$estimated_by_holding.'" class="estimated_holding" placeholder="Holding No.">
                                </div>
                            <div class="estimated_location_dropdown"></div>
                        </div>
                    </div>
                </div>

                <div class="estimated_input_with_pin estimated_input_with_pin_margin">
                    <div class="estimated_pin_wrapper estimated_input_add">
                        <span class="estimated_pin estimated_plus">
                            <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                            <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                455,242.5 "></polygon>
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
                            <input type="text" name="estimated_reach" value="'.$estimated_reach.'" class="estimated_location_map estimated_addresss estimated_addresss_last" placeholder="straatnaam met huisnummer" required="">
                            <input type="text" name="estimated_reach_holding" value="'.$estimated_reach_holding.'" class="estimated_holding" placeholder="Holding No.">
                        </div>
                        <div class="estimated_location_dropdown"></div>
                    </div>
                </div>

                <div> 
                    <a href="#!" class="fare_car_edit location_cancel">Close</a>
                    <a href="#!" class="fare_car_edit location_update">Update</a>
                </div>
            </div>

                <div>
                    <div class="fare_details_date">
                        <p class="title_8">Ophaalmoment</p>
                        <div class="estimated_input_wrapper estimated_input_wrapper_border">
                            <span class="estimated_input_icon">
                                <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="#F76D27"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="#F76D27"></path>
                                </svg>
                            </span>
                            <input type="text" class="estimated_calendar" value="'.$estimated_current_date .'" name="estimated_current_date" placeholder="Selecteer datum en tijd" required="">
                        </div>
                    </div>

                    <div class="estimated_body_left">
                        <div class="estimated_input_loop">
                            <div class="fare_timeline estimated_input_with_pin">
                                <div class="estimated_pin_wrapper">
                                    <span class="fare_time">
                                        07:35   
                                    </span>
                                    <span class="estimated_pin estimated_pin_height"></span>
                                </div>
                                <div class="estimated_location_suggest fare_suggest">
                                    <h4 class="title_7 location_first">'.$estimated_by.'</h4>
                                    <p>'.$estimated_by_holding.'</p>
                                </div>
                            </div>
                        </div>

                        <div class="estimated_input_with_pin estimated_input_with_pin_margin fare_pin_margin">
                            <span class="fare_time"></span>
                            <div class="estimated_pin_wrapper location_edit">
                                <span class="estimated_pin estimated_pin_color estimated_plus fare_plus">
                                    <svg fill="#F76D27" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                        455,242.5 "></polygon>
                                    </svg>
                                </span>
                            </div>
                            <a href="#!" class="title_3 title_3_color location_edit">
                                tussenstop toevoegen
                            </a>
                        </div>

                        <div class="fare_timeline estimated_input_with_pin">
                            <div class="estimated_pin_wrapper">
                                <span class="fare_time">
                                    07:35   
                                </span>
                                <span class="estimated_pin estimated_location estimated_location_color estimated_location_fare">
                                    <svg width="800px" height="800px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                    <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-106.000000, -413.000000)" fill="#F76D27">
                                    <path d="M118,422 C116.343,422 115,423.343 115,425 C115,426.657 116.343,428 118,428 C119.657,428 121,426.657 121,425 C121,423.343 119.657,422 118,422 L118,422 Z M118,430 C115.239,430 113,427.762 113,425 C113,422.238 115.239,420 118,420 C120.761,420 123,422.238 123,425 C123,427.762 120.761,430 118,430 L118,430 Z M118,413 C111.373,413 106,418.373 106,425 C106,430.018 116.005,445.011 118,445 C119.964,445.011 130,429.95 130,425 C130,418.373 124.627,413 118,413 L118,413 Z" id="location" sketch:type="MSShapeGroup">
                                    </path>
                                    </g>
                                    </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="estimated_location_suggest fare_suggest">
                                <h4 class="title_7 location_last">'.$estimated_reach.'</h4>
                                <p>'.$estimated_reach_holding.'</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="fare_comment">
                <p class="title_8">Opmerking(en) <span>optioneel</span></p>
                <textarea>

                </textarea>
            </div>
        </div>
    </div>

    <div class="fare_details_section fare_retour '.(!$estimated_return_confirm == 'return_yes' ? 'fare_retour_disable' : '').'">
        <div class="travel_data_top">
            <div>
                <div>
                    <h4 class="title_7">Reis</h4>
                </div>
                <div>
                    <span class="fare_price">€ <span class="fare_price_show">'.$car_price.'</span></span>
                </div>
            </div>

            <div class="text_right">
                <div>
                    <span class="fare_car">'.$car_name.'</span>
                </div>
                <div>
                    <span class="fare_price"> <span class="passenger">'.$estimated_ride_person.'</span> passagier</span>
                </div>
            </div>
        </div>
        
        <div class="fare_details">    
            <div class="fare_details_info">
                <div>
                    <div class="fare_details_date">
                        <p class="title_8">Ophaalmoment</p>
                        <div class="estimated_input_wrapper estimated_input_wrapper_border">
                            <span class="estimated_input_icon">
                                <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z" fill="#F76D27"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="#F76D27"></path>
                                </svg>
                            </span>
                            <input type="text" class="estimated_calendar" value="'.$estimated_return_date.'" name="estimated_current_date" placeholder="Selecteer datum en tijd" required="">
                        </div>
                    </div>

                    <div class="estimated_body_left">
                        <div class="estimated_input_loop">
                            <div class="fare_timeline estimated_input_with_pin">
                                <div class="estimated_pin_wrapper">
                                    <span class="fare_time">
                                        07:35   
                                    </span>
                                    <span class="estimated_pin estimated_pin_height"></span>
                                </div>
                                <div class="estimated_location_suggest fare_suggest">
                                    <h4 class="title_7 location_last">'.$estimated_reach.'</h4>
                                    <p>'.$estimated_reach_holding.'</p>
                                </div>
                            </div>
                        </div>

                        <div class="estimated_input_with_pin estimated_input_with_pin_margin fare_pin_margin">
                            <span class="fare_time"></span>
                            <div class="estimated_pin_wrapper estimated_input_add">
                                <span class="estimated_pin estimated_pin_color estimated_plus fare_plus">
                                    <svg fill="#F76D27" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                                        455,242.5 "></polygon>
                                    </svg>
                                </span>
                            </div>
                            <a href="#!" class="title_3 title_3_color">
                                tussenstop toevoegen
                            </a>
                        </div>

                        <div class="fare_timeline estimated_input_with_pin">
                            <div class="estimated_pin_wrapper">
                                <span class="fare_time">
                                    07:35   
                                </span>
                                <span class="estimated_pin estimated_location estimated_location_color estimated_location_fare">
                                    <svg width="800px" height="800px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                    <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-106.000000, -413.000000)" fill="#F76D27">
                                    <path d="M118,422 C116.343,422 115,423.343 115,425 C115,426.657 116.343,428 118,428 C119.657,428 121,426.657 121,425 C121,423.343 119.657,422 118,422 L118,422 Z M118,430 C115.239,430 113,427.762 113,425 C113,422.238 115.239,420 118,420 C120.761,420 123,422.238 123,425 C123,427.762 120.761,430 118,430 L118,430 Z M118,413 C111.373,413 106,418.373 106,425 C106,430.018 116.005,445.011 118,445 C119.964,445.011 130,429.95 130,425 C130,418.373 124.627,413 118,413 L118,413 Z" id="location" sketch:type="MSShapeGroup">
                                    </path>
                                    </g>
                                    </g>
                                    </svg>
                                </span>
                            </div>
                            <div class="estimated_location_suggest fare_suggest">
                                <h4 class="title_7 location_first">'.$estimated_by.'</h4>
                                <p>'.$estimated_by_holding.'</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="fare_comment">
                <p class="title_8">Opmerking(en) <span>optioneel</span></p>
                <textarea>

                </textarea>
            </div>
        </div>
    </div>

    <div class="fare_body_footer_section">
        <div>
            <a href="/" class="back_arrow">
                <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5303 5.46967C10.8232 5.76256 10.8232 6.23744 10.5303 6.53033L5.81066 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H5.81066L10.5303 17.4697C10.8232 17.7626 10.8232 18.2374 10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303L3.46967 12.5303C3.17678 12.2374 3.17678 11.7626 3.46967 11.4697L9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967Z" fill="#F76D27"></path> </g></svg>
                terug
            </a>
        </div>

        <div>
            <button class="travel_data_submit fare_button_submit data_button_next">Verder</button>
        </div>
    </div>

</div>
';

// ajax requester 
require_once(dirname(dirname(dirname(dirname(plugin_dir_path( __FILE__ ))))) . '/frontend/ajax/request/travel-data-template-ajax-request.php');