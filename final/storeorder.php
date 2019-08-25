<?php

//action.php
session_start();
include 'conn.php';
if(isset($_SESSION["branch_id"]))
{}else{
  echo "<script> location.href='storepage.php'; </script>";
}
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
    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
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
        <a class="nav-link" href="about.php"><i class="fas fa-address-card"></i> About</a>
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
<div class="container-fluid text-center" id="bannermobile" style="background: url('img/mobile.jpg');background-repeat: no-repeat;background-size: cover;color: white;margin-top: 60px;height: auto;
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

<!-- Pancit Malabon -->
<div class="d-flex" id="wrapper" style="padding-bottom: 40px;">
    <!-- Sidebar -->
     <div id="display_cart">
      </div>
    <!-- /#sidebar-wrapper -->

 <style>

  #pancitm{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.2);
    background: white;
  /** #FFCA28; **/
    border-radius: 5px;
    cursor:pointer !important;
  }
  #pancitm:hover{
    background: #FFEE58;
  }
  #menu_logo{
    width: 240px;
    border: none;
    padding-bottom: 10px;
    cursor:default;
    margin-top: -30px;
    margin-bottom: -10px;
  }
  #menu_holder{
    padding-top: 40px;
    padding-bottom: 40px; 
    background: url('img/bgaboutus.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }
  @media (min-width: 480px){
    #menu_logo{
      margin-top: 20px;
      width: 300px;
    }
  }
  @media (max-width: 560px){
    #menu_holder{
      padding-bottom: 100px;
    }
  }
 
 </style>
<div class="container-fluid text-center" id="menu_holder">
 <center>
        <div class="container">
        
          <img src="img/menulogo.png" id="menu_logo">
          <div class="row justify-content-center">
            <div class="col-md-6">
                <h4 style="color:#0005a2;font-family: times new roman;font-weight: bold;font-size: 28px;margin-bottom: 18px" id="h4text">Pancit Malabon</h4>
             <div id="display_item"></div>
            </div>
            <div class="col-md-6" id="siding"> 
               <h4 style="color:#0005a2;font-family: times new roman;font-weight: bold;font-size: 28px;margin-bottom: 18px" id="h4text">Sidings</h4>
              <div style="min-width: 220px;width:calc(100% - 80px);height: 72px;" id="pancitm">
                  <img src="img/170.jpg" height="72px" width="70px" style=";float: left;">
                  <p style="font-family: baskersville old, times new roman"><b>Small Puto<br>(28 pcs)</b><br>Php. 70.00<br></p>
              </div>
              <p></p>
              <div style="min-width: 220px;width:calc(100% - 80px);height: 72px;" id="pancitm">
                  <img src="img/170.jpg" height="72px" width="70px" style=";float: left;">
                  <p style="font-family: baskersville old, times new roman;"><b>Lumpiang Shanghai <br> (15 pcs)</b><br>Php. 120.00<br></p>
              </div>

              
            </div>
          </div>
        </div>
 </div>

  </div>
      

<!-- End Pancit Malabon -->
<div id="display_mobile_cart">

      
</div>
  
<style>
  td > a{
    outline: 0;border: none;
  }
  #btncreateorder{
    background: yellow;
    color: black;
    border: 3px solid yellow;
    border-radius: 3px;
    font-size: 18px;
    padding:10px;
    width: 100%;
     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.2);
  }
  #btmorder{
    background: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    bottom: 0;
    position: fixed;
    padding: 8px;
  }
  @media (max-width: 560px){
    .demo{
      display: none;
    }
  }
</style>

<!-- End of 320px -->





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
      url:"fetch_cart.php",
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




















  $(document).on('click', '.create', function(){
      
    var delivery_time = document.getElementById("cb_time");
    delivery_time = delivery_time.options[delivery_time.selectedIndex].text;

    var delivery_date = document.getElementById("cb_date");
    delivery_date = delivery_date.options[delivery_date.selectedIndex].text;


    var delivery_type = document.getElementById("cb_type");
    delivery_type = delivery_type.options[delivery_type.selectedIndex].text;
    var action = "datetimetype";
    $.ajax({
      url:"fetch_datetime.php",
      method:"POST",
      data:{delivery_time:delivery_time, delivery_date:delivery_date, delivery_type:delivery_type, action:action},
      success:function(data)
      {
        window.location.href = "placeorder.php";
      }
    });





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