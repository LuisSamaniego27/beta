<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="latitud">Latitud</label>
                <input type="text" id="latitud" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="longitud">Longitud</label>
                <input type="text" id="longitud" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="mapa" style="width: 100%; height: 500px;"></div>
        </div>
    </div>

    <script>
        function iniciarMapa() {
            var latitud = 19.388372;
            var longitud = -99.174023;

            coordenadas = {
                lng : longitud,
                lat: latitud
            }

            generarMapa(coordenadas);
        }

        function generarMapa(coordenadas) {
            var mapa = new google.maps.Map(document.getElementId('mapa'),
            {
                zoom: 12,
                center: new google.maps.LatLng(coordenadas.lat, coodenadas.lng)
            });

           
        }
    </script>

    
    <script src="https://maps.googleapis.com/maps/api/js?callback=iniciarMapa"></script>