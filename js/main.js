jQuery("#ms_form").submit(function(event) {
   event.preventDefault();
  var cityName = jQuery('#cityName').val();
wp.ajax.post( 'ms_weather_display', {
  city : cityName,

  } )
  .done( function( msg ) {
    //console.log(msg);
    jQuery("#outputWeather").html(msg);
  } )
  .fail( function() {
    jQuery("#error-message").html('Please type a valid city');
  } );
  

});