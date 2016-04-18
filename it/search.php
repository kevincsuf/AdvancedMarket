<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");

$message = "";

if (isset($_SESSION["uid"]))
{
    //$login = new Login($_GET['login_id'], $_GET['login_pwd']);
    //$login->check_login();
    $message = "You are currently LOGGED IN as a <b>".strtoupper($_SESSION["utype"])."</b>, the ID is <b>".$_SESSION["uid"]."</b>, the Key is <b>".$_SESSION["ukey"]."</b>, and the NAME is <b>".$_SESSION["uname"]."</b>";
}

else 
{
    $message = "You are currently <b>LOGGED OUT</b>";
}

?>

<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        
		
		<!--<div class="container"> 
		<form method="get" action="search.php" id="searchform" enctype="multipart/form-data">
		
			</br>
			<input type="text" name="user_query">
			<input type = "submit" name= "search" value="search">
		</div> -->
			  
			<?php 
			
			// collect
			if(isset($_GET['search']))
				{
					
					$output = '';
					$tmp_counter = 0;
					$acc_counter = 0;
					global $con;
					$searchq = $_GET['user_query'];
					$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);


				$var_get_query= "SELECT * FROM create_deal WHERE title LIKE '%$searchq%'";
				$var_query = mysqli_query($con,$var_get_query);
				//-count results

				$rowcount=mysqli_num_rows($var_query);
				
				 If($rowcount == 0 )
				 {
				   $output = 'There was no match!';
					
				   }
				 else 
					 { 
						 //-create while loop and loop through result set 
						 
						 echo "
							<table>
							";
							 while($var_row_deal=mysqli_fetch_array($var_query))
							 {

									$var_deal_id = $var_row_deal['deal_id']; // deal_id => 1 
									$var_deal_title = $var_row_deal['title'];
									$var_deal_description = $var_row_deal['description'];
									$var_deal_qty = $var_row_deal['qty'];
									$var_deal_unit_price = $var_row_deal['unit_price'];
									$var_deal_unit = $var_row_deal['unit'];
									$var_deal_image = $var_row_deal['deal_image'];

							$acc_counter++;

							$new_row = false;
							$end_row = false;

							if ($tmp_counter % 3 == 0) {
								$new_row = true;
								$tmp_counter = 0;
							}
							if ($tmp_counter % 3 == 2) {
								$end_row = true;
							}

							if ($new_row) {
								echo "<tr><td>";
							}

							echo "
							<div id = 'single_deal'>
								<h3> $var_deal_title </h3>
								<img src = 'images/$var_deal_image' width='200' height='200' />
								<p><h4> $$var_deal_unit_price</h4></p>
								<!-- deal_id is url variable -->
								<a href= 'details.php?deal_url_id=$var_deal_id' style='float:center;'>Details</a>
								
							</div>
							
						";
						
						if (($end_row) || ($acc_counter == $rowcount)) 
						{
							echo "</td></tr>";
						}

							$tmp_counter++;
			}

							echo "
							</table>
								";
							 
					 
				}
				}		
  
  
  ?>
		
		
		
		

</html>

