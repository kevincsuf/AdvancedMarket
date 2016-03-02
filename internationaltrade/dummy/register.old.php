<!-- Author: Nikita
	Date: 22/02/2016 */ -->
<?php if (empty($_POST) === false)
//include 'php/function.php';
{
	$errors = array();
	$mandatory_fields = array ('email', 'password','retype_password','first_name','business_name','address','phone_number');
	foreach($_POST as $key=> $value)	
	{
	 if (empty($value) && in_array($key, $mandatory_fields)=== true)
		{  	
			$errors[] = "Fields marked with * are mandatory";
			echo "<script type='text/javascript'>\n";
			echo "alert('you must enter $key is missing');\n"; 
			echo " </script>";
			//echo "fields marked in * is mandatory";
			break 1;
		}	
	}
	//	if (empty($errors) == true)
	//{
		//if (user_exists($_POST['username']) == true
		//{
			//$errors[]= 'Sorry, username already exist'
		//}
	//}
	print_r($errors);
}

?>
	
<title>Register</title>
<style type="text/css">
	body { background: #b7b7c0;}
</style>
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
	
