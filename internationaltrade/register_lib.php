<?php 

include './core/init.php';

// to get the type from dropdown
$var_type = $_SESSION['regtype'];
//echo $var_type;

//getting info from reg page to here for seller
if ($var_type == "seller") {
	$var_seller_email = $_SESSION['seller_email'];
//echo $var_email;
	$var_seller_password = $_SESSION['seller_pwd'];
	$var_seller_first_name = $_SESSION['seller_first_name'];
	$var_seller_last_name = $_SESSION['seller_last_name'];
	$var_seller_bussiness_name = $_SESSION['seller_buss_name'];
	$var_seller_addr = $_SESSION['seller_addr'];
	$var_seller_mobile_number = $_SESSION['seller_mobile_number'];
	$var_seller_rev_msg = $_SESSION['seller_rev_msg'];
	$var_seller_category_food = $_SESSION['seller_category_food'];
	$var_seller_category_electronics = $_SESSION['seller_category_electronics'];
	$var_seller_category_rawmaterial = $_SESSION['seller_category_rawmaterial'];
	$var_seller_category_entertainment = $_SESSION['seller_category_entertainment'];
}
//getting info from reg page to here for buyer
else if ($var_type == "buyer") {
	$var_buyer_email = $_SESSION['buyer_email'];
	$var_buyer_password = $_SESSION['buyer_pwd'];
	$var_buyer_first_name = $_SESSION['buyer_first_name'];
	$var_buyer_last_name = $_SESSION['buyer_last_name'];
	$var_buyer_addr = $_SESSION['buyer_addr'];
	$var_buyer_contact_no = $_SESSION['buyer_mobile_number'];
	$var_buyer_rev_msg = $_SESSION['buyer_rev_msg'];
	$var_buyer_category_food = $_SESSION['buyer_category_food'];
	$var_buyer_category_electronics = $_SESSION['buyer_category_electronics'];
	$var_buyer_category_rawmaterial = $_SESSION['buyer_category_rawmaterial'];
	$var_buyer_category_entertainment = $_SESSION['buyer_category_entertainment'];
}




/*
 * Kevin: 03/09/2016
 * Temporarily display variables
 */
echo "===== Temporarily display variables =====<br/>";;
echo "var_type: ".$var_type . "<br/><br/>";

if ($var_type == "seller") {
	echo "===== SELLER =====<br/>";
	echo "var_seller_email: " . $var_seller_email . "<br/>";
	echo "var_seller_password: " . $var_seller_password . "<br/>";
	echo "var_seller_first_name: " . $var_seller_first_name . "<br/>";
	echo "var_seller_last_name: " . $var_seller_last_name . "<br/>";
	echo "var_seller_bussiness_name: " . $var_seller_bussiness_name . "<br/>";
	echo "var_seller_addr: " . $var_seller_addr . "<br/>";
	echo "var_seller_mobile_number: " . $var_seller_mobile_number . "<br/>";
	echo "var_seller_rev_msg: " . $var_seller_rev_msg . "<br/>";
	echo "var_seller_category_food: " . $var_seller_category_food . "<br/>";
	echo "var_seller_category_electronics: " . $var_seller_category_electronics . "<br/>";
	echo "var_seller_category_rawmaterial: " . $var_seller_category_rawmaterial . "<br/>";
	echo "var_seller_category_entertainment: " . $var_seller_category_entertainment . "<br/>";
}
else if ($var_type == "buyer") {
	echo "===== BUYER =====<br/>";
	echo "var_buyer_email: " . $var_buyer_email . "<br/>";
	echo "var_buyer_password: " . $var_buyer_password . "<br/>";
	echo "var_buyer_first_name: " . $var_buyer_first_name . "<br/>";
	echo "var_buyer_last_name: " . $var_buyer_last_name . "<br/>";
	echo "var_buyer_addr: " . $var_buyer_addr . "<br/>";
	echo "var_buyer_contact_no: " . $var_buyer_contact_no . "<br/>";
	echo "var_buyer_rev_msg: " . $var_buyer_rev_msg . "<br/>";
	echo "var_buyer_category_food: " . $var_buyer_category_food . "<br/>";
	echo "var_buyer_category_electronics: " . $var_buyer_category_electronics . "<br/>";
	echo "var_buyer_category_rawmaterial: " . $var_buyer_category_rawmaterial . "<br/>";
	echo "var_buyer_category_entertainment: " . $var_buyer_category_entertainment . "<br/>";
}








/*
 * Kevin: 03/09/2016
 * Temporarily blocked DB operation
 *


//inserting into db
if ($var_type = 'seller') {  // have to split the category based on the db
	$sql = "insert into register (email, password, first_name, last_name, business_name, address, phone_number, receive_msg, category, type)
			values ($var_seller_email, $var_seller_password, $var_seller_first_name, $var_seller_last_name, $var_seller_buss_name, $var_seller_addr, $var_seller_mobile_number, $var_seller_rev_msg, $var_seller_category_food, $var_seller_type)";
}
else if ($var_type = 'buyer') {
	$sql = "insert into register (email, password, first_name, last_name, business_name, address, phone_number, receive_msg, category, type)
			values ($var_buyer_email, $var_buyer_password, $var_buyer_first_name, $var_buyer_last_name, $var_buyer_bussiness_name, $var_buyer_addr, $var_buyer_mobile_number, $var_buyer_rev_msg, $var_buyer_category_food, $var_buyer_type)";
}

if (mysqli_query($con, $sql)) {
	echo "<script> alert(\"New record saved successfully..!\")</script>";
	mysqli_close($con);
}
else {
	echo "<script> alert(\"New record not saved successfully..!\")</script>";
	mysqli_close($con);
}

 */

?>