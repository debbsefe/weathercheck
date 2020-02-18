(function($){
  $(document).ready(function(){
    $('#submitBtn').click(function(){
      var city = $('#city').val();

      if(city != ''){
          $.ajax({
            url:'http://api.openweathermap.org/data/2.5/weather?q=' + city + '&unit=metric' + 'APPID=66f60778c8c27a88da3fd31a2d55d2af',
            type:'GET',
            data: { action: 'getWeatherJson', 
				    value:	city,      
			            },
            dataType:'json',
            success:function(data){
              console.log(data);
            }

          });
      }else{
        $('#error').html('Field cannot be empty');
      }

    });
  });

});