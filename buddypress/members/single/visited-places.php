<style>
    #map_canvas {
        width: 100%;
        height: 400px;
    }
</style>

<script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
    function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
            center: new google.maps.LatLng(44.5403, -78.5463),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php

echo "My visited places";

?>

<div id="map_canvas"></div>

<br>

<form action="javascript:void(0);" name="form1" id="form1">
    <input type="text" name="location" class="textbox" id="location" value="" />
    <input type="submit" value="Submit" class="submit" />
</form>
<div id="map-canvas"></div>