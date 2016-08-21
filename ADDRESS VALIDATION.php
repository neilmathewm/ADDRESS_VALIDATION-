

<!DOCTYPE html>
<html>
  <head>
    <title>Place Autocomplete Address Form</title>
    <?php
include 'connect_map_db.php';


?>


<?php



   
   
   echo'<br> 
<table id="table3">
           
               <th >VALIDATION&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
               <th>BP NAME&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
               <th>COUNTRY CODE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
               <th>ADRESS LINE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
               <th>CITY NAME&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
               <th>POSTAL CODE&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
             </tr><br>'
            ;
   

   
   $sql=mysql_query("SELECT * FROM `table 3` ");
   
?>
<?php

while($ar=mysql_fetch_array($sql))
{  
    ?>
    <form method="POST">
        
        <TR>
        <td>  <input type="text"  name="t1"  value="<?php echo "$ar[0]"; ?>" /></td>  
        <td>  <input type="text" name="t2"  value="<?php echo "$ar[1]"; ?>" /></td>  
        <td>  <input type="text" name="t3" value="<?php echo "$ar[2]"; ?>" /></td>  
        <td>  <input type="text" name="t4" value="<?php echo "$ar[3]"; ?>" /></td>   
        <td>  <input type="text" name="t5" value="<?php echo "$ar[4]"; ?>" /></td>
        <td>  <input type="text" name="t6" value="<?php echo "$ar[5]"; ?>" /></td>  </TR>
        </form>
  <?php
 
}

?>        
     

<style>

html, body, #map-canvas {
    height: 400px;
    margin: 0px;
    padding: 0px
}
.controls {
    margin-top: 16px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
#pac-input {
    background-color: #fff;
    padding: 0 11px 0 13px;
    width: 400px;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    text-overflow: ellipsis;
}
#pac-input:focus {
    border-color: #4d90fe;
    margin-left: -1px;
    padding-left: 14px;
    /* Regular padding-left + 1. */
    width: 401px;
}
.pac-container {
    font-family: Roboto;
}
#type-selector {
    color: #fff;
    background-color: #4d90fe;
    padding: 5px 11px 0px 11px;
}
#type-selector label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
}
#trigger-search {
 
    border: 1px solid black;
    margin: 10px;
    background: yellow;
}

</style>
  </head>

  <body>

<input id="pac-input" class="controls" type="text" placeholder="Search Box" value="">
<div id="map-canvas"></div>
<button id="trigger-search" >Trigger search</button>
<script type="text/javascript">
        var p=0;
function initialize() {

    var markers = [];
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var defaultBounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(-33.8902, 151.1759),
    new google.maps.LatLng(-33.8474, 151.2631));
    map.fitBounds(defaultBounds);

    // Create the search box and link it to the UI element.
    var input = /** @type {HTMLInputElement} */
    (
    document.getElementById('pac-input'));
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */
    (input));

    // [START region_getplaces]
    // Listen for the event fired when the user selects an item from the
    // pick list. Retrieve the matching places for that item.
    google.maps.event.addListener(searchBox, 'places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            
            document.getElementsByName('t1')[p].value="invalid";
            p++;
            return;
        
        }
        else
        {//document.getElementById('t6').value="valid";
            document.getElementsByName('t1')[p].value="valid";
            p++;
    
            //    alert("valid");
        
        }
        for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
        }

        // For each place, get the icon, place name, and location.
        markers = [];
        var bounds = new google.maps.LatLngBounds();
        for (var i = 0, place; place = places[i]; i++) {
            var image = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            var marker = new google.maps.Marker({
                map: map,
                icon: image,
                title: place.name,
                position: place.geometry.location
            });

            markers.push(marker);

            bounds.extend(place.geometry.location);
        }

        map.fitBounds(bounds);
    });
    // [END region_getplaces]

    // Bias the SearchBox results towards places that are within the bounds of the document.getElementById('trigger-search').onclick = function () {
document.getElementById('trigger-search').onclick = function () {
   
        setTimeout(function() {
    console.log("d");
     for(var p=0;p<100;p++){
        document.getElementById('pac-input').value=document.getElementsByName('t2')[p].value;
        var input = document.getElementById('pac-input');
        
        google.maps.event.trigger(input, 'focus')
        google.maps.event.trigger(input, 'keydown', {
            keyCode: 13
        });
    
        }
}, 3000);
        
    };

};
google.maps.event.addDomListener(window, 'load', initialize);
    document.getElementById('trigger-search').onclick = function () {

        var input = document.getElementById('pac-input');

        google.maps.event.trigger(input, 'focus')
        google.maps.event.trigger(input, 'keydown', {
            keyCode: 13
        });
    };


google.maps.event.addDomListener(window, 'load', initialize);
</script>
 <script src="https://maps.googleapis.com/maps/api/js?key=YOUR API KEY&libraries=places&callback=initialize"
        async defer></script>
   
  </body>
</html>
