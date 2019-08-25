<?php

//fetch_cart.php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
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
$total_price = $total_price + $_SESSION["fee"];
$output .= '
       </tbody>
          </table>
          <h6 class="text-left">Delivery Charge:</h6>
          <p class="text-center" style="margin-top: 5px">₱'.number_format($_SESSION["fee"],2).'</p>
          <h6 class="text-left" style="margin-top: -12px">Total:</h6>
          <b><p class="text-center" style="margin-top: -12px;margin-bottom: 8px">₱'. number_format($total_price,2) .'</p></b>
         <button type="button" id="insert" class="btn btn-warning insert" style="background: yellow;color: black;border: 3px solid yellow;border-radius: 20px;font-size: 18px;padding:6px;width: 100%;cursor: pointer;margin-top: 5px;font-size: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.2);" onclick="placeorder()"><i class="fa fa-shopping-cart"><b  style="font-family: arial;"> PLACE ORDER</b></i></button>
       </div>
    </div>';
echo $output;


?>

