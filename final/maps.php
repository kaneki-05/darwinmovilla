<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Complex Marker Icons</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.
      var lat = parseFloat('<?php echo $_GET["lat"]; ?>');
      var lng = parseFloat('<?php echo $_GET["lng"]; ?>');
      function initMap() {
  
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          zoomControl: true,
          center: {lat: lat, lng: lng},
         
        });

        setMarkers(map);
      }
      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
      var beaches = [
        [lat, lng]
      ];

      function setMarkers(map) {
        // Adds markers to the map.

        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        var image = {
          url: "marker.png",
          // This marker is 20 pixels wide by 32 pixels high.
          scaledSize: new google.maps.Size(50, 60),
          
        };
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };
          var beach = beaches[0];
          var marker = new google.maps.Marker({
            position: {lat: beach[0], lng: beach[1]},
            map: map,
            icon: image,
            shape: shape,
          
          });
       
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCq2FsBPBeTss_g4RVygcz2_vyFX0Qe1-0&callback=initMap">
    </script>
  </body>
</html>