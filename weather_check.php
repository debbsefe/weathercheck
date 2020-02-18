<?php
/*
Plugin Name: WeatherCheck
Description: Custom search bar
Author: Mamus Eferha
Version: 1.0
*/




function weather_form(){
  ?>  
    <div class "weather-form"> 
      <input type="text" id="city" placeholder="Type a city name">
      <button type="submit" id="submitBtn">Search</button>
      <span id="error"></span>
    </div>
    <table id="weatherDisplay">
    <tr>
     <td>Name</td>  
    </tr>
    </table>
    <div id="weather_output"></div>
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

function ms_add_scripts(){
  //CSS
  wp_enqueue_style('ms-main-style', plugins_url(). '/weathercheck/css/style.css');
  //JS
  wp_enqueue_script('ms-main-script', plugins_url().'/weathercheck/js/main.js', array('jquery'));  
}
add_action('wp_enqueue_scripts', 'ms_add_scripts');
add_action ( 'wp_ajax_' . 'getWeatherJson', 'data');
add_action ( 'wp_ajax_nopriv_' . 'getWeatherJson', 'data');
