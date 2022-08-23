<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('CEDULA') }}
            {{ Form::text('DOCUMENTO', $persona->DOCUMENTO, ['class' => 'form-control' . ($errors->has('DOCUMENTO') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese su número de cédula']) }}
            {!! $errors->first('DOCUMENTO', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('NOMBRE_PERSONA') }}
            {{ Form::text('NOMBRE_PERSONA', $persona->NOMBRE_PERSONA, ['class' => 'form-control' . ($errors->has('NOMBRE_PERSONA') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese sus nombres']) }}
            {!! $errors->first('NOMBRE_PERSONA', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('APELLIDO_PERSONA') }}
            {{ Form::text('APELLIDO_PERSONA', $persona->APELLIDO_PERSONA, ['class' => 'form-control' . ($errors->has('APELLIDO_PERSONA') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese sus apellidos']) }}
            {!! $errors->first('APELLIDO_PERSONA', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('SEXO') }}
            <select id="SEXO" name="SEXO" class="form-control" > 
                    <option value="MASCULINO" selected>MASCULINO</option>    
                    <option value="FEMENINO" selected>FEMENINO</option>  
                </select>
        </div>

        <div class="form-group">
            {{ Form::label('FECHA DE NACIMIENTO') }}
            {{ Form::date('FECHA_NACIMINETO', $persona->FECHA_NACIMINETO, ['class' => 'form-control' . ($errors->has('FECHA_NACIMINETO') ? ' is-invalid' : ''), 'placeholder' => 'FECHA_NACIMINETO']) }}
            {!! $errors->first('FECHA_NACIMINETO', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('CIUDAD DE RESIDENCIA') }}
            <div class="col-auto">
                <select id="ID_CIUDAD" name="ID_CIUDAD" class="form-control" > 
                    @foreach($ciudades as $ciudad)
                                <option value="{{$ciudad->ID_CIUDAD}}" selected>{{$ciudad->NOMBRE_CIUDAD}}</option>
                    @endforeach   
                </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $persona->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        
    <!-- <div class="box-footer mt20">
        <a href="{{ route('personas.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>            
    </div> -->

</div>

        <!-- DATOS HIJO -->
        
        <div class="form-group">
            {{ Form::label('ID_ETAPA') }}
            <div class="col-auto">
                <select id="ID_ETAPA" name="ID_ETAPA" class="form-control" > 
                    @foreach($etapas as $etapa)
                                <option value="{{$etapa->ID_ETAPA}}" selected>{{$etapa->NOMBRE_ETAPA}}</option>
                    @endforeach   
                </select>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('ID_TIPO_SERVICIO') }}
            <div class="col-auto">
                <select id="ID_TIPO_SERVICIO" name="ID_TIPO_SERVICIO" class="form-control" > 
                        @foreach($tiposservicios as $tiposervicio)
                                    <option value="{{$tiposervicio->ID_TIPO_SERVICIO}}" selected>{{$tiposervicio->TIPO_SERVICIO}}</option>
                        @endforeach   
                </select>
            </div>    
        </div>

        <div class="form-group">
            {{ Form::label('STATUS') }}
            {{ Form::text('STATUS', $preinscripcion->STATUS, ['class' => 'form-control' . ($errors->has('STATUS') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('STATUS', '<div class="invalid-feedback">:message</div>') !!}
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

       <!--  <div class="box-footer mt20">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
                </div>
            </div>
        </div> -->

        <div class="box-footer mt20">
            <a href="{{ route('personas.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>            
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
        
    


        