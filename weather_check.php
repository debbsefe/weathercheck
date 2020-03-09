<?php
/*
Plugin Name:  WeatherCheck
Description: Custom search bar
Author: Mamus Eferha
Version: 1.0
*/

if(! defined('ABSPATH')){
  die('Will you get out of here!');
}

function ms_add_scripts(){
  wp_enqueue_style('ms-main-script', plugins_url(). '/weathercheck/css/style.css');
  wp_enqueue_script('ms-main-script', plugins_url().'/weathercheck/js/main.js', array( 'jquery', 'wp-util' ), '0.1.0', true );
}
add_action('wp_enqueue_scripts', 'ms_add_scripts');

function weather_form(){
  ?>  
    <form id="ms_form" action="" method="post"> 
      <input type="hidden" name="ms_action" id="ms_action" value="ms_weather_display">
      <input type="text" id="cityName" name="cityName" placeholder="Type a city name">
      <input type="submit" id="submitBtn">
    </form>

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

function ms_weather_display(){
	$city = ($_POST['cityName']);
	$apiKey = '66f60778c8c27a88da3fd31a2d55d2af';
	$url = 'https://api.openweathermap.org/data/2.5/weather?q=' .$city. '&appid=' .$apiKey;
	$response = wp_remote_get( $url  );
	if( is_array($response) ) {
	  $header = $response['headers']; // array of http header lines
	  $body = $response['body']; // use the content
	  $resp = json_decode($body);
	  $weather = $resp->weather[0]->icon;
	  $icon = '<img src="http://openweathermap.org/img/w/' . $weather . '.png">';
 }
  $msg = '<h1>The temp is: '.$resp->main->temp .'K </h1>';
  wp_send_json( $msg );  
  
wp_die();
}

  add_action( 'wp_ajax_ms_weather_display', 'ms_weather_display' ); 
  add_action( 'wp_ajax_nopriv_ms_weather_display', 'ms_weather_display' );
  
