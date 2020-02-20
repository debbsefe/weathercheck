<?php
/*
Plugin Name:  WeatherCheck
Description: Custom search bar
Author: Mamus Eferha
Version: 1.0
*/
add_action( 'wp_ajax_ch_user_data', 'weather_display' );
add_action( 'wp_ajax_nopriv__ch_user_data', 'weather_display' );

function weather_form(){
  ?>  
    <form id="ms_form"action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post"> 
      <input type="hidden" name="cp_action" id="cp_action" value="ch_user_data">
      <input type="text" id="cityId" placeholder="Type a city name">
      <input type="submit" id="submitBtn">
    </form>
  <?php
}

function weather_display(){
  return "<p>test</p>";
  wp_die();
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
  //wp_localize_script( 'ms-main-script', 'ajax_object',
  //array( 'ajax_url' => admin_url( 'admin-ajax.php' )));  
}

add_action('wp_enqueue_scripts', 'ms_add_scripts');
