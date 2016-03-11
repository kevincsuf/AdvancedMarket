<?php
// modified on 03/09/2016 date field and removed quantity 1 option

require_once("./libs/core/init.php");
require_once("./libs/validator.php");
require_once("./libs/_incl_confirm_login.php");

$validator = new validator();
$field_name = "";

// Set previous input value for a deal
$title_value = "";
$description_value = "";
$qty_value = "";
$unit_price_value = "";

$selected_unit_tickets = "";
$selected_unit_bags = "";
$selected_unit_bottles = "";
$selected_unit_vpack = "";
$selected_unit_kg = "";
$selected_unit_lb = "";
$selected_unit_pallet = "";
$selected_unit_case = "";
$selected_unit_other = "";

$uother_value = "";

$selected_number_discount_option_1 = "";
$selected_number_discount_option_2 = "";
$selected_number_discount_option_3 = "";

$number_discount_1_value = "";
$amount_discount_1_value = "";
$number_discount_2_value = "";
$amount_discount_2_value = "";
$number_discount_3_value = "";
$amount_discount_3_value = "";

$selected_time_restricted_no = "";
$selected_time_restricted_yes = "";

$start_date_value = "";
$end_date_value = "";

$selected_location_restricted_no = "";
$selected_location_restricted_yes = "";

$location_description_value = "";

$selected_shipping_included_no = "";
$selected_shipping_included_yes = "";

$shipping_description_value = "";


if($_POST) {
    /*
     * Set validator
     */

    // title
    $field_name = "title";
    $field_display_name = "Title";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

    // description
    $field_name = "description";
    $field_display_name = "Description";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

    // qty
    $field_name = "qty";
    $field_display_name = "Minimum Quantity per order";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

    // unit_price
    $field_name = "unit_price";
    $field_display_name = "Regular price";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);

    // uother
    if ($_POST["unit"] == "other") {
        $field_name = "uother";
        $field_display_name = "Other unit";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    }

    // number_discount_1
    $field_name = "number_discount_1";
    $field_display_name = "First quantity";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

    // amount_discount_1
    $field_name = "amount_discount_1";
    $field_display_name = "First price";
    $validator->add_field($field_name);
    $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);

    // discount_2
    if ($_POST["number_discount_option"] == "2" || $_POST["number_discount_option"] == "3") {
        // number_discount_2
        $field_name = "number_discount_2";
        $field_display_name = "Second quantity";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

        // amount_discount_2
        $field_name = "amount_discount_2";
        $field_display_name = "Second price";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);
    }

    // discount_3
    if ($_POST["number_discount_option"] == "3") {
        // number_discount_3
        $field_name = "number_discount_3";
        $field_display_name = "Third quantity";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);

        // amount_discount_3
        $field_name = "amount_discount_3";
        $field_display_name = "Third price";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('price-only'), $field_display_name);
    }

    // time_restricted
    if ($_POST["time_restricted"] == "yes") {
        // start_date
        $field_name = "start_date";
        $field_display_name = "Start Date";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('date-only'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('no-past-date'), $field_display_name);

        // end_date
        $field_name = "end_date";
        $field_display_name = "End Date";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('date-only'), $field_display_name);
        $validator->add_rule_to_field($field_name, array('future-date-only'), $field_display_name);
    }

    // location_restricted
    if ($_POST["location_restricted"] == "yes") {
        // location_description
        $field_name = "location_description";
        $field_display_name = "Location description";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    }

    // shipping_included
    if ($_POST["shipping_included"] == "yes") {
        // shipping_description
        $field_name = "shipping_description";
        $field_display_name = "Shipping description";
        $validator->add_field($field_name);
        $validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
    }

    /*
     * After validation
     */

    // valid input
    if($validator-> form_valid()) {
        $_SESSION["title"] = $_POST["title"];
        $_SESSION["description"] = $_POST["description"];
        $_SESSION["qty"] = $_POST["qty"];
        $_SESSION["unit_price"] = $_POST["unit_price"];
        $_SESSION["unit"] = $_POST["unit"];
        if ($_POST["unit"] == "other") {
            $_SESSION["uother"] = $_POST["uother"];
        }
        else {
            $_SESSION["uother"] = "";
        }
        $_SESSION["number_discount_option"] = $_POST["number_discount_option"];
        if ($_POST["number_discount_option"] == "1") {
            $_SESSION["number_discount_1"] = $_POST["number_discount_1"];
            $_SESSION["amount_discount_1"] = $_POST["amount_discount_1"];
            $_SESSION["number_discount_2"] = "";
            $_SESSION["amount_discount_2"] = "";
            $_SESSION["number_discount_3"] = "";
            $_SESSION["amount_discount_3"] = "";
        }
        else if ($_POST["number_discount_option"] == "2") {
            $_SESSION["number_discount_1"] = $_POST["number_discount_1"];
            $_SESSION["amount_discount_1"] = $_POST["amount_discount_1"];
            $_SESSION["number_discount_2"] = $_POST["number_discount_2"];
            $_SESSION["amount_discount_2"] = $_POST["amount_discount_2"];
            $_SESSION["number_discount_3"] = "";
            $_SESSION["amount_discount_3"] = "";
        }
        else if ($_POST["number_discount_option"] == "3") {
            $_SESSION["number_discount_1"] = $_POST["number_discount_1"];
            $_SESSION["amount_discount_1"] = $_POST["amount_discount_1"];
            $_SESSION["number_discount_2"] = $_POST["number_discount_2"];
            $_SESSION["amount_discount_2"] = $_POST["amount_discount_2"];
            $_SESSION["number_discount_3"] = $_POST["number_discount_3"];
            $_SESSION["amount_discount_3"] = $_POST["amount_discount_3"];
        }
        else { // in case
            $_SESSION["number_discount_1"] = "";
            $_SESSION["amount_discount_1"] = "";
            $_SESSION["number_discount_2"] = "";
            $_SESSION["amount_discount_2"] = "";
            $_SESSION["number_discount_3"] = "";
            $_SESSION["amount_discount_3"] = "";
        }
        $_SESSION["time_restricted"] = $_POST["time_restricted"];
        if ($_POST["time_restricted"] == "yes") {
            $_SESSION["start_date"] = $_POST["start_date"];
            $_SESSION["end_date"] = $_POST["end_date"];
        }
        else {
            $_SESSION["start_date"] = "";
            $_SESSION["end_date"] = "";
        }
        $_SESSION["location_restricted"] = $_POST["location_restricted"];
        if ($_POST["location_restricted"] == "yes") {
            $_SESSION["location_description"] = $_POST["location_description"];
        }
        else {
            $_SESSION["location_description"] = "";
        }
        $_SESSION["shipping_included"] = $_POST["shipping_included"];
        if ($_POST["shipping_included"] == "yes") {
            $_SESSION["shipping_description"] = $_POST["shipping_description"];
        }
        else {
            $_SESSION["shipping_description"] = "";
        }
        if (isset($_FILES["datafile"]["name"])) {
            $_SESSION["datafile"] = basename($_FILES["datafile"]["name"]); // need to be improved later
        }
        else {
            $_SESSION["datafile"] = "";
        }

        // Go to DB insert page
        echo "<script type=\"text/javascript\">window.location.replace(\"./libs/deal_lib.php\");</script>";

    }
    // invalid input
    else {
        $title_value = $_POST["title"];
        $description_value = $_POST["description"];
        $qty_value = $_POST["qty"];
        $unit_price_value = $_POST["unit_price"];

        switch ($_POST["unit"]) {
            case "tickets":
                $selected_unit_tickets = "selected=\"selected\"";
                break;

            case "bags":
                $selected_unit_bags = "selected=\"selected\"";
                break;

            case "bottles":
                $selected_unit_bottles = "selected=\"selected\"";
                break;

            case "vpack":
                $selected_unit_vpack = "selected=\"selected\"";
                break;

            case "kg":
                $selected_unit_kg = "selected=\"selected\"";
                break;

            case "lb":
                $selected_unit_lb = "selected=\"selected\"";
                break;

            case "pallet":
                    $selected_unit_pallet = "selected=\"selected\"";
                break;

            case "case":
                $selected_unit_case = "selected=\"selected\"";
                break;

            case "other":
                $selected_unit_other = "selected=\"selected\"";
                break;
        }

        $uother_value = $_POST["uother"];

        switch ($_POST["number_discount_option"]) {
            case "1":
                $selected_number_discount_option_1 = "selected=\"selected\"";
                break;

            case "2":
                $selected_number_discount_option_2 = "selected=\"selected\"";
                break;

            case "3":
                $selected_number_discount_option_3 = "selected=\"selected\"";
                break;
        }

        $number_discount_1_value = $_POST["number_discount_1"];
        $amount_discount_1_value = $_POST["amount_discount_1"];
        $number_discount_2_value = $_POST["number_discount_2"];
        $amount_discount_2_value = $_POST["amount_discount_2"];
        $number_discount_3_value = $_POST["number_discount_3"];
        $amount_discount_3_value = $_POST["amount_discount_3"];

        switch ($_POST["time_restricted"]) {
            case "no":
                $selected_time_restricted_no = "selected=\"selected\"";
                break;

            case "yes":
                $selected_time_restricted_yes = "selected=\"selected\"";
                break;
        }

        $start_date_value = $_POST["start_date"];
        $end_date_value = $_POST["end_date"];

        switch ($_POST["location_restricted"]) {
            case "no":
                $selected_location_restricted_no = "selected=\"selected\"";
                break;

            case "yes":
                $selected_location_restricted_yes = "selected=\"selected\"";
                break;
        }

        $location_description_value = $_POST["location_description"];

        switch ($_POST["shipping_included"]) {
            case "no":
                $selected_shipping_included_no = "selected=\"selected\"";
                break;

            case "yes":
                $selected_shipping_included_yes = "selected=\"selected\"";
                break;
        }

        $shipping_description_value = $_POST["shipping_description"];
    }
}

?>










<html>
    
    <head>
        <title>Advanced Marketing</title>
        <?php include "libs/_incl_header.php";?>
    </head>
    
    <body>
        <?php include "libs/_incl_navbar.php";?>
		
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
										
						<form id="deals_form" method= "post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
						
							<div class="control-group">
								<div class="controls">
									<input class="span5" type="text" id="title" name="title" placeholder="* Title here..." value="<?php echo $title_value;?>" required />
                                    <?php $validator->out_field_error('title');?>
								</div>
								
							</div>
							
							<div class="control-group">
								<div class="controls">
									<input  class="span5" type="text" name="description" id="description" placeholder="* Description here" value="<?php echo $description_value;?>" required />
                                    <?php $validator->out_field_error('description');?>
								</div>
							</div>
							
							
							<div class="control-group">
								<div class="controls">
									<input  class="span5" type="text" name="qty" id="qty" placeholder="* Minimum Quantity per order" value="<?php echo $qty_value;?>" required />
                                    <?php $validator->out_field_error('qty');?>
										
										<!--<input class = "span5" type="text" name= "unit"id = "unit" placeholder= "* Please Choose the unit"> -->
										<!--<option>---Unit--</option>
										<select name="unit">
										<!--<option value= "Stage_Discount">Unit</option>-->
										<!--<option value= "Tickets">Tickets</option>
										<option value= "Bags">Bags</option>
										<option value= "Bottles">Bottles</option>										
										<option value= "vpack">Value_Pack</option>
										<option value= "kg">Kg</option>
										<option value= "lb">Lb</option>
										<option value= "pallet">Pallet</option>
										<option value= "case">Cases</option>										
										<option value= "other">Others</option>
									</select> -->
									<input class="span5" type="text" id="unit_price" name="unit_price" placeholder="* Enter regular price..." value="<?php echo $unit_price_value;?>" required />
                                    <?php $validator->out_field_error('unit_price');?>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
								<label>Unit 
									<select class = "span5" id = "unit" name="unit"> 
										<option value= "tickets" <?php echo $selected_unit_tickets ?>>Tickets</option>
										<option value= "bags" <?php echo $selected_unit_bags ?>>Bags</option>
										<option value= "bottles" <?php echo $selected_unit_bottles ?>>Bottles</option>
										<option value= "vpack" <?php echo $selected_unit_vpack ?>>Value_Pack</option>
										<option value= "kg" <?php echo $selected_unit_kg ?>>Kg</option>
										<option value= "lb" <?php echo $selected_unit_lb ?>>Lb</option>
										<option value= "pallet" <?php echo $selected_unit_pallet ?>>Pallet</option>
										<option value= "case" <?php echo $selected_unit_case ?>>Cases</option>
										<option value= "other" <?php echo $selected_unit_other ?>>Others</option>
									</select>
								</label>
							</div>

							<div class="control-group">
								<div class = "controls" id =  "unit_other" style = "display:none;">
									<!-- add code for unit option other -->
									<input class="span5" type="text" id="uother" name="uother" placeholder="* Enter the Unit" size = "20" value="<?php echo $uother_value;?>" />
                                    <?php $validator->out_field_error('uother');?>
								</div>
							</div>
							
							<div class="control-group">	
								<label>
									# of Discount Option     
									<select class = "span5" id = "number_discount_option" name="number_discount_option">
										<!--<option value= "0">* # of Discount Option </option>									-->
										<option value= "1" <?php echo $selected_number_discount_option_1 ?>>1</option>
										<option value= "2" <?php echo $selected_number_discount_option_2 ?>>2</option>
										<option value= "3" <?php echo $selected_number_discount_option_3 ?>>3</option>
									</select>
								</label>
							</div>
							
								<!--div class = "controls" id =  "number_discount_option_1" style = "display:none;"-->
                                <div class = "controls" id =  "number_discount_option_1">
									<input class="span5" type="text" id="number_discount_1" name="number_discount_1" placeholder="* Enter first quantity" size = "20" value="<?php echo $number_discount_1_value;?>" required />
                                    <?php $validator->out_field_error('number_discount_1');?>
									<input class="span5" type="text" id="amount_discount_1" name="amount_discount_1" placeholder="* Enter first price $ ..." size = "20" value="<?php echo $amount_discount_1_value;?>" required />
                                    <?php $validator->out_field_error('amount_discount_1');?>
								</div> 
	
								<div class = "controls" id =  "number_discount_option_2" style = "display:none;">
									<!-- add code for number_discount_option_2 -->
									<input class="span5" type="text" id="number_discount_2" name="number_discount_2" placeholder="* Enter second quantity" size = "20" value="<?php echo $number_discount_2_value;?>" />
                                    <?php $validator->out_field_error('number_discount_2');?>
									<input class="span5" type="text" id="amount_discount_2" name="amount_discount_2" placeholder="* Enter second price $ ..." size = "20" value="<?php echo $amount_discount_2_value;?>" />
                                    <?php $validator->out_field_error('amount_discount_2');?>
								</div>

								<div class = "controls" id =  "number_discount_option_3" style = "display:none;">
									<!-- add code for number_discount_option_3 -->
									<input class="span5" type="text" id="number_discount_3" name="number_discount_3" placeholder="* Enter third quantity" size = "20" value="<?php echo $number_discount_3_value;?>" />
                                    <?php $validator->out_field_error('number_discount_3');?>
									<input class="span5" type="text" id="amount_discount_3" name="amount_discount_3" placeholder="* Enter third price $ ..." size = "20" value="<?php echo $amount_discount_3_value;?>" />
                                    <?php $validator->out_field_error('amount_discount_3');?>
								</div>

							<div class="control-group">			
								<div class="controls">
								<label>Time Restricted
									<select class = "span5" id = "time_restricted" name="time_restricted"> 
									<!--	<option value= "time_restricted">-Time Restricted-</option>-->
										<option value= "no" <?php echo $selected_time_restricted_no ?>>No</option>
										<option value= "yes" <?php echo $selected_time_restricted_yes ?>>Yes</option>
									</select>
								</label>

								</div>
							</div>

							<div class="control-group">
								<div class = "controls" id =  "time_restricted_yes" style = "display:none;">
									<!-- add code for time restrcted option yes-->
									<input class="span5" type="text" id="start_date" name="start_date" placeholder="* Enter start date MM/DD/YYYY" size = "20" value="<?php echo $start_date_value;?>" />
                                    <?php $validator->out_field_error('start_date');?>
                                    <input class="span5" type="text" id="end_date" name="end_date" placeholder="* Enter end date MM/DD/YYYY" size = "20" value="<?php echo $end_date_value;?>" />
                                    <?php $validator->out_field_error('end_date');?>
								</div>
							</div>
							
							<div class="control-group">			
								<div class="controls">
								<label>Location Restricted 
									<select class = "span5" id = "location_restricted" name="location_restricted"> 
										<!--<option value= "location_restricted">-Location Restricted-</option>-->
                                        <option value= "no" <?php echo $selected_location_restricted_no ?>>No</option>
                                        <option value= "yes" <?php echo $selected_location_restricted_yes ?>>Yes</option>
									</select>
								</label>
							</div>

							<div class="control-group">	
								<div class = "controls" id =  "location_restricted_yes" style = "display:none;">
									<!-- add code for location restricted option yes-->
									<input class="span5" type="text" id="location_description" name="location_description" placeholder="* Describe location restriction" size = "20" value="<?php echo $location_description_value;?>" />
                                    <?php $validator->out_field_error('location_description');?>
								</div>
							</div>							
							

							<div class="control-group">	
								<label>Shipping Included 
									<select class = "span5" id = "shipping_included" name="shipping_included"> 
									<!--	<option value= "shipping_included">-Shipping Included-</option>-->
                                        <option value= "no" <?php echo $selected_shipping_included_no ?>>No</option>
                                        <option value= "yes" <?php echo $selected_shipping_included_yes ?>>Yes</option>
									</select>
								</label>
								</div>
							</div>
							
							<div class="control-group">	
								<div class = "controls" id = "shipping_included_yes" style = "display:none;">
									<!-- add code for shipping included option yes-->
									<input class="span5" type="text" id="shipping_description" name="shipping_description" placeholder="* Enter shipping cost" size = "20" value="<?php echo $shipping_description_value;?>" />
                                    <?php $validator->out_field_error('shipping_description');?>
								</div>
							</div>							
														
							
							
							<div class="control-group">			
								
							</div>
							
							<div class="control-group">			
								<div class="controls">
									<input type="file" name="datafile" size="40" >
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
        <?php include "libs/_incl_footer.php";?>



        <!-- ScrollUp button start -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
      
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
		
		<script type="text/javascript">
		$('select[name=unit]').change(function () {
            if ($(this).val() == 'other') {
                $('#unit_other').show();
            } else {
                $('#unit_other').hide();
            }
		});		

		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '1') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_1').hide();
            }
		});

		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '2') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_2').hide();
            }
		});

		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '3') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').show();
            } else {
                $('#number_discount_option_3').hide();
            }
		});
		
		$('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '0') {
                $('#number_discount_option_1').hide();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            }
		});

        $('select[name=time_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#time_restricted_yes').show();
            } else {
                $('#time_restricted_yes').hide();
            }
        });
		
		$('select[name=location_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#location_restricted_yes').show();
            } else {
                $('#location_restricted_yes').hide();
            }
		});

		$('select[name=shipping_included]').change(function () {
            if ($(this).val() == 'yes') {
                $('#shipping_included_yes').show();
            } else {
                $('#shipping_included_yes').hide();
            }
		});

        // Followings are when returning to fill out page after submit due to error
        $('select[name=unit]').change(function () {
            if ($(this).val() == 'other') {
                $('#unit_other').show();
            } else {
                $('#unit_other').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '1') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_1').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '2') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').hide();
            } else {
                $('#number_discount_option_2').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '3') {
                $('#number_discount_option_1').show();
                $('#number_discount_option_2').show();
                $('#number_discount_option_3').show();
            } else {
                $('#number_discount_option_3').hide();
            }
        }).change();

        $('select[name=number_discount_option]').change(function () {
            if ($(this).val() == '0') {
                $('#number_discount_option_1').hide();
                $('#number_discount_option_2').hide();
                $('#number_discount_option_3').hide();
            }
        }).change();

        $('select[name=time_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#time_restricted_yes').show();
            } else {
                $('#time_restricted_yes').hide();
            }
        }).change();

        $('select[name=location_restricted]').change(function () {
            if ($(this).val() == 'yes') {
                $('#location_restricted_yes').show();
            } else {
                $('#location_restricted_yes').hide();
            }
        }).change();

        $('select[name=shipping_included]').change(function () {
            if ($(this).val() == 'yes') {
                $('#shipping_included_yes').show();
            } else {
                $('#shipping_included_yes').hide();
            }
        }).change();

        </script>

        <script type="text/javascript" src="js/app.js"></script>

		
		

    </body>
</html>