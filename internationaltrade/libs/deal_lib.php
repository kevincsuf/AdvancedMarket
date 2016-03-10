<?php 
	//create_deal Ver 1.0 - 03/07/2016
	//create_deal Ver 1.0 - 03/09/2016	
		include 'core/init.php';
		//$errors[] = "we can't find that username";
		//getting info from reg page to here
		$var_title= $_POST['title'];
	      //echo $var_title;
		$var_description=$_POST['description'];
		$var_qty=$_POST['qty'];
		//echo $var_description;
		$var_unit_price=$_POST['unit_price'];
		 //echo $var_qty;
		$var_unit=$_POST['unit'];
		$var_number_discount_option=$_POST['number_discount_option'];
		
		$var_number_discount_2=$_POST['number_discount_2'];
		$var_amount_discount_2=$_POST['amount_discount_2'];
		
		$var_number_discount_3=$_POST['number_discount_3'];
		$var_amount_discount_3=$_POST['amount_discount_3'];
		
		
		$var_time_restricted=$_POST['time_restricted'];
		$var_start_date=$_POST['start_date'];
		 //echo $var_start_date;
		$var_end_date=$_POST['end_date'];
	     //echo $var_end_date;
		$var_location_restricted=$_POST['location_restricted'];
		$var_location_Description=$_POST['location_Description'];
		 //echo $var_location_restricted;
		$var_shipping_included=$_POST['shipping_included'];
		$var__shipping_Description=$_POST['shipping_Description'];
		 //echo $var_shipping_included;
		
		
		

		//inserting into db
		//$sql="insert into create_deal(start_date,end_date,title,description,qty,unit,unit_price,time_restricted,location_restricted,shipping_included)values('$var_start_date','$var_end_date','$var_title','$var_description','$var_unit','$var_qty','$var_unit_price','$var_time_restricted','$var_location_restricted','$var_shipping_included')";
		
		$sql="insert into create_deal(start_date,end_date,title,description,qty,unit,unit_price,number_discount_option,number_discount_2,amount_discount_2,number_discount_3,amount_discount_3,time_restricted,location_restricted,location_Description,
		shipping_Description)values('$var_start_date','$var_end_date','$var_title','$var_description','$var_qty','$var_unit','$var_unit_price','$var_number_discount_option','$var_number_discount_2','$var_amount_discount_2','$var_number_discount_3','$var_amount_discount_3','$var_time_restricted','$var_location_restricted','$var_location_Description','$var__shipping_Description')";
		
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