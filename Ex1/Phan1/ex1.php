<!DOCTYPE html>
<html>
<head>
	<title>Geocode</title>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1aue0FYTMX5yw0s1XGZeRM-6jNF6AZBc&callback=initMap">
	</script>
	<script type="text/javascript">	
		var geocoder;
	  var map;
	  var infoWindow;
		function initMap() {
			infoWindow = new google.maps.InfoWindow;
			geocoder = new google.maps.Geocoder();
      map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(10.8973281,108.0338698),
        zoom: 9,
        mapTypeId: google.maps.MapTypeId. TERRAIN
      });
	  }
	  function codeAddress() {
	    var address = document.getElementById('address').value;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var marker = new google.maps.Marker({
	            map: map,
	            position: results[0].geometry.location
	        });
	        infoWindow.setContent(results[0].formatted_address);
        	infoWindow.open(map, marker);
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
  	}
		</script>
		<style type="text/css">
			html,body{
				height: 100%;
        margin: 0;
        padding: 0;
			}
			#search{
				position: absolute;
				top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
			}
			input{
				height: 20px;
			}
			#address{
				width: 350px;
			}
		</style>
</head>
<body onload="initMap()">
	<div id="search">
	  <input id="address" type="textbox" placeholder="Nhập địa chỉ LatLng">
	  <input type="button" value="Encode" onclick="codeAddress()">
	</div>
	<div id="map" style="width: 100%; height: 100%;">
	</div>

</body>
</html>