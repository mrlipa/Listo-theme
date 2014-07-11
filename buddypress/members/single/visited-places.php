<style xmlns="http://www.w3.org/1999/html">
    #map-canvas{
        height:450px;
        width:100%;
    }
    #pac-input{width:90%;}
</style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<!--<script>
    function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
            center: new google.maps.LatLng(17.000, 0.000),
            zoom: 2,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>-->


<script>
    var map;
    var autocomplete;

    function addMarker(place){
         var circle ={
             path: google.maps.SymbolPath.CIRCLE,
             fillColor: 'purple',
             fillOpacity: 1,
             scale: 4,
             strokeColor: 'transparent',
             strokeWeight: 0
         };
        var icon = 'http://localhost/listo/wp-content/uploads/2014/07/listo-pin-icon.png';
        var marker = new google.maps.Marker({
            map: map,
            title:place.name,
            animation: google.maps.Animation.DROP,
            position:place.geometry.location,
            icon: icon
        });

    }

    function initialize() {
        var pacInput = document.getElementById('pac-input');

        var mapOptions = {
            center: new google.maps.LatLng(17.000, 0.000),
            zoom: 2,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        autocomplete = new google.maps.places.Autocomplete(pacInput);

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry)
                return;
            addLocation.removeAttribute('disabled')
        });

        autocomplete.setTypes(['geocode']);

        pacInput.onkeydown = function(){
            addLocation.setAttribute('disabled','disabled')
        }

        addLocation.onclick = function(){
            var place = autocomplete.getPlace();
            if (!place.geometry)
                return;
            addMarker(place);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>

<div id="map-canvas"></div>
<br>
<div class="form-inline">
    <input id="pac-input" type="text" class="controls" placeholder="Enter a location">
    <button class="btn btn-default" id="addLocation" disabled>Ajouter</button>
</div>


<?php //echo "My visited places"; ?>









