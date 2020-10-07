<!DOCTYPE html>
<html>
<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyAKZF_DTu0bFYnMJxu76WRIVpzGXCDWAhE" type="text/javascript"></script>
<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
<body>
<p id="demo">Loading...</p>
  <script type="text/javascript">
  var x = document.getElementById("demo");
  	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition, showError);
		} else {
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}
	
	function showPosition(position) {
    	latitude = position.coords.latitude;
   		longitude = position.coords.longitude;
		loadMap();
	}
  
    function loadMap() {
		var latitude = position.coords.latitude;
   		var longitude = position.coords.longitude;
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(latitude, longitude), 12);
      }
    }
	function showError(error) {
		switch(error.code) {
			case error.PERMISSION_DENIED:
				x.innerHTML = "User denied the request for Geolocation."
				break;
			case error.POSITION_UNAVAILABLE:
				x.innerHTML = "Location information is unavailable."
				break;
			case error.TIMEOUT:
				x.innerHTML = "The request to get user location timed out."
				break;
			case error.UNKNOWN_ERROR:
				x.innerHTML = "An unknown error occurred."
				break;
		}
	}
	
  </script>
 </head>
 <body>
   <div id="map" style="width: 500px; height: 300px"></div>
   <script>getLocation();</script>
</body>
</html>



