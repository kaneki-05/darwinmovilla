<?php

//fetch_item.php
session_start();
include('database_connection.php');

$query = "SELECT * FROM tbl_menu WHERE branch_id='". $_SESSION["branch_id"] ."'";

$statement = $connect->prepare($query);

if($statement->execute())
{
  $result = $statement->fetchAll();
  $output = '';
  foreach($result as $row)
  {
    // $output .= '
    // <div class="col-md-3" style="margin-top:12px;">  
  //                 <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
  //                  <img src="img/'.$row["image"].'" class="img-responsive" /><br />
  //                  <h4 class="text-info">'.$row["item_name"].'</h4>
  //                       <h5 class="text-info">'.$row["description"].'</h4>
  //                       <h5 class="text-info">'.$row["size"].'</h4>
  //                  <h4 class="text-danger">₱ '.$row["price"] .'</h4>

  //                  <input type="text" name="quantity" id="quantity' . $row["id"] .'" class="form-control" value="1" />
  //                  <input type="hidden" name="hidden_name" id="name'.$row["id"].'" value="'.$row["item_name"].'" />
  //                       <input type="hidden" name="hidden_description" id="description'.$row["id"].'" value="'.$row["description"].'" />
  //                       <input type="hidden" name="hidden_size" id="size'.$row["id"].'" value="'.$row["size"].'" />
  //                  <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />
  //                  <input type="button" name="add_to_cart" id="'.$row["id"].'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />

  //                 </div>
  //           </div>
    // ';


                     $output .= '<div style="min-width: 220px;width:calc(100% - 80px)" data-id="'.$row["id"].'" class="add_to_cart" id="pancitm">
                     <img src="img/'.$row["image"].'" height="72px" width="70px" style=";float: left;">
                     <p style="font-family: baskersville old, times new roman"><b>'.$row["item_name"].'</b><br>'.$row["description"].'<br>'.$row["size"].'</p>
                     </div>



                      <input type="hidden" name="hidden_name" id="category'.$row["id"].'" value="'.$row["menu_category"]. '<br>' .$row["description"].'" />
                      <input type="hidden" name="hidden_description" id="description'.$row["id"].'" value="'.$row["description"].'" />
                      <input type="hidden" name="hidden_size" id="size'.$row["id"].'" value="'.$row["size"].'" />
                      <input type="hidden" name="hidden_price" id="price'.$row["id"].'" value="'.$row["price"].'" />


                      <input type="hidden" name="quantity" id="quantity' . $row["id"] .'" class="form-control" value="1" />

                    ';


               
  }

  echo $output;
}


?>
 <style>

  #pancitm{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.2);
    background: #FFCA28;
   
    cursor:pointer !important;
  }
  #pancitm:hover{
    background: #FFEE58;
  }


</script>
 </style>