<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geolocalización</title>

    <style media="screem">
        .google.canvas{
            height: 100vh;
            width: 100vh;
        }
    </style>
</head>
<body>
    <div id="google_canvas" class="google_canvas"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>
    <script type="text/javascript">

        (function(){
            if(!!navigator.geolocation){
                
                var map;
                var mapOptions = {
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                map = new google.maps.Map(document.getElementById("google_canvas"), mapOptions);

                navigator.geolocation.getCurrentPosition(function(position){
                    var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    var infoWindow = new google.maps.infoWindow({
                        map: map,
                        position: geolocate,
                        content:
                            '<h1>Esta es tu ubicacion con Tanak</h1>'+
                            '<h2>Latitud:'+position.coords.latitude+'</h2>'+
                            '<h2>Longitud:'+position.coords.longitude+'</h2>'

                    });

                    map.setCenter(geolocate);
                });
            }else{
                document.getElementById("google_canvas").innerHTML = "No se soporta geolocalizacion";
            }
        })();


    </script>
    
</body>
</html>