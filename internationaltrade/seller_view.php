<?php

require_once("./libs/core/init.php");
require_once("./libs/_incl_confirm_login.php");

$user_member_type = $_SESSION["utype"];
$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];

?>



<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        <?php include "libs/_incl_navbar.php";?>

		<!-- Registeration section start -->
		<div id="contact" class="contact">
            <div class="section secondary-section">

                <div class="container">
                    <div class="title">
                        <h2>Welcome Seller</h2>
						<p> This page allows you to add and view deals <p>
                        <!-- <p>Some Info For Registerstion Goes Here</p>-->
                    </div>
                </div>

			</div>
               <div class="container">
				<div class="table-responsive">          
				  <table class="table">
					<thead>
					  <tr>
						
						<th>Title</th>
						<th>Description</th>
						<th>Quantity 1</th>
						<th>Price</th>
						<th>Quantity 2</th>
						<th>Price</th>
						<th>Quantity 3</th>
						<th>Price</th>
						<th>Joined</th>
					  </tr>
					</thead>
					<tbody>
					
					  <?php 
						$var_display_deal = "SELECT title,description,number_discount_1,amount_discount_1,number_discount_2,amount_discount_2,number_discount_3,amount_discount_3 FROM create_deal WHERE user_name='$user_id'";
						$var_run_display_deal = mysqli_query($con,$var_display_deal);
						
						while($var_row_display_deal = mysqli_fetch_array($var_run_display_deal))
						{
							$var_display_deal_title = $var_row_display_deal['title'];
							$var_display_deal_description = $var_row_display_deal['description'];
							$var_display_deal_qty_1 = $var_row_display_deal['number_discount_1'];
							$var_display_deal_qty_2 = $var_row_display_deal['number_discount_2'];
							$var_display_deal_qty_3 = $var_row_display_deal['number_discount_3'];
							$var_display_deal_price_1 = $var_row_display_deal['amount_discount_1'];
							$var_display_deal_price_2 = $var_row_display_deal['amount_discount_2'];
							$var_display_deal_price_3 = $var_row_display_deal['amount_discount_3'];
							echo "<tr>
							 <td> $var_display_deal_title</td>
							 <td> $var_display_deal_description </td>
							 <td> $var_display_deal_qty_1 </td>
							 <td> $var_display_deal_price_1 </td>
							 <td> $var_display_deal_qty_2 </td>
							 <td> $var_display_deal_price_2 </td>
							 <td> $var_display_deal_qty_3 </td>
							 <td> $var_display_deal_price_3 </td>
							</tr>";
						}
						?>
					
							
					
								
					</tbody>
					  	
					</table>
				 </div>
			   </div>
			 
		</div>

        <?php include "libs/_incl_footer.php";?>
    </body>
</html>
