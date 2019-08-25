<?php

//action.php
session_start();
include 'conn.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dolora's</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_storepage.css">
  </head>
  <body>
 <div id="bg_body">
  	<style>
  		#bg_body{
  			background: url('img/storepagebg.jpg');
  			background-size: cover;
  			height: 100%;
  			background-attachment: fixed;
  			min-height: inherit;
  			background-repeat: no-repeat;
  		}
  		.store{
  			background: white;
  			background-size: contain;
  		}
	</style>
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);background: rgba(255,255,0,1);">
  <a class="navbar-brand" href="index.php" style="text-decoration: none;border:1px white solid">
  <img src="img/logo2.png">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="storepage.php"><i class="fas fa-store"></i> Stores</a>
      </li>	
       <li class="nav-item active">
        <a class="nav-link" href="about.php"><i class="fas fa-address-card"></i> About</a>
      </li>	
       <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
      </li>	
    </ul>
  </div>
</nav>

<center>

  <style type="text/css">
    #storelogo{
     width: 130px;
     padding-top: 110px;
     margin-bottom: -20px;
    }
    #branchtext{
      padding-top: 30px;
      margin-bottom: 2px;
      color: white;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.9);
      font-size:50px;
    }
    @media (max-width: 560px){
      #branchtext{
        font-size: 30px;
      }
      #storelogo{
        width: 100px;
      }
    }
  </style>
	<div style="background: rgba(0,0,0,0.4);padding-bottom: 10px">
		<img src="img/title_logo.png" id="storelogo">
		<h6 id="branchtext">• OUR BRANCHES •</h6>


    <div><select id="locationSelect" style="width: 10%; visibility: hidden"></select></div>


		<div class="container text-center" style="padding-bottom: 20px;">
			<div class="row">
				<div class="col-md-12">
				<center>
					<div class="container" style="width: 100%">
						<div class="inner-addon right-addon">
						    <i class="fa fa-search" style="cursor:pointer;" id="searchButton" onclick="myScript()"></i>
						    <input type="text" id="pac-input" class="form-control search_text" placeholder="Street Address" onkeypress="initMap()">
						</div>
					</div>
				</center>
				</div>
				
			</div>
		</div>

	</div>
 





<?php
$sql = "SELECT * FROM tbl_branches";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $countrow = 0;
    while($row = $result->fetch_assoc()) {
        $gg = $countrow % 2;
        $countrow +=1;
    }
} else {
    echo "0 results";
}
?>





<div class="container" id="branch_search">

 <div class="container" id="div_store">


<?php
$sql = "SELECT * FROM tbl_branches";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $countrow = 0;
    while($row = $result->fetch_assoc()) {
        $two_row = $countrow % 2;
        if($two_row==""){
          ?>
<div class="row">

          <?php

        }

?>

<div class="col-md-6">
  <!-- <form method="post" action="storepage.php?action=order&branch_id=<?php echo $row["id"]; ?>&fee=0"> -->
          <div class="store">
          <h4 style="color:black;text-shadow: none;text-align: center;">Doloras Hauz of Pancit Malabon</h4><h4><?php echo $row["branch_name"]; ?></h4>
            <h6>Address:</h6>
            <p><?php echo $row["address"]; ?></p>
            <h6>Contact#:</h6>
            <p><?php echo $row["contact"]; ?></p>
            <h6>Open Hours</h6>
            <p><?php echo $row["openning_hour"] . " - " . $row["closed_hour"]; ?></p>
            <iframe src="http://localhost/final/maps.php?lat=<?php echo $row["lat"]; ?>&lng=<?php echo $row["lng"]; ?>" frameborder="0" style="border:1px solid silver;height:200px;width: 100%;" allowfullscreen></iframe>



            <button type="button" class="btn btn-primary btnviewmenu" id="btnviewmenu" fee="0" branch-id="<?php echo $row["id"]; ?>"><i class="fas fa-utensils"><b  style="font-family: arial;border-radius: 8px;cursor:pointer;"> VIEW MENU</b></i></button>
      

           
           
          </div>
          <!-- </form> -->

      </div>
    
    

          <?php
       if($two_row=="1"){
          ?>
  </div>
          <?php

        }



        
        $countrow +=1;
    }
} else {
    echo "0 results";
}
?>
		
			
 



 </div>
</center>

<style type="text/css">
	#footerv{
		background: url("img/footer.jpg");
		background-size: cover;
		background-repeat: no-repeat;
	}
	@media (max-width: 320px){
		#footerv{
			background: black;
		}
	}
	@media (min-width:321px) and (max-width: 480px){
		#footerv{
			background: black;
		}
	}
</style>


<div id="footerv">
	<h3>Contact Us</h3>
	<p><b>(Smart)</b> 0908 883 9208<b id="sep">|</b><b>(Globe)</b> 0917 327 9208<br>
	</p>
	<p id="email"><b>Email: </b>doloraspancitmalabon1990@gmail.com</p>
</div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script type="text/javascript">
 		$(document).ready(function () {
          if (!$.browser.webkit) {
              $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
          }
      });
 	</script>


<!-- Autocomplete address JavaScript -->
<script>
      function initMap() {
        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        // autocomplete.setTypes(['address']);
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);
        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }
          // If the place has a geometry, then present it on a map.
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }
          infowindowContent.children['place-address'].textContent = address;
        });
        
      }
    </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCq2FsBPBeTss_g4RVygcz2_vyFX0Qe1-0&libraries=places&callback=initMap" async defer></script>
<!----------------Store locate----------------->
   <script>
      var markers = [];
      var infoWindow;
     

        function searchnearplace() {
          var sydney = {lat: 14.3715503, lng: 121.0850848};
         
          infoWindow = new google.maps.InfoWindow();

          searchButton = document.getElementById("searchButton").onclick = searchLocations;

          
        }

       function searchLocations() {
         var address = document.getElementById("pac-input").value;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });
       }

       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

        
        
       }

       function searchLocationsNear(center) {
         clearLocations();
         
         var radius ='8';
         var searchUrl = 'http://localhost/final/locator.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           var branch = '';
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var name = markerNodes[i].getAttribute("branch_name");
             var address = markerNodes[i].getAttribute("address");
             var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var oneorzero = i % 2;
             var roundeddistance = Math.round( markerNodes[i].getAttribute("distance") * 10 ) / 10;
             


             
             if(oneorzero==0){
              branch = branch  + '<div class="row">' +
             '<div class="col-md-6">' +
             '<div class="store">' +
             '<h4 style="color:black;text-shadow: none;text-align: center;">Doloras Hauz of Pancit Malabon</h4><h4>' + markerNodes[i].getAttribute("branch_name") + '</h4>' +
             '<h6>Address:</h6>' +
             '<p>' + markerNodes[i].getAttribute("address") + '</p>' +
             '<h6>Contact#:</h6>' +
             '<p>' + markerNodes[i].getAttribute("contact") + '</p>' +
             '<h6>Open Hours</h6>' +
             '<p>' + markerNodes[i].getAttribute("openning_hour") + " - " + markerNodes[i].getAttribute("closed_hour") +'</p>' +
             '<h6>Distance</h6>' +
             '<p>' + roundeddistance + ' KM</p>' +
             '<h6>Delivery Charge</h6>' +
             '<p>₱' + markerNodes[i].getAttribute("fee") + '.00</p>' +
             '<iframe src="http://localhost/final/maps.php?lat=' + markerNodes[i].getAttribute("lat") + '&lng=' + markerNodes[i].getAttribute("lng") + '" frameborder="0" style="border:1px solid silver;height:200px;width: 100%;" allowfullscreen></iframe>' +
             '<button type="button" class="btn btn-primary btnviewmenu" id="btnviewmenu" fee="' + markerNodes[i].getAttribute("fee") + '" branch-id="' + markerNodes[i].getAttribute("id") + '"><i class="fas fa-utensils"><b  style="font-family: arial;border-radius: 8px;cursor:pointer;"> VIEW MENU</b></i></button>' +
             '</div>' +
             '</div>';
            }else if(oneorzero==1)
             branch = branch + '<div class="col-md-6">' +
             '<div class="store">' +
             '<h4 style="color:black;text-shadow: none;text-align: center;">Doloras Hauz of Pancit Malabon</h4><h4>' + markerNodes[i].getAttribute("branch_name") + '</h4>' +
             '<h6>Address:</h6>' +
             '<p>' + markerNodes[i].getAttribute("address") + '</p>' +
             '<h6>Contact#:</h6>' +
             '<p>' + markerNodes[i].getAttribute("contact") + '</p>' +
             '<h6>Open Hours</h6>' +
             '<p>' + markerNodes[i].getAttribute("openning_hour") + " - " + markerNodes[i].getAttribute("closed_hour") + '</p>' +
             '<h6>Distance</h6>' +
             '<p>' + roundeddistance + ' KM</p>' +
             '<h6>Delivery Charge</h6>' +
             '<p>₱' + markerNodes[i].getAttribute("fee") + '.00</p>' +
             '<iframe src="http://localhost/final/maps.php?lat=' + markerNodes[i].getAttribute("lat") + '&lng=' + markerNodes[i].getAttribute("lng") + '" frameborder="0" style="border:1px solid silver;height:200px;width: 100%;" allowfullscreen></iframe>' +
             '<button type="button" class="btn btn-primary btnviewmenu" id="btnviewmenu" fee="' + markerNodes[i].getAttribute("fee") + '" branch-id="' + markerNodes[i].getAttribute("id") + '"><i class="fas fa-utensils"><b  style="font-family: arial;border-radius: 8px;cursor:pointer;"> VIEW MENU</b></i></button>' +
             '</div>' +
             '</div>' +
             
             '</div>';





           }

           document.getElementById("branch_search").innerHTML = branch;
           
         });
       }

   


       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
       }

       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }

       function doNothing() {}
  </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCq2FsBPBeTss_g4RVygcz2_vyFX0Qe1-0&callback=searchnearplace">
    </script>
    <script>
      
      $(document).ready(function(){
          $(document).on('click', '.btnviewmenu', function(){
          var branchid = $(this).attr("branch-id");
          var fee = $(this).attr("fee");
          var action = 'view_menus';
          $.ajax({
            url:"action.php",
            method:"POST",
            data:{branchid:branchid, fee:fee, action:action},
            success:function()
            {
             location.href='storeorder.php';
            }
          })

        });
      });
    </script>


  </body>
</html>