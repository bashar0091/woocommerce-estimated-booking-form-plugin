<?php

$car_id = isset($_SESSION['car_id']) ? $_SESSION['car_id'] : '';
$car_price = isset($_SESSION['car_price']) ? $_SESSION['car_price'] : '';
$estimated_ride_person = isset($_SESSION['estimated_ride_person']) ? $_SESSION['estimated_ride_person'] : '';

$estimated_return_confirm = isset($_SESSION['estimated_return_confirm']) ? $_SESSION['estimated_return_confirm'] : '';

$current_user = wp_get_current_user();
$current_user_id = $current_user->ID;

$first_name = $current_user->first_name;
$last_name = $current_user->last_name;

$phone_number = get_user_meta($current_user_id, 'billing_phone', true);
$email = get_user_meta($current_user_id, 'billing_email', true);


$result .= '
<div id="contact_details" class="step-tab">
    <form action="" method="post">

        <input type="hidden" id="checkout_car_id" name="checkout_car_id" value="'.$car_id.'">
        <input type="hidden" id="checkout_car_price" name="checkout_car_price" value="'.$car_price.'">
        <input type="hidden" id="checkout_car_person" name="checkout_car_person" value="'.$estimated_ride_person.'">
        
        <input type="hidden" id="checkout_return_yes" name="checkout_return_yes" value="'.$estimated_return_confirm.'">

        <input type="hidden" id="flight_number" name="flight_number" value="">

        <div class="fare_body_top_section">
            <div>
                <h2 class="title_5">Jouw gegevens</h2>
            </div>
        </div>

        <div class="fare_details_section">
            
            <div class="fare_details">    
                <div class="fare_details_info">
                    <div class="contact_details_column">
                        <div>
                            <p class="title_8">Voornaam</p>
                            <div class="estimated_input_wrapper estimated_input_wrapper_border">
                                <input type="text" class="" value="'.($first_name ? $first_name : '').'" name="user_first_name" placeholder="Voornaam" required="">
                            </div>
                        </div>
                        <div>
                            <p class="title_8">Achternaam</p>
                            <div class="estimated_input_wrapper estimated_input_wrapper_border">
                                <input type="text" class="" value="'.($last_name ? $last_name : '').'" name="user_last_name" placeholder="Achternaam" required="">
                            </div>
                        </div>
                    </div>

                    <div class="mt_20">
                        <div>
                            <p class="title_8">E-mailadres</p>
                            <div class="estimated_input_wrapper estimated_input_wrapper_border">
                                <input type="email" class="" value="'.($email ? $email : '').'" name="user_email_add" placeholder="E-mailadres" required="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fare_comment">
                    <p class="title_8">Telefoonnummer</p>
                    <div class="estimated_input_wrapper estimated_input_wrapper_border">
                        <input type="tel" class="" value="'.$phone_number.'" name="user_telephone" placeholder="Telefoonnummer" required="">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="fare_body_footer_section">
            <div>
                <a href="/boek" class="back_arrow">
                    <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5303 5.46967C10.8232 5.76256 10.8232 6.23744 10.5303 6.53033L5.81066 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H5.81066L10.5303 17.4697C10.8232 17.7626 10.8232 18.2374 10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303L3.46967 12.5303C3.17678 12.2374 3.17678 11.7626 3.46967 11.4697L9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967Z" fill="#F76D27"></path> </g></svg>
                    terug
                </a>
            </div>

            <div>
                <button name="estimated_submit_checkout" class="fare_button_submit data_button_next">Verder</button>
            </div>
        </div>
    </form>
</div>
';