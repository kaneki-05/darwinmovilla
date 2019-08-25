<?php
	session_start();
	include 'conn.php';
	$name=$_POST['fname'] . " " . $_POST['lname'];
	$phone=$_POST['phone'];
	$landline=$_POST['landline'];
	$delivery_time = $_SESSION["delivery_time"];
	$delivery_date = $_SESSION["delivery_date"];
	$delivery_type = $_SESSION["delivery_type"];
	$fee="0.00";
	if($delivery_type=="DELIVERY"){
		$fee=number_format($_SESSION["fee"],2);
	}
	




	$order = "";
	if(!empty($_SESSION["shopping_cart"]))
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			$order .= "(". $values["product_quantity"] . ")" . $values["product_price"].", ";
	
		}
	}

	$address=$_POST['house']. " " . $_POST['subd'] . " " . $_POST['brgy'] . " " . $_POST['city'];
	$sql = "INSERT INTO tbl_order(name, phone, landline, address, fee, orders, delivery_time, delivery_date, delivery_type) 
	VALUES ('$name','$phone','$landline','$address','$fee','$order','$delivery_time','$delivery_date','$delivery_type')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>
 