jQuery("#ms_form").submit(function(event) {
   event.preventDefault();

wp.ajax.post( 'ms_weather_display', {
  cityName : jQuery('#cityName').val(),
} )
  .done( function( response ) {
      alert( response );
  } )
  .fail( function() {
      alert( "error" );
  } );

});