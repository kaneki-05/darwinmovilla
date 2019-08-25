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
    
  </head>
  <body style="background: white">

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
        <a class="nav-link" href="#"><i class="fas fa-address-card"></i> About</a>
      </li>	
       <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-phone"></i> Contact</a>
      </li>	
    </ul>
  </div>
</nav>
 <div class="container-fluid fix_bg" style="background: url('img/gg.jpg');background-attachment: fixed;min-height: inherit;background-repeat: no-repeat;background-size: cover;">
 	<center>

 	<img src="img/title_logo.png" id="img_logo">

 	<h1>"For the BEST tasting Pancit Malabon"</h1>
 	<h3 id="order_text">ORDER NOW!</h3>
	<button type="button" class="btn btn-warning" id="buttonorder1" ><i class="fas fa-motorcycle"><b  style="font-family: arial"> DELIVERY</b></i></button>
	<button type="button" class="btn btn-primary" id="buttonorder2"><i class="fas fa-utensils"><b  style="font-family: arial"> TAKE OUT</b></i></button>
	</center>
 </div>
<center>
 <h4 id="step_text">• HOW TO ORDER •</h4>

</center>
 <div class="container" id="order_steps_div">
 	<div class="row">
 		<div class="col-md-4">
 			<div class="card">
 			<i class="fas fa-store" id="icon"></i>
 			<h5>Select a Branch</h5>
 			</div>
 		</div>
 		<div class="col-md-4">
 			<div class="card">
 			<i class="fas fa-utensils" id="icon"></i>
 			<h5>Choose Your Order</h5>
 			</div>
 		</div>
 		<div class="col-md-4">
 			<div class="card">
 			<i class="fas fa-check-square" id="icon"></i>
 			<h5>Place Your Order</h5>
 			</div>
 		</div>
 	</div>
 </div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 	<script type="text/javascript">
 		$(document).ready(function () {
          if (!$.browser.webkit) {
              $('.wrapper').php('<p>Sorry! Non webkit users. :(</p>');
          }
      });
 	</script>

  </body>
</html>