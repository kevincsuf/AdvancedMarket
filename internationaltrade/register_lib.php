<?php 

		include 'core/init.php';
		
		// to get the type from dropdown
		$var_type=$_POST['regtype'];
		echo $var_type;
		
		//getting info from reg page to here for seller
		$var_seller_email= $_POST['seller_email_value']; //*****
		echo $var_email;
		$var_seller_password=$_POST['seller_pwd'];
		$var_seller_first_name=$_POST['seller_first_name'];
		$var_seller_last_name=$_POST['seller_last_name'];
		$var_seller_bussiness_name=$_POST['seller_buss_name'];
		$var_seller_addr=$_POST['seller_addr'];
		$var_seller_mobile_number = $_POST ['seller_mobile_number']
		$var_seller_rev_msg=$_POST['seller_rev_msg'];
		$var_seller_category_food=$_POST['seller_category_food'];
		$var_seller_category_electronics=$_POST['seller_category_electronics'];
		$var_seller_category_rawmaterial=$_POST['seller_category_rawmaterial'];
		$var_seller_category_entertainment=$_POST['seller_category_entertainment'];
				
		//getting info from reg page to here for buyer
		
		$var_buyer_email= $_POST['buyer_email']; //*****
		$var_buyer_password=$_POST['buyer_pwd'];
		$var_buyer_first_name=$_POST['buyer_first_name'];
		$var_buyer_last_name=$_POST['buyer_last_name'];
		$var_buyer_addr=$_POST['buyer_addr'];
		$var_buyer_contact_no = $_POST ['buyer_mobile_number'];
		
		$var_buyer_rev_msg=$_POST['buyer_rev_msg'];
		$var_buyer_category_food=$_POST['buyer_category_food'];
		$var_buyer_category_electronics=$_POST['buyer_category_electronics'];
		$var_buyer_category_rawmaterial=$_POST['buyer_category_rawmaterial'];
		$var_buyer_category_entertainment=$_POST['buyer_category_entertainment'];

		//inserting into db
		if ($var_type = 'seller')
		{  // have to split the category based on the db 
			$sql="insert into register (email,password,first_name,last_name,business_name,address,phone_number,receive_msg,category,type) values ('$var_seller_email','$var_seller_password','$var_seller_first_name','$var_seller_last_name','$var_seller_bussiness_name','$var_seller_addr',$var_seller_mobile_number,$var_seller_rev_msg,'$var_seller_category_food','$var_seller_type')";
		}
		else ($var_type = 'buyer')
		{
			$sql="insert into register (email,password,first_name,last_name,business_name,address,phone_number,receive_msg,category,type) values ('$var_buyer_email','$var_buyer_password','$var_buyer_first_name','$var_buyer_last_name','$var_buyer_bussiness_name','$var_buyer_addr',$var_buyer_mobile_number,$var_buyer_rev_msg,'$var_buyer_category_food','$var_buyer_type')";
		}
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