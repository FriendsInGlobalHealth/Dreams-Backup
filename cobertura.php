<?php require_once("src/.conf.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>DREAMS Layering - Entry Points</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
 z-index: 1;
		  width: 80%;
		  float:left;
      }
		#list {
        height: 100%;
		width: 19%;
 z-index: 100;
			/*background:#261657;*/
			float:right;
			color:#261657;
			border: 1px dashed #669966;
        background-color: #ccffcc;
        padding: 0px 1px 0px 5px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
		  font-family:Arial;
		  font-size: small;
      }
    </style>
  </head>
  <body>
	   <div id="map"></div>
	<div id="list">
		<h2>DREAMS Layering - Entry Points</h2>
		<?php 
 $K=1; $i='A';
$selProv="SELECT * FROM hs_hr_province WHERE status=1";
$provs=mysqli_query($conn,$selProv);

 while($prov = mysqli_fetch_array($provs)) {
 $id=$prov['id'];
	echo '<font style="text-transform: uppercase;color: blue;"><b>'.$i.' - '.utf8_encode($prov['province_name']).'</b></font><br>'; 
	$selDist="SELECT * FROM hs_hr_district WHERE province_code=$id";
$dists=mysqli_query($conn,$selDist); 
	 while($dist = mysqli_fetch_array($dists)) {
	 
	$distr=$dist['district_code'];
		 
		 $select="SELECT * FROM app_dream_us  WHERE lat <>'' AND distrito_id='$distr'";
 $query = mysqli_query($conn, $select);

 while($row = mysqli_fetch_array($query)) {
	
            echo $i.''.++$k.' - <b>'.utf8_encode($row['name'].'</b> <i>'.$row['description'].'</i>').'<br>';
	
 		
   }
		
		 
	 } 
	 $i++; 
	 
 }
	
	
	
	
	
  ?>
       
		  
	  </div>
	  
	  
    <script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: -25.968976, lng: 32.595787},
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length],
			  draggable: false,
			  title:"DREAMS Layering - Entry Point"
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
		  
	<?php	   $select="SELECT * FROM app_dream_us WHERE lat <>''";
 $query = mysqli_query($conn, $select);

 while($row = mysqli_fetch_array($query)) { ?>


 	{
             lat: <?=  $row['lat']; ?> , lng:<?=  $row['lng']; ?> ,
             type: 'library',
 		    title: '<?= $row["description"] ?>',
 		    draggable: true,
          
 },

 <?php } ?>
       
      ]
		
		
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDITTrsQRq9-pwTbCT1U_4n_rWZvQbhAHg&callback=initMap">
    </script>
  </body>
</html>