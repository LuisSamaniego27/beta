        <!-- DATOS HIJO -->
        <div class="form-group">
            {{ Form::label('ID_ETAPA') }}
            {{ Form::number('ID_ETAPA', $preinscripcion->ID_ETAPA, ['class' => 'form-control' . ($errors->has('ID_ETAPA') ? ' is-invalid' : ''), 'placeholder' => 'Etapa a cursar']) }}
            {!! $errors->first('ID_ETAPA', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ID_TIPO_SERVICIO') }}
            {{ Form::text('ID_TIPO_SERVICIO', $preinscripcion->ID_TIPO_SERVICIO, ['class' => 'form-control' . ($errors->has('ID_TIPO_SERVICIO') ? ' is-invalid' : ''), 'placeholder' => 'Seleccionar sacramento a realizar']) }}
            {!! $errors->first('ID_TIPO_SERVICIO', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         
        
        <!-- DATOS MAPA -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="latitud">LATITUD</label>
                    <input id="LATITUD" name="LATITUD" type="text"  class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="longitud">LONGITUD</label>
                    <input id="LONGITUD" name="LONGITUD" type="text" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
        </div>

        <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
                </div>
            </div>
        </div>


        <!-- CODIGO EN JS -->
        <script>

            var marker;          //variable del marcador
            var coords = {};    //coordenadas obtenidas con la geolocalización

            //Funcion principal
            initMap = function () 
            {
                //usamos la API para geolocalizar el usuario
                    navigator.geolocation.getCurrentPosition(
                    function (position){
                        coords =  {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude
                        };
                        setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
                        
                    },function(error){console.log(error);});    
            }


            function setMapa (coords)
            {   
                //Se crea una nueva instancia del objeto mapa
                var map = new google.maps.Map(document.getElementById('map'),
                {
                    zoom: 13,
                    center:new google.maps.LatLng(coords.lat,coords.lng),
                });

                //Creamos el marcador en el mapa con sus propiedades
                //para nuestro obetivo tenemos que poner el atributo draggable en true
                //position pondremos las mismas coordenas que obtuvimos en la geolocalización
                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(coords.lat,coords.lng),
                });

                //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
                //cuando el usuario a soltado el marcador
                marker.addListener('click', toggleBounce);
        
                marker.addListener( 'dragend', function (event)
                {
                    //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                    document.getElementById("LATITUD").value = this.getPosition().lat();
                    document.getElementById("LONGITUD").value = this.getPosition().lng();
                });
            }

            //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }

        </script>
        <!-- Carga de la libreria de google maps  -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>