<?php 
/*
				$regtype; // "seler"
				$seller_email_value = "";
				$seller_pwd_value = "";
				$seller_first_name_value = "";
				$seller_last_name_value = "";
				$seller_buss_name_value = "";
				$seller_addr_value = "";
				$seller_rev_msg_yes = "";
				$seller_rev_msg_no = "";
				$seller_category_food = "";
				$seller_category_electronics = "";
				$seller_category_rawmaterial = "";
				$seller_category_entertainment = "";
				
				$_POST['regtype']
				$_POST['seller_email_value']
*/
		include 'core/init.php';
		
		//getting info from reg page to here
		$var_type=$_POST['regtype'];
		$var_email= $_POST['seller_email_value']; //*****
		$var_password=$_POST['seller_pwd'];
		$var_first_name=$_POST['seller_first_name'];
		$var_last_name=$_POST['seller_last_name'];
		$var_bussiness_name=$_POST['seller_buss_name'];
		$var_seller_addr=$_POST['seller_addr'];
		$var_seller_rev_msg=$_POST['seller_rev_msg'];
		$var_seller_category_food=$_POST['seller_category_food'];
		$var_seller_category_electronics=$_POST['seller_category_electronics'];
		$var_seller_category_rawmaterial=$_POST['seller_category_rawmaterial'];
		$var_seller_category_entertainment=$_POST['seller_category_entertainment'];
		//echo $var_category;
	

		//inserting into db
		$sql="insert into register (email,password,first_name,last_name,business_name,address,phone_number,category,type) values ('$var_email','$var_password','$var_first_name','$var_last_name','$var_bussiness_name','$var_address',$var_phone_number,'$var_category','$var_type')";
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