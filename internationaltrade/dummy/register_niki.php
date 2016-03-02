<?php
	
	require_once("libs/validator.php");
	$validator = new validator();
	
	if($_POST)
	{
		$validator-> add_field('first_name');
		$validator-> add_rule_to_field('first_name', array('min-length',2));
		$validator-> add_rule_to_field('first_name', array('empty'));
		
		if($validator-> form_valid())
		{
			//redirect to Home page
			echo "<script type='text/javascript'>\n";
			echo "alert('Successfully Submitted');\n"; 
			echo " </script>";
			exit();
		}
	}
?>
<html>

<title>Register</title>

<b>  User Info</b>	
<form action= "" method= "post">
	<ul>
		<li> 
		Email*: <br>
		<input type = "text" name = "email"> 
		</li>
		<li> 
		Password*: <br>
		<input type = "password" name = "password"> 
		</li>
		<li> 
		Retype Password*: <br>
		<input type = "password" name = "retype_password"> 
		</li>
		<li> 
		First Name*: <br>
		<input type = "text" name = "first_name"> 
		</li>
		<?php $validator-> out_field_error('first_name');?>
		<li> 
		Last Name: <br>
		<input type = "text" name = "last_name"> 
		</li>
		<li>
		Business Name*: <br>
		<input type = "text" name = "business_name"> 
		</li>		
		<li> 
		Address*: <br>
		<input type = "text" name = "address"> 
		</li>
		<li> 
		Phone number*: <br>
		<input type = "text" name = "phone_number"> 
		</li>
		
		<aside>
		Category: <br>
		<input type="checkbox" name="category" value="food">Food products<br>
		<input type="checkbox" name="category" value="electronics">Electronics <br>
		<input type="checkbox" name="category" value="rawmaterial">Raw Material<br>
		<input type="checkbox" name="category" value="entertainment ">Entertainment <br>
		
		</aside>
		<br>
		<input type = "submit" value = "Register"> 
		
		</ul>		
	</form>
	</html>
