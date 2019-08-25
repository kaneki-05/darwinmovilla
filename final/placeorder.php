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
    <link href="css/simple-sidebar.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <link rel="stylesheet" type="text/css" href="css/style_storepage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

jQuery(function( $ ){
			// Get a reference to the container.
			var container = $( "#yourorder" );
			// Bind the link to toggle the slide.
			$( "#vieworder" ).click(
				function( event ){
					// Prevent the default event.
					event.preventDefault();
					// Toggle the slide based on its current
					// visibility.
					if (container.is( ":visible" )){
						// Hide - slide up.
						container.slideUp( 360 );
					} else {
						// Show - slide down.
						container.slideDown( 360 );
					}
				}
			);
		});
</script>
</head>
<body>
 
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);background: rgba(255,255,0,1);">
  <a class="navbar-brand" href="index.php" style="text-decoration: none;border:1px white solid">
  <img src="img/logo2.png" style="width: 86px ;height: 40px;text-decoration: none;border: none;box-shadow: none;">
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
<!-- desktop banner-->
<div class="container-fluid text-center border-bottom" id="bannerdesktop" style="background: url('img/banner.jpg');background-clip:border-box;background-repeat: no-repeat;color: white;margin-top: 60px;height: auto;">


  <img src="img/title_logo.png" id="logo_desktop">

<?php 

$sql = "SELECT * FROM tbl_branches WHERE id='". $_SESSION["branch_id"] ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>
        <h2 id="title_desktop"><?php echo  $row["branch_name"]; ?> </h2>
          <p style="font-size: 20px"><span class="fa fa-map-marker-alt"></span> <?php echo  $row["address"]; ?>
          </p>
          <p style="margin-top: -10px;font-size: 20px;padding-bottom: 40px"><span class="fa fa-clock"></span><?php echo  $row["openning_hour"] . " - " . $row["closed_hour"]; ?>
          </p>

      <?php
    }
} else {
    echo "0 results";
}
?>
  </div>

<!-- small devices banner-->
<div class="container-fluid text-center" id="bannermobile" style="background: url('img/mobile.jpg');background-clip:border-box;background-repeat: no-repeat;background-size: cover;color: white;margin-top: 60px;height: auto;
padding-top: 40px">

<img src="img/title_logo.png" style="width: 100px;height: auto;padding-top: 20px;padding-bottom: 20px;border: none;box-shadow: none;">


<h2 style="
  font-size: 32px;
  font-family: Times New Roman;
  color: #fff200;
  text-align: center;
  text-shadow: 1px 1.732px 18px rgb( 0, 0, 0 );
  width: auto;
">PLAZA ALDEA TANAY BRANCH</h2>

<p><span class="fa fa-map-marker-alt"></span> Plaza Rizal St., Plaza Aldea, Tanay Rizal
</p>
<p style="margin-top: -10px;padding-bottom: 20px"><span class="fa fa-clock"></span> 9:00AM - 8:00PM
</p>
</div>

<style type="text/css">
  #logo_desktop{
    width: 150px;
    height: auto;
    padding-top: 40px;
    margin-bottom: 10px;
    border: none;
    box-shadow: none;
  }
  #title_desktop{
  font-size: 60px;
  font-family: Times New Roman;
  color: #fff200;
  text-align: center;
  text-shadow: 1px 1.732px 18px rgb( 0, 0, 0 );
  width: auto;
  }
  @media (max-width: 780px){ /** Mobile **/
    #bannerdesktop{
      display: none;
    }
  }
  @media (min-width: 781px){ /** Desktop **/
    #bannermobile{
      display: none;
    }
    #logo_desktop{
      width: 100px;
    }
    #title_desktop{
      font-size: 40px;
    }

  }
</style>
<!-- End of header --> 

</style>
<!-- Pancit Malabon -->
<style>


.left {
  width: 65%;
  padding: 20px;
  /*background: gray; */
}
.right {
  width: 35%;
  padding: 20px;
   /*background: gray; */
}
@media (max-width: 780px){
  .left{
    width: 100%;

  }
  .right{
    width: 100%;
    height: 200px;
  }
}
@media (min-width: 781px){
  .right{
    margin-left: -100px;
  }
}
</style>
</head>
<body>


<h3 class="text-center" style="padding: 30px">ORDER INFORMATION</h3>
<div class="row" style="margin-bottom: 190px;padding-bottom: 40px">

  <div class="column left">
   <center>
                <form class="form-horizontal" method="" action="">
                    

                       <h4>Customer Information</h4>
                        <div class="form-group">
                           
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                           </div>
                        </div>
                        <div class="form-group">
                         
                            <div class="col-md-8">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Mobile #" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <input id="landline" name="landline" type="text" placeholder="Landline #" class="form-control">
                            </div>
                        </div>
                       <?php 
                       $delivery_type = $_SESSION["delivery_type"];

                       if($delivery_type=="DELIVERY"){
                        ?>
                        <h4 >Address</h4>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input id="house" name="phone" type="text" placeholder="Lot/Blk/Phase/Street or Floor#/Building name/Apartment name" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-8">
                                <input id="subd" name="phone" type="text" placeholder="Sitio / Purok / Subdivision name" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-8">
                                <input id="brgy" name="phone" type="text" placeholder="Barangay" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <input id="city" name="phone" type="text" placeholder="City" class="form-control">
                            </div>
                        </div>

                      <?php }
                      ?>

              
                </form>
           </center>
  </div>

  <div class="column right">


<div id="display_cart">
      </div>
<!-- 
    <div class="container" id="yourorder">
        <h6 class="text-center" style="margin:0;padding-bottom: 10px;padding-top: 10px;margin-bottom: 10px;font-size: 25px;text-align: center;"><b>Order Details</b></h6>
<style>
 
a:focus, a:hover {
  border-color: none;
  outline: none;
}
</style>
        <table class="table table-sm">
        <thead>
          <tr class="text-center">
            <th scope="col">Qty</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col"><span class="fa fa-cog"></span></th>
          </tr>
        </thead>
        <tbody>


          <tr class="text-center">
            <td>1</td>
            <td>Pancit Malabon</td>
            <td>₱1060</td>
            <td><a href="#"><span class="fa fa-times-circle" style="color: red"></span></a></td>
          </tr>
          <tr class="text-center">
            <td>1</td>

            <td>Small Puto (28pcs)</td>
            <td>₱65</td>
            <td><a href="#"><span class="fa fa-times-circle" style="color:red"></span></a></td>
          </tr>
         


        </tbody>
      </table>
       <h6 class="text-left">Delivery Charge:</h6>
        <p class="text-center" style="margin-top: 5px">₱50.00</p>
       <h6 class="text-left" style="margin-top: -12px">Total:</h6>
        <p class="text-center" style="margin-top: -12px;margin-bottom: 8px">₱50.00</p>

       <button type="button" class="btn btn-warning" style="background: yellow;color: black;border: 3px solid yellow;border-radius: 20px;font-size: 18px;padding:6px;width: 100%;cursor: pointer;margin-top: 5px;font-size: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.2);" onclick="placeorder()"><i class="fa fa-shopping-cart"><b  style="font-family: arial;"> PLACE ORDER</b></i></button>
    </div>  
 -->










  </div>
</div>


<!-- End of 320px -->

<style type="text/css">
  #h3contact{
    margin-top: -20px;
  }
  #footerv{

    color:white;
    text-align: center;
    padding:30px;
    margin-top: -40px;
    width: 100%;
    background: url("img/footer.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    height: auto;
    padding-bottom: 50px;
  }
  @media (max-width: 480px){
     #h3contact{
    margin-top: 10px;
    }
    #email1{
      padding-bottom: -90px;
    }
  }
  @media (max-width: 320px){
      #email1{
        margin-left: -10px;
      }
  }
  @media (min-width:320px) and (max-width: 780px){
    #footerv{
      background: black;
      height: 150px;
    }
     #email{
       padding-bottom: 60px;
    }
   }
  @media (min-width: 781px) and (max-width:3000px){
      #email1{
        margin-bottom: -30px;
      }
      #email{
        display: none;
        margin-bottom: -50px;
      }
      #h3contact{
        padding-top: 30px;
      }
      #footerv{
         padding-top: 10px;
      }
  }
</style>

<div id="footerv">
  <h3 id="h3contact">Contact Us</h3>
  <p><b>(Smart)</b> 0908 883 9208<b id="sep">|</b><b>(Globe)</b> 0917 327 9208<br>
    <p id="email1"><b>Email:</b>
   doloraspancitmalabon1990@gmail.com</p>
  </p>
</div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
 	  <script src="js/bootstrap.bundle.min.js"></script>
 
  </body>
</html>

<script>  
$(document).ready(function(){

  load_product();

  load_cart_data();
  load_cart_mobile_data();
    
  function load_product()
  {
    $.ajax({
      url:"fetch_item.php",
      method:"POST",
      success:function(data)
      {
        $('#display_item').html(data);
      }
    });
  }

  function load_cart_data()
  {
    $.ajax({
      url:"fetch_placeorder_cart.php",
      method:"POST",
      success:function(data)
      {
        $('#display_cart').html(data);
      }
    });
  }
 function load_cart_mobile_data()
  {
    $.ajax({
      url:"fetch_mobile_cart.php",
      method:"POST",
      success:function(data)
      {
        $('#display_mobile_cart').html(data);
      }
    });
  }

  $(document).on('click', '.add_to_cart', function(){
    var product_id = $(this).attr("data-id");
    var product_name = $('#category'+product_id+'').val();
    var product_price = $('#price'+product_id+'').val();
    var product_quantity = 1;
    var action = "add";
    if(product_quantity > 0)
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
        success:function(data)
        {
          load_cart_data();
          load_cart_mobile_data();
          alert("Item has been Added into Cart");
        }
      });
    }
    else
    {
      alert("lease Enter Number of Quantity");
    }
  });

  $(document).on('click', '.delete', function(){
    var product_id = $(this).attr("id");
    var action = 'remove';
    if(confirm("Are you sure you want to remove this product?"))
    {
      $.ajax({
        url:"action.php",
        method:"POST",
        data:{product_id:product_id, action:action},
        success:function()
        {
          load_cart_data();
          load_cart_mobile_data();
          $('#cart-popover').popover('hide');
          alert("Item has been removed from Cart");
        }
      })
    }
    else
    {
      return false;
    }
  });

  $(document).on('click', '#clear_cart', function(){
    var action = 'empty';
    $.ajax({
      url:"action.php",
      method:"POST",
      data:{action:action},
      success:function()
      {
        load_cart_data();
        load_cart_mobile_data();
        $('#cart-popover').popover('hide');
        alert("Your Cart has been clear");
      }
    });
  });
    
});

</script>













<script>
 $(document).on('click', '.insert', function(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var phone = $('#phone').val();
    var landline = $('#landline').val();
    var house = $('#house').val();
    var subd = $('#subd').val();
    var brgy = $('#brgy').val();
    var city = $('#city').val();


    if(fname!="" && lname!="" && phone!="" && city!=""){

      $.ajax({
        url: "save.php",
        type: "POST",
        data: {
          fname: fname,
          lname: lname,
          phone: phone,
          landline: landline,
          house: house,
          subd: subd,
          brgy: brgy,
          city: city
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            alert("Your order has been place!");
          }
          else if(dataResult.statusCode==201){
             alert("Error occured !");
          }
          
        }
      });
    }
    else{
      alert('Please fill all the field !');
    }
  });


</script>