        <!-- DATOS HIJO -->
        <div class="form-group">
            {{ Form::label('DOCUMENTO') }}
            {{ Form::number('DOCUMENTO', $preinscripcion->DOCUMENTO, ['class' => 'form-control' . ($errors->has('DOCUMENTO') ? ' is-invalid' : ''), 'placeholder' => 'Cedula del hijo']) }}
            {!! $errors->first('DOCUMENTO', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NOMBRE_HIJO') }}
            {{ Form::text('NOMBRE_HIJO', $preinscripcion->NOMBRE_HIJO, ['class' => 'form-control' . ($errors->has('NOMBRE_HIJO') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE_PAIS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('APELLIDO_HIJO') }}
            {{ Form::text('APELLIDO_HIJO', $preinscripcion->APELLIDO_HIJO, ['class' => 'form-control' . ($errors->has('APELLIDO_HIJO') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('APELLIDO_HIJO', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FECHA DE NACIMIENTO') }}
            {{ Form::date('FECHA_NAC', $preinscripcion->FECHA_NAC, ['class' => 'form-control' . ($errors->has('FECHA_NAC') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('FECHA_NAC', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!-- DATOS PADRE -->
        <!-- <div class="form-group">
            {{ Form::label('NOMBRE_PADRE') }}
            {{ Form::text('NOMBRE_PADRE', $preinscripcion->NOMBRE_PADRE, ['class' => 'form-control' . ($errors->has('NOMBRE_PADRE') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('NOMBRE_PAIS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('APELLIDO_PADRE') }}
            {{ Form::text('APELLIDO_PADRE', $preinscripcion->APELLIDO_PADRE, ['class' => 'form-control' . ($errors->has('APELLIDO_PADRE') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('APELLIDO_PADRE', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        
        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $preinscripcion->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         -->

         <a href="">Ingresar los datos del padre</a>
         

         
        
        <!-- DATOS MAPA -->
        <!-- <div class="row">
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
 -->
        <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
                </div>
            </div>
        </div>


        <!-- CODIGO EN JS -->
        <script>

            var marker;          //variable del marcador
            var coords = {};    //coordenadas obtenidas con la geolocalizaci??n

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
                //position pondremos las mismas coordenas que obtuvimos en la geolocalizaci??n
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