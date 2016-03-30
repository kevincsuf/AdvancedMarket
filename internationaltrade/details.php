<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");

$message = "";

if (isset($_SESSION["uid"])) {
    //$login = new Login($_GET['login_id'], $_GET['login_pwd']);
    //$login->check_login();
    $message = "You are currently LOGGED IN as a <b>".strtoupper($_SESSION["utype"])."</b>, the ID is <b>".$_SESSION["uid"]."</b>, and the NAME is <b>".$_SESSION["uname"]."</b>";
}
/*
if (isset($_GET['login_id']) && isset($_GET['login_pwd'])) {
    $login = new Login($_GET['login_id'], $_GET['login_pwd']);
    $login->check_login();
    $message = "You are currently LOGGED IN as a ".strtoupper($login->member_type)." and the ID is ".$login->id;
}
*/
else {
    $message = "You are currently <b>LOGGED OUT</b>";
}

?>



<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        <?php include "libs/_incl_navbar.php";?>

		<div class = "container">
			<H1>Welcome To Our Site </H1>
            <p><font color="red">===== Login Test Mesage =====</font></p>
            <p><font color="red"><?php echo $message ?></font></p>
		</div>
		
		<div class = "container">
			
			<?php 
			if(isset($_GET['deal_url_id']))
			{
				$var_deal_url_id = $_GET['deal_url_id'];
				$var_get_deal = "SELECT * FROM create_deal WHERE deal_id='$var_deal_url_id'";
				$var_run_deal = mysqli_query ($con,$var_get_deal);
				
				while($var_row_deal= mysqli_fetch_array($var_run_deal))
				{
						$var_deal_id = $var_row_deal['deal_id'];
						$var_deal_title = $var_row_deal['title'];
						$var_deal_description = $var_row_deal['description'];
						$var_deal_qty = $var_row_deal['qty'];
						$var_deal_unit_price = $var_row_deal['unit_price'];
						$var_deal_unit = $var_row_deal['unit'];
						$var_deal_image = $var_row_deal['deal_image'];
					
					echo "
					<div id = 'single_deal'>
						<h3> $var_deal_title </h3>
						<img src = 'images/$var_deal_image' width='500' height='400' />
						<p><h3> $$var_deal_unit_price</h3></p>
						<p><h5> Product Description: $var_deal_description</h5></p>
						
						
						<a href= 'index.php'> <button id= 'button-sp' style = 'float:left' size = 30%>Back </button> </a>
						
		                
						<a href='#' data-toggle='modal' data-target='#PostCommentsModal'> <input type='submit' id='submit' value='Join' onclick='return changeText('submitbutton')' /> </a>
					</div>
					
					
		
					";
				}

			}
			?>
			
		</div>
		<div class='modal fade' id='PostCommentsModal' tabindex='-1' role='dialog' aria-labelledby='helpModalLabel' aria-hidden='true'>
						<div class='modal-dialog'>      
							<div class='modal-content'>
									<div class='modal-header'>
										<h4 class='modal-title' id='myModalLabel'> Thank you for joining Enter Shipping Details</h4>
									</div>
									
									<div class='modal-body'>
								  
										<div class='input-group'>
											<span class='input-group-addon'>@</span>
											<input type='text' class='form-control' name='quantity' id='quantity' placeholder='Quantity' />
										</div>

										<div class='input-group'>
											<span class='input-group-addon'>@</span>
											<input type='text' class='form-control' name='address' placeholder='Address' />
										</div>
						
										<div class='input-group'>
											<span class='input-group-addon'>@</span>
											<input type='text' class='form-control' name='state' placeholder='State' />
										</div>
						
										<div class='input-group'>
											<span class='input-group-addon'>@</span>
											<input rows='4' cols='50' class='form-control' name='zipcode' placeholder='Zipcode'/> 
										</div>

										</br>

										<button type='button' class='btn btn-success'>Submit</button>
							
									</div>

									<div class='modal-footer'>
										<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
									</div>
							   
							</div>
						</div>
		</div>
		
	   <?php include "libs/_incl_footer.php";?>
	</body>

</html>
