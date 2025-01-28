<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>
  <body>
  <div id="navbar"><span>Red Stapler - Geolocation API</span></div>
  <div id="wrapper">
    <button id="location-button">Get User Location</button>
    <div id="output"></div>
  </div>
  
  <script>
      var key = 'AIzaSyACxeStmoQtW6vRObdig8E4dubzn-ZdvVQ';
          $('#location-button').click(function(){
        
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position){
                  console.log(position);
                  $.get( "http://maps.googleapis.com/maps/api/geocode/json?latlng="+ position.coords.latitude + "," + position.coords.longitude +"&key="+key, function(data) {
                    console.log(data);
                  })
                  var img = new Image();
                  img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + position.coords.latitude + "," + position.coords.longitude + "&zoom=13&size=800x400&key="+key;
                  $('#output').html(img);
                });
                
            }
          });
  </script>
  </body>
</html>