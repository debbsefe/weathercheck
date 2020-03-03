jQuery("#ms_form").submit(function(event) {

  /* stop form from submitting normally */
  event.preventDefault();

  /* get the action attribute from the form element */
  var url = jQuery( this ).attr( 'action' );

  /* Send the data using post */
  jQuery.ajax({
      type: 'POST',
      url: url,
      data: {
          action: jQuery('#cp_action').val(), // use here the ms_waether_check instead of this
          cityName: jQuery('#cityName').val(), 
      },
      dataType: 'json',
      success: function (data) {
        alert(data);
      },
      error: function (errorThrown) {
          alert(errorThrown);
      }
  });

});


