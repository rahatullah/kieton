<html>
 <head>
  <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyAKZF_DTu0bFYnMJxu76WRIVpzGXCDWAhE" type="text/javascript"></script>
  <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
  <?php
  if($sock = @fsockopen('www.google.com', 80))
	{
	
		$ipAddress = $_SERVER['REMOTE_ADDR'];
		if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
			$ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
		}
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipAddress"));
		$city = trim($geo["geoplugin_city"]);
		$region = trim($geo["geoplugin_regionName"]);
		$country = trim($geo["geoplugin_countryName"]);
		$lat = $geo["geoplugin_latitude"];
		$lon = $geo["geoplugin_longitude"];
		echo '<small>You are in: '.$city.','.$region.','.$country.'</small><a class="button" href="#popup1" style="font-size:11px" title="Get on map">.<span class="glyphicon glyphicon-map-marker"></span></a>';

                     ?>
 
  <script type="text/javascript">
    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(<?php echo $lat; ?>, <?php echo $lon; ?>), 12);
      }
    }
  </script>
 </head>
 <body>
   <div id="map" style="width: 500px; height: 300px"></div>
   <script>load();</script>
   
   <?php } ?>
 </body>
</html>
