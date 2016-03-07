
<?php 
	
		
		include 'core/init.php';
		//$errors[] = "we can't find that username";
		//getting info from reg page to here
		$var_title= $_POST['title'];
		// echo $var_title;
		$var_description=$_POST['description'];
		 //echo $var_description;
		$var_qty=$_POST['qty'];
		 //echo $var_qty;
		$var_unit_price=$_POST['_price'];
		 //echo $var_unit_price;
		$var_min_price=$_POST['min_price'];
		 //echo $var_min_price;
		$var_time_restricted=$_POST['time_restricted'];
		 //echo $var_time_restricted;
		 $var_stage_discount=$_POST['stage_discount'];
		 $var_start_date=$_POST['start_date'];
		 //echo $var_start_date;
		$var_end_date=$_POST['end_date'];
	     //echo $var_end_date;
		$var_location_restricted=$_POST['location_restricted'];
		 //echo $var_location_restricted;
		$var_shipping_included=$_POST['shipping_included'];
		 //echo $var_shipping_included;
		
		
		

		//inserting into db
		$sql="insert into create_deal(start_date,end_date,title,description,qty,unit_price,min_price,time_restricted,stage_discount,location_restricted,shipping_included)
		values('$var_start_date','$var_end_date','$var_title','$var_description','$var_qty','$var_unit_price','$var_min_price','$var_location_restricted','$var_time_restricted','$var_stage_discount','$var_shipping_included')";
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