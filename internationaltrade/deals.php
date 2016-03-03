<?php

	require_once("libs/validator.php");
	$validator = new validator();

	if($_POST)
	{
		$validator-> add_field('title');
		$validator-> add_rule_to_field('title', array('min-length',2));
		$validator-> add_rule_to_field('title', array('empty'));

		if($validator-> form_valid())
		{
			//redirect to Home page
			echo "<script type='text/javascript'>\n";
			echo "alert('Successfully Submitted');\n";
			echo " </script>";
			echo "valid Submission";
			exit();
		}
	}
?>

<html>

    <head>
        <title>Advanced Marketing</title>
        <?php include "_incl_header.php";?>
    </head>

    <head>
        <title>Advanced Marketing</title>
        <?php include "_incl_header.php";?>

		<script type="text/javascript">
    		$('select[name=time_restricted]').change(function () {
        		if ($(this).val() == 'Yes') {
        			$('#time_restricted_yes').show();
        		} else {
        			$('#time_restricted_yes').hide();
        		}
    		});
		</script>
    </head>

    <body>
        <?php include "_incl_navbar.php";?>

		<!-- Create Deal section starts here -->
		<div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h2>Welcome post your new deal</h2>
                        <!-- <p>Some Info For Deal Goes Here</p>-->
                    </div>
                </div>

				<div class="container">

					<div class="span5 contact-form centered">

						<form id="deals_form" method= "post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

							<div class="control-group">
								<div class="controls">
									<input class="span5" type="text" id="title" name="title" placeholder="* Title here..." />
									<?php $validator-> out_field_error('title');?>
								</div>

							</div>

							<div class="control-group">
								<div class="controls">
									<input  class="span5" type="text" name="description" id="description" placeholder="* Description here" />
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<input  class="span5" type="number" name="number" id="qty" placeholder="* Maximum Quantity" />
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<input class="span5" type="text" id="unit_price" name="unit_price" placeholder="* Enter actual price..." />

								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<input  class="span5" type="text" name="min_price" id="min_price" placeholder="* Discounted Price" />
								</div>
							</div>


							<div class="control-group">
								<div class="controls">
									<select class = "span5" id = "time_restricted" name="time_restricted">
										<option value= "time_restricted">--Time Restricted--</option>
										<option value= "Yes">Yes</option>
										<option value= "No">No</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<div class = "controls" id =  "time_restricted_yes" style = "display:none;">
									<!-- add code for time restrcted option yes-->
									<input class="span5" type="text" id="start_date" name="start_date" placeholder="* Enter start date MM/DD/YY" size = "20"/>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<select class = "span5" id = "location_restricted" name="location_restricted">
										<option value= "location_restricted">--Location Restricted--</option>
										<option value= "Yes">Yes</option>
										<option value= "No">No</option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<select class = "span5" id = "shiping_included" name="shiping_included">
										<option value= "shiping_included">--Shipping Included--</option>
										<option value= "Yes">Yes</option>
										<option value= "No">No</option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<input type="file" name="datafile" size="40">
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<button id="send-mail" class="message-btn">Submit</button>
								</div>
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>
			<!-- Contact section edn -->
        <?php include "_incl_footer.php";?>
    </body>
</html>
