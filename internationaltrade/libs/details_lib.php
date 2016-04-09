<?php

require_once("./core/init.php");
require_once("./_incl_confirm_login.php");
require_once("./login_lib.php");


	$var_create_deal_id = $_SESSION["create_deal_id"];
	$var_user_id = $_SESSION["ukey"];
	$var_order_quantity = $_SESSION["order_quantity"];
	$var_address = $_SESSION["address"];
	$var_state = $_SESSION["state"];
	$var_zipcode = $_SESSION["zipcode"];
	$var_closure_date = $_SESSION["closure_date"];



/*
 * Kevin: 04/05/2016
 * Temporarily display variables
 */
	echo "===== Temporarily display variables =====<br/>";;
	echo "var_create_deal_id: " . $var_create_deal_id . "<br/>";
	echo "var_user_id: " . $var_user_id. "<br/>";
	echo "var_order_quantity: " .$var_order_quantity. "</br>";
	echo "var_address: " . $var_address . "<br/>";
	echo "var_state: " . $var_state . "<br/>";
	echo "var_zipcode: " . $var_zipcode . "<br/>";
	echo "var_closure_date: " . $var_closure_date . "<br/>";

	//inserting data into DB

	$sql= "insert into join_deal(create_deal_id,user_id,order_quantity,address,state,zipcode,closure_date)values('$var_create_deal_id','$var_user_id','$var_order_quantity','$var_address','$var_state','$var_zipcode','$var_closure_date')";
	

	if(mysqli_query($con,$sql))
	{
	echo "<script> alert(\"New record saved successfully..!\")</script>";
	mysqli_close($con);
	}
	else
	{
	echo "<script> alert(\"New record not saved successfully..!\")</script>";
	mysqli_close($con);
	}




?>