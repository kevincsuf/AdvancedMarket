<?php

require_once("./libs/core/init.php");
require_once("./libs/_incl_confirm_login.php");

$user_member_type = $_SESSION["utype"];
$user_id = $_SESSION["uid"];
$user_name = $_SESSION["uname"];
$user_key=$_SESSION["ukey"]



?>



<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>

	<body>
        <?php include "libs/_incl_navbar.php";?>
			<div class = "container">
			
            
            
		</div>
		<!-- Registeration section start -->
		<div id="contact" class="contact">
            <div class="section secondary-section">

                <div class="container">
                    <div class="title">
                        <h2>Welcome Buyer</h2>
						<p> you can see all your joined deals on this page  <p>
                        
                    </div>
                </div>


                <div class="container">

								<div class="table-responsive price-table">          
				  <table class="table price-column">
					<thead>
					  <tr>
						
						<th>Title</th>
						<th>Quantity</th>
						<th>Address</th>
						<th>State</th>
						<th>Zipcode</th>
						
					  </tr>
					</thead>
					<tbody>
					
					  <?php 
						$var_display_deal = "SELECT create_deal_id,order_quantity,address,state,zipcode FROM join_deal WHERE user_id='$user_key'";
						$var_run_display_deal = mysqli_query($con,$var_display_deal);
						
						while($var_row_display_deal = mysqli_fetch_array($var_run_display_deal))
						{
							$var_display_deal_id = $var_row_display_deal['create_deal_id'];
							$var_display_deal_qty = $var_row_display_deal['order_quantity'];
							$var_display_address = $var_row_display_deal['address'];
							$var_display_state = $var_row_display_deal['state'];
							$var_display_zipcode = $var_row_display_deal['zipcode'];
							
							echo "<tr>
							 <td> <a href= 'deal_details.php?deal_url_id=$var_display_deal_id'> $var_display_deal_id </a></td>
							 <td> $var_display_deal_qty </td>
							 <td> $var_display_address </td>
							 <td> $var_display_state </td>
							 <td> $var_display_zipcode </td>
							 
							</tr>";
						}
						?>
					
							
					
								
					</tbody>
					  	
					</table>
				 </div>
			   </div>




				</div>

            </div>
		</div>

        <?php include "libs/_incl_footer.php";?>
    </body>
</html>
