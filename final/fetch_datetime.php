<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "datetimetype")
	{
		$_SESSION["delivery_time"] = $_POST["delivery_time"];
		$_SESSION["delivery_date"] = $_POST["delivery_date"];
		$_SESSION["delivery_type"] = $_POST["delivery_type"];
	}
}