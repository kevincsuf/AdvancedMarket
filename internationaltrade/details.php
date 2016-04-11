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


// Pass form data to details_lib.php
if($_POST) {
    $_SESSION["create_deal_id"] = $_POST["deal_id"];
    $_SESSION["order_quantity"] = $_POST["quantity"];
    $_SESSION["address"] = $_POST["address"];
    $_SESSION["state"] = $_POST["state"];
    $_SESSION["zipcode"] = $_POST["zipcode"];
    $_SESSION["closure_date"] = $_POST["deal_end_date"];

    // Go to DB insert page
    echo "<script type=\"text/javascript\">window.location.replace(\"./libs/details_lib.php\");</script>";
}



// This user already placed an order for this deal?
$global_order_placed = false;

// Tha minimum quantity of this deal
$global_min_quantity = 0;

// The remaining stocks when this page is opened
$global_remaining_stocks = 0;

// The deal id
$global_deal_id = "";

// The deal end date
$global_deal_end_date = "";

// Eligible to order
$global_order_eligible = false;

?>



<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
		<!--Added header for progress bar-->
		<!--link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
		<style>
		#countdown span {
		  font-size: 27px;
		  font-weight: normal;
		  margin-left: 20px;
		  margin-right: 20px;
		  text-align: center;
		}
		</style>
	</head>

	<body>
		<?php include "libs/_incl_navbar.php";?>
		<div class = "container">
			<H1>Welcome To Our Site </H1>
            <p><font color="red">===== Login Test Message =====</font></p>
            <p><font color="red"><?php echo $message ?></font></p>
		</div>
		
		<!--Nikita April 10th Div section for countdown -->
		
		<div class = "container">
		<div id="countdown">Timestamp</div>
			

			<?php
			if(isset($_GET['deal_url_id']))
			{	
				// Get current deal id 
				$var_deal_url_id = $_GET['deal_url_id'];
				// Find out this user already placed an order for this deal
				$var_get_ukey = "SELECT * FROM join_deal WHERE create_deal_id='".$var_deal_url_id."' AND user_id='".$_SESSION["ukey"]."'";
				$var_result_ukey = mysqli_query($con, $var_get_ukey);

				if ($var_result_ukey) {
					$row_cnt = mysqli_num_rows($var_result_ukey);
					if ($row_cnt > 0) {
						$global_order_placed = true;
					}
					mysqli_free_result($var_result_ukey);
				}

				// Get detail about this deal
				
				$var_get_deal = "SELECT * FROM create_deal WHERE deal_id='".$var_deal_url_id."'";
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
					$var_deal_max_qty = $var_row_deal['max_quantity'];
					
					//this variable is used for progress bar
					$var_percent = 20;
					// Set global variable
					$global_min_quantity = $var_deal_qty;
					$global_deal_id = $var_deal_id;
					$global_deal_end_date = $var_row_deal['end_date'];
					
					// display the details of the deal
					echo "
					<div class = 'single_deal'>
						<h3> $var_deal_title </h3>
						
						<img src = 'images/$var_deal_image' width='500' height='400' />
						<p><h3> $$var_deal_unit_price</h3></p>
						<p><h5> Product Description: $var_deal_description</h5></p>
						<p><h5> Minimum order quantity: $var_deal_qty</h5></p>
						<div class='container'>
							<div class='progress'>
								<div class='progress-bar' role='progressbar' aria-valuenow='70' aria-valuemin='0' aria-valuemax='100' style='width:$var_percent%'>
								</div>
							</div>
						</div>

						<a href= 'index.php'> <button id= 'button-sp' style = 'float:left' size = 30%>Back </button> </a>
						";

                    // Hide Join button when this user joined this deal already or this user is seller
                    if (($global_order_placed) || (strtolower($_SESSION["utype"]) == "seller")) {
                        $global_order_eligible = false;
                    }
                    else {
                        $global_order_eligible = true;
                    }

                    if ($global_order_eligible) {
                        echo "
                            <a href='#' data-toggle='modal' data-target='#PostCommentsModal'> <input type='submit' id='submit' value='Join' onclick='return changeText('submitbutton')' /> </a>
                        ";
                    }
                    else if (strtolower($_SESSION["utype"]) == "seller") {
                        echo "
                            Seller can not join a deal. Please log in as a buyer.
                        ";
                    }
                    else if ($global_order_placed) {
                        echo "
                            You already joined this deal.
                        ";
                    }
                    echo "</div>";
				}

                // Get remaining stocks when this page is opened
                $order_quantity_query = "SELECT SUM(order_quantity) AS order_quantity_sum FROM join_deal where create_deal_id=".$global_deal_id;
                $order_quantity_result = mysqli_query($con, $order_quantity_query);
                $order_quantity_sum = 0;
                while($order_quantity_row = mysqli_fetch_array($order_quantity_result)) {
                    $order_quantity_sum += $order_quantity_row['order_quantity_sum'];
                }

                $deal_quantity_query = "SELECT * FROM create_deal WHERE deal_id=".$global_deal_id;
                $deal_quantity_result = mysqli_query($con, $deal_quantity_query);
                $deal_quantity_total = 0;
                while($deal_quantity_row = mysqli_fetch_array($deal_quantity_result)) {
                    $deal_quantity_total = $deal_quantity_row['max_quantity'];
                }

                $global_remaining_stocks = $deal_quantity_total - $order_quantity_sum;

			}
			?>
			</div>
						
		
		<div class = "container">
		<div class='modal fade' id='PostCommentsModal' tabindex='-1' role='dialog' aria-labelledby='helpModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                        <div class='modal-header'>
                            <h4 class='modal-title' id='myModalLabel'> Thank you for joining Enter Shipping Details</h4>
                        </div>

                        <div class='modal-body'>

                            <form name="join_form" id="join_form" method= "post" action="<?php echo $_SERVER["PHP_SELF"];?>" onSubmit="return join_validate();">

                                <input type='hidden' name='min_quantity' id='min_quantity' value='<?php echo $global_min_quantity; ?>'>
                                <input type='hidden' name='deal_id' id='deal_id' value='<?php echo $global_deal_id; ?>'>
                                <input type='hidden' name='deal_end_date' id='deal_end_date' value='<?php echo $global_deal_end_date; ?>'>

                                <div class='input-group'>
                                    <span class='input-group-addon'>@</span>
                                    <input type='text' class='form-control' name='quantity' id='quantity' placeholder='Quantity' type='number' />
                                </div>

                                <div class='input-group'>
                                    <span class='input-group-addon'>@</span>
                                    <input type='text' class='form-control' name='address' id='address' placeholder='Address' />
                                </div>

                                <div class='input-group'>
                                    <span class='input-group-addon'>@</span>
                                    <input type='text' class='form-control' name='state' id='state' placeholder='State' />
                                </div>

                                <div class='input-group'>
                                    <span class='input-group-addon'>@</span>
                                    <input type='text' class='form-control' name='zipcode' id='zipcode' placeholder='Zipcode' type='number' />
                                </div>

                                </br>

                                <button type='submit' class='btn btn-success'>Submit</button>

                            </form>

                        </div>

                        <div class='modal-footer'>
                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        </div>

                </div>
            </div>
		</div>
		</div>



        <script type="text/javascript">
            function join_validate() {
                var minQty = document.forms["join_form"]["min_quantity"].value;
                var orderQty = document.forms["join_form"]["quantity"].value;
                var addr = document.forms["join_form"]["address"].value;
                var state = document.forms["join_form"]["state"].value;
                var zip = document.forms["join_form"]["zipcode"].value;

                if (orderQty == "") {
                    alert("Please enter order quantity");
                    document.forms["join_form"]["quantity"].focus();
                    return false;
                }

                if (minQty > orderQty) {
                    alert("Order quantity must be greater than minimum order quantity");
                    document.forms["join_form"]["quantity"].focus();
                    return false;
                }

                if(orderQty%minQty != 0) {
                    alert("Order quantity must be multiplied by minimum order quantity");
                    document.forms["join_form"]["quantity"].focus();
                    return false;
                }

                if (addr == "") {
                    alert("Please enter address");
                    document.forms["join_form"]["address"].focus();
                    return false;
                }

                if (state == "") {
                    alert("Please enter sate");
                    document.forms["join_form"]["state"].focus();
                    return false;
                }

                if (zip == "") {
                    alert("Please enter zip code");
                    document.forms["join_form"]["zipcode"].focus();
                    return false;
                }

                if(zip.length != 5 ) {
                    alert("Please enter a zip in the format #####.");
                    document.forms["join_form"]["zipcode"].focus();
                    return false;
                }

                return(true);
            }
        </script>
		
		<!--Script added to display the time countdown based on end date-->
			<script>
					// set the date we're counting down to
					var target_date = new Date('<?php echo $global_deal_end_date; ?>').getTime();
					 
					// variables for time units
					var days, hours, minutes, seconds, ms_step=10;
					 
					// get tag element
					var countdown = document.getElementById('countdown');
					 
					setInterval(function () {
						var current_date = new Date().getTime();
						var seconds_left = (target_date - current_date) / 1000;
						days = parseInt(seconds_left / 86400);
						seconds_left = seconds_left % 86400;
						hours = parseInt(seconds_left / 3600);
						seconds_left = seconds_left % 3600;
						min = parseInt(seconds_left / 60);
						sec = parseInt(seconds_left % 60);
						ms = parseInt(target_date-current_date);
						 
						// format countdown string + set tag value
					   countdown.innerHTML = ''+
						  '<span class="days">'+days+'<b>Days</b></span>'+
						  '<span class="hours">'+hours+'<b>Hours</b></span>'+
						  '<span class="minutes">'+min+'<b>Minutes</b></span>'+
						  '<span class="seconds">'+sec+'<b>Seconds</b></span>';  
					// this is just for milliseconds only
					  /* countdown.innerHTML = 
						  '<span class="ms">'+ms+' ms</span>'; */
					}, ms_step);

			</script>
			

		
			<?php include "libs/_incl_footer.php";?>
	</body>

</html>


		
	   

