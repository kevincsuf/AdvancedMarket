<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");

$message = "";

if (isset($_SESSION["uid"])) {
    $message = "You are currently LOGGED IN as a <b>".strtoupper($_SESSION["utype"])."</b>, the ID is <b>".$_SESSION["uid"]."</b>, and the NAME is <b>".$_SESSION["uname"]."</b>";
}
else {
    $message = "You are currently <b>LOGGED OUT</b>";
}

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        <?php include "libs/_incl_navbar.php";?>

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
						<img src = 'images/$var_deal_image' width='50%' height='400' />
						<div class = 'right'>
							<p><h3> $$var_deal_unit_price</h3></p>
							<p><h5> Product Description:</h5> $var_deal_description</p>
						</div>
						
						<a href= 'index.php'> <button id= 'button-sp' style = 'float:right' size = 30%>Back </button> </a>
						</div>
		                
										 
					</div>
					
					";
				}

			}
			?>
			
		</div>
		
		
	   <?php include "libs/_incl_footer.php";?>
	</body>

</html>
