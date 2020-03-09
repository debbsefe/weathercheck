jQuery("#ms_form").submit(function(event) {
   event.preventDefault();

wp.ajax.post( 'ms_weather_display', {
  city : jQuery('#cityName').val(),
  dataType : 'jsonp',
  crossDomain : true,
} )
  .done( function( msg ) {
    console.log(msg);
    //jQuery("#outputWeather").html(msg);
  } )
  .fail( function() {
    jQuery("#error-message").html('Please type a valid city');
  } );

});