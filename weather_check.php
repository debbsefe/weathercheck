<?php
/*
Plugin Name: WeatherCheck
Description: Custom search bar
Author: Mamus Eferha
Version: 1.0
*/

function ms_add_scripts(){
    //CSS
    wp_enqueue_style('ms-main-style', plugins_url(). '/weathercheck/css/style.css');
    //JS
    wp_enqueue_script('ms-main-script', plugins_url().'/weathercheck/js/main.js');  
}
add_action('wp_enqueue_scripts', 'ms_add_scripts');


function weather_form(){
  ?>  
  <form method= "post" action="" enctype="multipart/form-data"> 
      <input type="text" name="city_id" id="city_id" placeholder="Type a city name">
      <button type="submit">Search</button>
      <span class="msg"></span>
    </form>
    <div class="ajax-section">
      <ul class="cities">
        <li class="city">
          <h2 class="city-name" data-name="...">
            <span>...</span>
            <sup>...</sup>
          </h2>
          <span class="city-temp">...<sup>°C</sup></span>
          <figure>
            <img class="city-icon" src="..." alt="...">
            <figcaption>...</figcaption>
          </figure>
        </li>
      </ul>
    </div>
  <?php
}


function wpb_weather_search(){
  ob_start();
  weather_form();
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}
add_shortcode('weathersearch', 'wpb_weather_search');
