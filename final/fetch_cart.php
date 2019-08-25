<?php

//fetch_cart.php

session_start();
include 'conn.php';
$total_price = 0;
$total_item = 0;

$output = '
 <div class="border-right" id="sidebar-wrapper" style="padding: 20px;margin-top: -1px;width:auto;font-size: 14px;text-align: center;">
      <div class="sidebar-heading text-center" style="color:#0005a2;padding-top: 20px"><h3>Your Order</h3></div>
      <div class="list-group list-group-flush" style="width: 220px">

          <table class="table table-sm" style="width: 100%">
            <thead>
              <tr class="text-center">
                <th scope="col">Qty</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col"><span class="fa fa-cog"></span></th>
              </tr>
            </thead>
            <tbody>
';
if(!empty($_SESSION["shopping_cart"]))
{
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$output .= '
		
		  <tr class="text-center">
        <td>'.$values["product_quantity"].'</td>
        <td>'.$values["product_name"].'</td>
        <td>₱'.number_format($values["product_price"],2).'</td>
        <td><a href="#"><span class="fa fa-times-circle delete" id="'. $values["product_id"].'" style="color:red"></span></a></td>
      </tr>
		';
		$total_price = $total_price + ($values["product_quantity"] * $values["product_price"]);
		$total_item = $total_item + 1;
	}
}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Your Cart is Empty!
    	</td>
    </tr>
    ';
}





$openning = "";
$closing = "";
$sql = "SELECT * FROM tbl_branches WHERE id='". $_SESSION["branch_id"] ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $openning = $row["openning_hour"];
      $closing = $row["closed_hour"];
    }
} else {

}
$timestamp = "";
$combobox_time = '<select class="select_box" id="cb_time">';
?>

<?php
date_default_timezone_set('Asia/Manila');
$time = strtotime(date('H:i:s'));
while($timestamp!="done") {
  $deltime = date("g:i:00 A", strtotime('+40 minutes', $time));

  if (strtotime($deltime) >= strtotime($openning) && strtotime($deltime) <= strtotime($closing) ) {
    $combobox_time .= '<option value="1">'. $deltime. '</option>'; 
  }
  if (strtotime($deltime) >= strtotime($closing) ) {
    $timestamp = "done";
  }
  $time = strtotime($deltime);
}
$combobox_time .= '</select>';




$combobox_date='<select class="select_box" id="cb_date">';
$counts = 0;
$delivery_date = date('F d, Y');

$deldate =$delivery_date;
while($counts<=5) {
  $combobox_date .= '<option value="1">'. $deldate. '</option>';
  $deldate = date('F d, Y', strtotime("+1 day", strtotime($delivery_date)));
  $delivery_date =$deldate;
  $counts+=1;
}
$combobox_date .= '</select>';



$total_price = $total_price + $_SESSION["fee"];
$output .= '
       </tbody>
          </table>
          <h6 class="text-left">Delivery Charge:</h6>
          <p class="text-center" style="margin-top: 5px">₱'.number_format($_SESSION["fee"],2).'</p>
          <h6 class="text-left" style="margin-top: -12px">Total:</h6>
          <b><p class="text-center" style="margin-top: -12px;margin-bottom: 8px">₱'. number_format($total_price,2) .'</p></b>
          <div style="margin-left:-10px;">
          <select id="cb_type">
            <option value="1">PICKUP</option>
            <option value="2">DELIVERY</option>
          </select>' . $combobox_time . $combobox_date . '
         
          </center>

          <button type="button" class="btn btn-warning create" style="background: yellow; color: black;border: 3px solid yellow;border-radius: 20px;font-size: 18px;padding:6px;width: 100%;cursor: pointer;margin-top: 15px;font-size: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.2);"><i class="fa fa-shopping-cart"><b  style="font-family: arial;"> CREATE ORDER</b></i></button>


       </div>
    </div>';
echo $output;

?>

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
<style>
  body select { 
    display: block;
    padding: 10px 70px 10px 13px !important; 
    max-width: 100%; 
    width: 100%;
    height: auto !important; 
    border: 1px solid #e3e3e3; 
    border-radius: 3px; 
    background: url("https://i.ibb.co/b7xjLrB/selectbox-arrow.png") right center no-repeat; 
    background-color: #fff; 
    color: #444444; 
    font-size: 12px; 
    line-height: 16px !important; 
    appearance: none; 
    /* this is must */ -webkit-appearance: none; 
    -moz-appearance: none; 
} 
/* body select.select_box option */ 
body select option { 
    padding: 0 4px; 
} 
/* for IE and Edge */ 
select::-ms-expand { 
    display: none; 
} 
select:disabled::-ms-expand { 
    background: #f60; 
}
</style>