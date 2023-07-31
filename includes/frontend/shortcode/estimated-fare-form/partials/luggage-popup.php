<?php 
$large_luggage_count = isset($_SESSION['large_luggage_count']) ? $_SESSION['large_luggage_count'] : 0;
$small_luggage_count = isset($_SESSION['small_luggage_count']) ? $_SESSION['small_luggage_count'] : 0;
$hand_luggage_count = isset($_SESSION['hand_luggage_count']) ? $_SESSION['hand_luggage_count'] : 0;

$result .= '
<div id="luggage" class="step-tab">
    <div class="fare_body_top_section">
        <div>
            <h2 class="title_5">Bagage</h2>
        </div>
        <div>
        <a href="#offers" class="fare_button_submit fare_button_icon luggage_close">
            <svg viewBox="0 0 20 20" height="100%" width="15px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#6728A1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>tag_fill_round [#1176]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-180.000000, -2959.000000)" fill="#6728A1"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M129.020148,2805.2265 C128.444271,2805.2265 127.976892,2804.76459 127.976892,2804.19545 C127.976892,2803.62631 128.444271,2803.1644 129.020148,2803.1644 C129.596025,2803.1644 130.063404,2803.62631 130.063404,2804.19545 C130.063404,2804.76459 129.596025,2805.2265 129.020148,2805.2265 M143.388913,2809.64763 L139.933649,2806.2328 L139.933649,2806.2328 C134.061161,2800.42903 135.435129,2801.81888 133.157701,2799.41861 C132.961569,2799.22477 132.696582,2799 132.420119,2799 L126.085469,2799 C124.933714,2799 124,2800.15684 124,2801.29511 L124,2807.5546 C124,2807.82886 124.109542,2808.09075 124.304631,2808.28458 C128.396281,2812.32732 125.450126,2809.41564 134.536886,2818.39606 C135.351669,2819.20131 136.672431,2819.20131 137.487214,2818.39606 L137.487214,2818.39606 C142.018074,2813.91926 141.012376,2814.91215 143.388913,2812.56343 C144.203696,2811.75818 144.203696,2810.45287 143.388913,2809.64763" id="tag_fill_round-[#1176]"> </path> </g> </g> </g> </g></svg>
            Aanbiedingen
        </a>
        </div>
    </div>

    <div class="luggage_list_section">
        <div class="luggage_list_item">
            <div class="luggage_list_icon">
                <svg width="100%" height="30px" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 14 14" id="svg2" fill="#6728A1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <metadata id="metadata8"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type> <dc:title></dc:title> </cc:work> </rdf:rdf> </metadata> <defs id="defs6"></defs> <rect width="14" height="14" x="0" y="0" id="canvas" style="fill:none;stroke:none;visibility:hidden"></rect> <path d="M 6,1 C 5,1 4,2.0209735 4,3 l 0,1 -0.75,0 0,9 7.5,0 0,-9 L 10,4 10,3 C 10,2 8.9895132,1 8,1 z m 0.5,1.25 1,0 c 0.8599138,0 1.25,0.5994182 1.25,1.25 l 0,0.5 -3.5,0 0,-0.5 C 5.25,2.8707948 5.5557891,2.25 6.5,2.25 z M 2,4 C 0.64345039,4 0,4.6434504 0,6 l 0,5 c 0,1.35655 0.74831793,2 2,2 z m 10,0 0,9 c 1.251682,0 2,-0.748318 2,-2 L 14,6 C 14,4.6853974 13.377523,4 12,4 z" id="luggage" style="fill:#6728A1;fill-opacity:1;stroke:none"></path> </g></svg>
            </div>
            <div class="luggage_list_title">
                <h5>Grote koffers</h5>
                <span>85cm x 55cm x 35cm</span>
            </div>
            <div class="luggage_list_number">
                <a href="#!" class="luggage_count_minus">
                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="1" height="1" fill="#000"/>
                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <input type="number" class="luggage_count large_luggage_count" disabled name="large_luggage_count" value="'.$large_luggage_count.'" min="0" max="8">
                <a href="#!" class="luggage_count_plus">
                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                        455,242.5 "></polygon>
                    </svg>
                </a>
            </div>
        </div>

        <div class="luggage_list_item">
            <div class="luggage_list_icon">
                <svg fill="#6728A1" height="30px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M495.304,101.658H351.196V60.224c0-9.22-7.475-16.696-16.696-16.696H177.499c-9.22,0-16.696,7.475-16.696,16.696v41.433 H16.696C7.48,101.657,0,109.137,0,118.353v138.574h197.754v-21.871c0-9.216,7.48-16.696,16.696-16.696h83.1 c9.216,0,16.696,7.48,16.696,16.696v21.871H512V118.353C512,109.137,504.52,101.658,495.304,101.658z M317.806,101.657H194.195 V76.92h123.611V101.657z"></path> <path d="M314.246,297.43c0,32.111-26.134,58.234-58.246,58.234c-32.111,0-58.246-26.123-58.246-58.234v-7.112H17.018v161.458 c0,9.216,7.48,16.696,16.696,16.696h444.572c9.216,0,16.696-7.48,16.696-16.696V290.318H314.246V297.43z"></path> </g> </g> </g> </g></svg>
            </div>
            <div class="luggage_list_title">
                <h5>Handbagages</h5>
                <span>55cm x 45cm x 25cm</span>
            </div>
            <div class="luggage_list_number">
                <a href="#!" class="luggage_count_minus">
                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="1" height="1" fill="#000"/>
                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <input type="number" class="luggage_count small_luggage_count" disabled name="small_luggage_count" value="'.$small_luggage_count.'" min="0" max="8">
                <a href="#!" class="luggage_count_plus">
                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                        455,242.5 "></polygon>
                    </svg>
                </a>
            </div>
        </div>

        <div class="luggage_list_item">
            <div class="luggage_list_icon">
                <svg fill="#6728a1" height="30px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 507.589 507.589" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M313.505,266.495c-18.8,0-34.1,15.3-34.1,34.1c0,18.8,15.3,34.1,34.1,34.1s34.1-15.3,34.1-34.1 C347.705,281.794,332.405,266.495,313.505,266.495z M322.105,309.195h-17.1c-4.7,0-8.5-3.8-8.5-8.5s3.8-8.5,8.5-8.5h17.1 c4.7,0,8.5,3.8,8.5,8.5S326.805,309.195,322.105,309.195z"></path> </g> </g> <g> <g> <path d="M507.505,404.395l-12.8-178.8c-1.4-20.1-18.3-35.8-38.5-35.8h-68.6c-11.3-50.6-50.5-128-133.8-128s-122.4,77.4-133.8,128 h-68.6c-20.2,0-37.1,15.7-38.5,35.8l-12.8,178.8c-0.8,10.6,3,21.2,10.3,29.1c7.3,7.8,17.6,12.3,28.2,12.3h78.6v-239h17.1v238.9 h17.1v-238.9h17.1v238.9h300.5c10.7,0,21-4.5,28.2-12.3C504.505,425.595,508.205,414.995,507.505,404.395z M313.505,351.794 c-28.2,0-51.2-23-51.2-51.2c0-25.3,18.5-46.3,42.7-50.4v-60.5h-131.8c8.8-29.2,30.9-76.8,80.6-76.8s71.8,47.6,80.6,76.8h-12.3 v60.5c24.2,4.1,42.7,25.1,42.7,50.4C364.705,328.895,341.805,351.794,313.505,351.794z M352.205,189.695 c-9-32.7-34.5-93.9-98.4-93.9s-89.4,61.2-98.4,93.9h-4h-13.9c11.2-45.4,45.7-110.9,116.3-110.9s105.1,65.6,116.3,110.9H352.205z"></path> </g> </g> </g></svg>
            </div>
            <div class="luggage_list_title">
                <h5>Handbagage</h5>
                <span>Handtas, rugzak, etc.</span>
            </div>
            <div class="luggage_list_number">
                <a href="#!" class="luggage_count_minus">
                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="1" height="1" fill="#000"/>
                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <input type="number" class="luggage_count hand_luggage_count" disabled name="hand_luggage_count" value="'.$hand_luggage_count.'" min="0" max="8">
                <a href="#!" class="luggage_count_plus">
                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                        455,242.5 "></polygon>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="extra_carry_list_section">
        <div class="extra_carry_list_item luggage_list_item">
            <div class="luggage_list_icon">
                <svg width="100%" height="30px" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 14 14" id="svg2" fill="#6728A1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <metadata id="metadata8"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type> <dc:title></dc:title> </cc:work> </rdf:rdf> </metadata> <defs id="defs6"></defs> <rect width="14" height="14" x="0" y="0" id="canvas" style="fill:none;stroke:none;visibility:hidden"></rect> <path d="M 6,1 C 5,1 4,2.0209735 4,3 l 0,1 -0.75,0 0,9 7.5,0 0,-9 L 10,4 10,3 C 10,2 8.9895132,1 8,1 z m 0.5,1.25 1,0 c 0.8599138,0 1.25,0.5994182 1.25,1.25 l 0,0.5 -3.5,0 0,-0.5 C 5.25,2.8707948 5.5557891,2.25 6.5,2.25 z M 2,4 C 0.64345039,4 0,4.6434504 0,6 l 0,5 c 0,1.35655 0.74831793,2 2,2 z m 10,0 0,9 c 1.251682,0 2,-0.748318 2,-2 L 14,6 C 14,4.6853974 13.377523,4 12,4 z" id="luggage" style="fill:#6728A1;fill-opacity:1;stroke:none"></path> </g></svg>
            </div>
            <div class="luggage_list_title">
                <h5>Grote koffers</h5>
            </div>
            <div class="luggage_list_number">
                <a href="#!" class="luggage_count_minus">
                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="1" height="1" fill="#000"/>
                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <input type="number" class="luggage_count" disabled name="luggage_count" value="0" min="0" max="8">
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
                <svg fill="#6728A1" height="30px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M495.304,101.658H351.196V60.224c0-9.22-7.475-16.696-16.696-16.696H177.499c-9.22,0-16.696,7.475-16.696,16.696v41.433 H16.696C7.48,101.657,0,109.137,0,118.353v138.574h197.754v-21.871c0-9.216,7.48-16.696,16.696-16.696h83.1 c9.216,0,16.696,7.48,16.696,16.696v21.871H512V118.353C512,109.137,504.52,101.658,495.304,101.658z M317.806,101.657H194.195 V76.92h123.611V101.657z"></path> <path d="M314.246,297.43c0,32.111-26.134,58.234-58.246,58.234c-32.111,0-58.246-26.123-58.246-58.234v-7.112H17.018v161.458 c0,9.216,7.48,16.696,16.696,16.696h444.572c9.216,0,16.696-7.48,16.696-16.696V290.318H314.246V297.43z"></path> </g> </g> </g> </g></svg>
            </div>
            <div class="luggage_list_title">
                <h5>Handbagages</h5>
            </div>
            <div class="luggage_list_number">
                <a href="#!" class="luggage_count_minus">
                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="1" height="1" fill="#000"/>
                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <input type="number" class="luggage_count" disabled name="luggage_count" value="0" min="0" max="8">
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
                <svg fill="#6728a1" height="30px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 507.589 507.589" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M313.505,266.495c-18.8,0-34.1,15.3-34.1,34.1c0,18.8,15.3,34.1,34.1,34.1s34.1-15.3,34.1-34.1 C347.705,281.794,332.405,266.495,313.505,266.495z M322.105,309.195h-17.1c-4.7,0-8.5-3.8-8.5-8.5s3.8-8.5,8.5-8.5h17.1 c4.7,0,8.5,3.8,8.5,8.5S326.805,309.195,322.105,309.195z"></path> </g> </g> <g> <g> <path d="M507.505,404.395l-12.8-178.8c-1.4-20.1-18.3-35.8-38.5-35.8h-68.6c-11.3-50.6-50.5-128-133.8-128s-122.4,77.4-133.8,128 h-68.6c-20.2,0-37.1,15.7-38.5,35.8l-12.8,178.8c-0.8,10.6,3,21.2,10.3,29.1c7.3,7.8,17.6,12.3,28.2,12.3h78.6v-239h17.1v238.9 h17.1v-238.9h17.1v238.9h300.5c10.7,0,21-4.5,28.2-12.3C504.505,425.595,508.205,414.995,507.505,404.395z M313.505,351.794 c-28.2,0-51.2-23-51.2-51.2c0-25.3,18.5-46.3,42.7-50.4v-60.5h-131.8c8.8-29.2,30.9-76.8,80.6-76.8s71.8,47.6,80.6,76.8h-12.3 v60.5c24.2,4.1,42.7,25.1,42.7,50.4C364.705,328.895,341.805,351.794,313.505,351.794z M352.205,189.695 c-9-32.7-34.5-93.9-98.4-93.9s-89.4,61.2-98.4,93.9h-4h-13.9c11.2-45.4,45.7-110.9,116.3-110.9s105.1,65.6,116.3,110.9H352.205z"></path> </g> </g> </g></svg>
            </div>
            <div class="luggage_list_title">
                <h5>Handbagage</h5>
            </div>
            <div class="luggage_list_number">
                <a href="#!" class="luggage_count_minus">
                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="1" height="1" fill="#000"/>
                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <input type="number" class="luggage_count" disabled name="luggage_count" value="0" min="0" max="8">
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
                <svg fill="#6728a1" height="30px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 507.589 507.589" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M313.505,266.495c-18.8,0-34.1,15.3-34.1,34.1c0,18.8,15.3,34.1,34.1,34.1s34.1-15.3,34.1-34.1 C347.705,281.794,332.405,266.495,313.505,266.495z M322.105,309.195h-17.1c-4.7,0-8.5-3.8-8.5-8.5s3.8-8.5,8.5-8.5h17.1 c4.7,0,8.5,3.8,8.5,8.5S326.805,309.195,322.105,309.195z"></path> </g> </g> <g> <g> <path d="M507.505,404.395l-12.8-178.8c-1.4-20.1-18.3-35.8-38.5-35.8h-68.6c-11.3-50.6-50.5-128-133.8-128s-122.4,77.4-133.8,128 h-68.6c-20.2,0-37.1,15.7-38.5,35.8l-12.8,178.8c-0.8,10.6,3,21.2,10.3,29.1c7.3,7.8,17.6,12.3,28.2,12.3h78.6v-239h17.1v238.9 h17.1v-238.9h17.1v238.9h300.5c10.7,0,21-4.5,28.2-12.3C504.505,425.595,508.205,414.995,507.505,404.395z M313.505,351.794 c-28.2,0-51.2-23-51.2-51.2c0-25.3,18.5-46.3,42.7-50.4v-60.5h-131.8c8.8-29.2,30.9-76.8,80.6-76.8s71.8,47.6,80.6,76.8h-12.3 v60.5c24.2,4.1,42.7,25.1,42.7,50.4C364.705,328.895,341.805,351.794,313.505,351.794z M352.205,189.695 c-9-32.7-34.5-93.9-98.4-93.9s-89.4,61.2-98.4,93.9h-4h-13.9c11.2-45.4,45.7-110.9,116.3-110.9s105.1,65.6,116.3,110.9H352.205z"></path> </g> </g> </g></svg>
            </div>
            <div class="luggage_list_title">
                <h5>Handbagage</h5>
            </div>
            <div class="luggage_list_number">
                <a href="#!" class="luggage_count_minus">
                    <svg width="100%" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="1" height="1" fill="#000"/>
                    <path d="M6 12H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <input type="number" class="luggage_count" disabled name="luggage_count" value="0" min="0" max="8">
                <a href="#!" class="luggage_count_plus">
                    <svg fill="#000000" height="15px" width="100%" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 455 455" xml:space="preserve">
                    <polygon points="455,212.5 242.5,212.5 242.5,0 212.5,0 212.5,212.5 0,212.5 0,242.5 212.5,242.5 212.5,455 242.5,455 242.5,242.5 
                        455,242.5 "></polygon>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="fare_body_footer_section">
        <div>
            <a href="#offers" class="luggage_close back_arrow">
                <svg width="20px" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5303 5.46967C10.8232 5.76256 10.8232 6.23744 10.5303 6.53033L5.81066 11.25H20C20.4142 11.25 20.75 11.5858 20.75 12C20.75 12.4142 20.4142 12.75 20 12.75H5.81066L10.5303 17.4697C10.8232 17.7626 10.8232 18.2374 10.5303 18.5303C10.2374 18.8232 9.76256 18.8232 9.46967 18.5303L3.46967 12.5303C3.17678 12.2374 3.17678 11.7626 3.46967 11.4697L9.46967 5.46967C9.76256 5.17678 10.2374 5.17678 10.5303 5.46967Z" fill="#6728a1"></path> </g></svg>
                terug
            </a>
        </div>

        <div>
            <button class="luggage_button_submit fare_button_submit fare_button_next">Verder</button>
        </div>
    </div>
</div>
';

// ajax requester 
require_once(dirname(dirname(dirname(dirname(plugin_dir_path( __FILE__ ))))) . '/frontend/ajax/request/luggage-template-ajax-request.php');