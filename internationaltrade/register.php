<?php

require_once("./libs/core/init.php");
require_once("./libs/validator.php");
require_once("./libs/functions.php");

$validator = new validator();
$field_name = "";

// Set previous input value for seller
$selected_regtype_seller = "";
$seller_email_value = "";
$seller_pwd_value = "";
$seller_pwd_repeat_value = "";
$seller_first_name_value = "";
$seller_last_name_value = "";
$seller_buss_name_value = "";
$seller_addr_value = "";
$seller_mobile_number_value = "";
$selected_seller_rev_msg_yes = "";
$selected_seller_rev_msg_no = "";
$selected_seller_category_food = "";
$selected_seller_category_electronics = "";
$selected_seller_category_rawmaterial = "";
$selected_seller_category_entertainment = "";

// Set previous input value for buyer
$selected_regtype_buyer = "";
$buyer_email_value = "";
$buyer_pwd_value = "";
$buyer_pwd_repeat_value = "";
$buyer_first_name_value = "";
$buyer_last_name_value = "";
$buyer_addr_value = "";
$buyer_mobile_number_value = "";
$selected_buyer_rev_msg_yes = "";
$selected_buyer_rev_msg_no = "";
$selected_buyer_category_food = "";
$selected_buyer_category_electronics = "";
$selected_buyer_category_rawmaterial = "";
$selected_buyer_category_entertainment = "";

if($_POST) {
	/*
     * Set validator
     */

	//***** SELLER *****
	if (isset($_POST['seller_reg']) == "seller") { // When seller
		// seller_email
		$field_name = "seller_email";
		$field_display_name = "Email ID";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('email'), $field_display_name);

		// seller_pwd
		$field_name = "seller_pwd";
		$field_display_name = "Password";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('min-length', 2), $field_display_name);

		// seller_pwd_repeat
		$field_name = "seller_pwd_repeat";
		$field_display_name = "Repeat Password";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('pwd-not-match-seller'), $field_display_name);

		// seller_first_name
		$field_name = "seller_first_name";
		$field_display_name = "First Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// seller_last_name
		$field_name = "seller_last_name";
		$field_display_name = "Last Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// seller_buss_name
		$field_name = "seller_buss_name";
		$field_display_name = "Business Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

		// seller_addr
		$field_name = "seller_addr";
		$field_display_name = "Address";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

		// seller_mobile_number
		$field_name = "seller_mobile_number";
		$field_display_name = "Contact number";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);
	}
	//***** BUYER *****
	else if (isset($_POST['buyer_reg']) == "buyer") { // When buyer
		// buyer_email
		$field_name = "buyer_email";
		$field_display_name = "Email ID";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('email'), $field_display_name);

		// buyer_pwd
		$field_name = "buyer_pwd";
		$field_display_name = "Password";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('min-length', 2), $field_display_name);

		// buyer_pwd_repeat
		$field_name = "buyer_pwd_repeat";
		$field_display_name = "Repeat Password";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('pwd-not-match-buyer'), $field_display_name);

		// buyer_first_name
		$field_name = "buyer_first_name";
		$field_display_name = "First Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// buyer_last_name
		$field_name = "buyer_last_name";
		$field_display_name = "Last Name";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('letters-only'), $field_display_name);

		// buyer_addr
		$field_name = "buyer_addr";
		$field_display_name = "Address";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);

		// buyer_mobile_number
		$field_name = "buyer_mobile_number";
		$field_display_name = "Mobile Number";
		$validator->add_field($field_name);
		$validator->add_rule_to_field($field_name, array('empty'), $field_display_name);
		$validator->add_rule_to_field($field_name, array('numbers-only'), $field_display_name);
	}

	/*
     * After validation
     */

	// valid input
	if($validator-> form_valid()) {
		// When seller
		if (isset($_POST["seller_reg"]) == "seller") {
			$_SESSION["regtype"] = $_POST["seller_reg"];
			$_SESSION["seller_email"] = $_POST["seller_email"];
			$_SESSION["seller_pwd"] = $_POST["seller_pwd"];
			$_SESSION["seller_first_name"] = $_POST["seller_first_name"];
			$_SESSION["seller_last_name"] = $_POST["seller_last_name"];
			$_SESSION["seller_buss_name"] = $_POST["seller_buss_name"];
			$_SESSION["seller_addr"] = $_POST["seller_addr"];
			$_SESSION["seller_mobile_number"] = $_POST["seller_mobile_number"];
			$_SESSION["seller_rev_msg"] = $_POST["seller_rev_msg"];
			if (isset($_POST["seller_category_food"])) {
				$_SESSION["seller_category_food"] = "1";
			}
			else {
				$_SESSION["seller_category_food"] = "0";
			}
			if (isset($_POST["seller_category_electronics"])) {
				$_SESSION["seller_category_electronics"] = "1";
			}
			else {
				$_SESSION["seller_category_electronics"] = "0";
			}
			if (isset($_POST["seller_category_rawmaterial"])) {
				$_SESSION["seller_category_rawmaterial"] = "1";
			}
			else {
				$_SESSION["seller_category_rawmaterial"] = "0";
			}
			if (isset($_POST["seller_category_entertainment"])) {
				$_SESSION["seller_category_entertainment"] = "1";
			}
			else {
				$_SESSION["seller_category_entertainment"] = "0";
			}
		}
		// When buyer
		else if (isset($_POST["buyer_reg"]) == "buyer") {
			$_SESSION["regtype"] = $_POST["buyer_reg"];
			$_SESSION["buyer_email"] = $_POST["buyer_email"];
			$_SESSION["buyer_pwd"] = $_POST["buyer_pwd"];
			$_SESSION["buyer_first_name"] = $_POST["buyer_first_name"];
			$_SESSION["buyer_last_name"] = $_POST["buyer_last_name"];
			$_SESSION["buyer_addr"] = $_POST["buyer_addr"];
			$_SESSION["buyer_mobile_number"] = $_POST["buyer_mobile_number"];
			$_SESSION["buyer_rev_msg"] = $_POST["buyer_rev_msg"];
			if (isset($_POST["buyer_category_food"])) {
				$_SESSION["buyer_category_food"] = "1";
			}
			else {
				$_SESSION["buyer_category_food"] = "0";
			}
			if (isset($_POST["buyer_category_electronics"])) {
				$_SESSION["buyer_category_electronics"] = "1";
			}
			else {
				$_SESSION["buyer_category_electronics"] = "0";
			}
			if (isset($_POST["buyer_category_rawmaterial"])) {
				$_SESSION["buyer_category_rawmaterial"] = "1";
			}
			else {
				$_SESSION["buyer_category_rawmaterial"] = "0";
			}
			if (isset($_POST["buyer_category_entertainment"])) {
				$_SESSION["buyer_category_entertainment"] = "1";
			}
			else {
				$_SESSION["buyer_category_entertainment"] = "0";
			}
		}

		// Go to DB insert page
		echo "<script type=\"text/javascript\">window.location.replace(\"./libs/register_lib.php\");</script>";

	}
	// invalid input
	else {
		// When seller
		if (isset($_POST['seller_reg']) == "seller") {
			$selected_regtype_seller = "selected=\"selected\"";
			$seller_email_value = $_POST["seller_email"];
			$seller_pwd_value = $_POST["seller_pwd"];
			$seller_pwd_repeat_value = $_POST["seller_pwd_repeat"];
			$seller_first_name_value = $_POST["seller_first_name"];
			$seller_last_name_value = $_POST["seller_last_name"];
			$seller_buss_name_value = $_POST["seller_buss_name"];
			$seller_addr_value = $_POST["seller_addr"];
			$seller_mobile_number_value = $_POST["seller_mobile_number"];
			if ($_POST["seller_rev_msg"] == "yes") {
				$selected_seller_rev_msg_yes = "selected=\"selected\"";
			} else if ($_POST["seller_rev_msg"] == "No") {
				$selected_seller_rev_msg_no = "selected=\"selected\"";
			}
			if (isset($_POST["seller_category_food"])) {
				$selected_seller_category_food = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_electronics"])) {
				$selected_seller_category_electronics = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_rawmaterial"])) {
				$selected_seller_category_rawmaterial = "checked=\"checked\"";
			}
			if (isset($_POST["seller_category_entertainment"])) {
				$selected_seller_category_entertainment = "checked=\"checked\"";
			}
		}
		// When buyer
		else if (isset($_POST['buyer_reg']) == "buyer") {
			$selected_regtype_buyer = "selected=\"selected\"";
			$buyer_email_value = $_POST["buyer_email"];
			$buyer_pwd_value = $_POST["buyer_pwd"];
			$buyer_pwd_repeat_value = $_POST["buyer_pwd_repeat"];
			$buyer_first_name_value = $_POST["buyer_first_name"];
			$buyer_last_name_value = $_POST["buyer_last_name"];
			$buyer_addr_value = $_POST["buyer_addr"];
			$buyer_mobile_number_value = $_POST["buyer_mobile_number"];
			if ($_POST["buyer_rev_msg"] == "yes") {
				$selected_buyer_rev_msg_yes = "selected=\"selected\"";
			} else if ($_POST["buyer_rev_msg"] == "No") {
				$selected_buyer_rev_msg_no = "selected=\"selected\"";
			}
			if (isset($_POST["buyer_category_food"])) {
				$selected_buyer_category_food = "checked=\"checked\"";
			}
			if (isset($_POST["buyer_category_electronics"])) {
				$selected_buyer_category_electronics = "checked=\"checked\"";
			}
			if (isset($_POST["buyer_category_rawmaterial"])) {
				$selected_buyer_category_rawmaterial = "checked=\"checked\"";
			}
			if (isset($_POST["buyer_category_entertainment"])) {
				$selected_buyer_category_entertainment = "checked=\"checked\"";
			}
		}
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

        
        
        <!-- Registration section start -->
        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h2>Register With Us</h2>
                        <!-- <p>Some Info For Registerstion Goes Here</p>-->
                    </div>
                </div>
                <div class="">
                    
                    <div class="container">
                        
                            <div class="span5 contact-form centered">
                                                             
								<div class="control-group">
									<div class="controls">
										<select class="span5" id="regtype" name="regtype">
											<option value="regtype1">-Select Registeration Type-</option>
											<option value="seller" <?php echo $selected_regtype_seller ?>>Seller</option>
											<option value="buyer" <?php echo $selected_regtype_buyer ?>>Buyer</option>
										</select>
									</div>
								</div>






								<!-- Seller form -->
									
								<div class="seller_form" style="display:none;" >
									
									<form id="seller_form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

										<div class="control-group">
											<div class="controls">
												<input class="span5" type="email" name="seller_email" id="seller_email" placeholder="* Email ID here" value="<?php echo $seller_email_value;?>" required />
												<?php $validator->out_field_error('seller_email');?>
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
 												<input  class="span5" type="password" name="seller_pwd" id="seller_pwd" placeholder="* Password here" value="<?php echo $seller_pwd_value;?>" required />
												<?php $validator->out_field_error('seller_pwd');?>
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input  class="span5" type="password" name="seller_pwd_repeat" id="seller_pwd_repeat" placeholder="* Repeat Password here" value="<?php echo $seller_pwd_repeat_value;?>" required />
												<?php $validator->out_field_error('seller_pwd_repeat');?>
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" name="seller_first_name" id="seller_first_name" placeholder="* First Name..." value="<?php echo $seller_first_name_value;?>" required />
												<?php $validator->out_field_error('seller_first_name');?>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" name="seller_last_name" id="seller_last_name" placeholder="* Last Name..." value="<?php echo $seller_last_name_value;?>" required />
												<?php $validator->out_field_error('seller_last_name');?>
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" name="seller_buss_name" id="seller_buss_name" placeholder="* Business Name..." value="<?php echo $seller_buss_name_value;?>" required />
												<?php $validator->out_field_error('seller_buss_name');?>
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<textarea class="span5" name="seller_addr" id="seller_addr" placeholder="* Address..." required><?php echo htmlspecialchars($seller_addr_value, ENT_QUOTES, 'UTF-8'); ?></textarea>
												<?php $validator->out_field_error('seller_addr');?>
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" name="seller_mobile_number" id="seller_mobile_number" placeholder="* Contact no..." value="<?php echo $seller_mobile_number_value;?>" required />
												<?php $validator->out_field_error('seller_mobile_number');?>
											</div>
										</div>

										<div class="control-group">
										   <select class="span5" name="seller_rev_msg" id="seller_rev_msg">
												<option value= "seller_rev_msg">--Do you want to receive message--</option>
												<option value= "yes" <?php echo $selected_seller_rev_msg_yes ?>>Yes</option>
												<option value= "no" <?php echo $selected_seller_rev_msg_no ?>>No</option>
											</select>
										</div>
										
										<div class="control-group">
											<div class="controls">Select Category of your choice:</br>
												<input class="checkbox-inline" type="checkbox" name="seller_category_food" value="food" <?php echo $selected_seller_category_food ?> />Food products<br />
												<input class="checkbox-inline" type="checkbox" name="seller_category_electronics" value="electronics" <?php echo $selected_seller_category_electronics ?> />Electronics<br />
												<input class="checkbox-inline" type="checkbox" name="seller_category_rawmaterial" value="rawmaterial" <?php echo $selected_seller_category_rawmaterial ?> />Raw Material<br />
												<input class="checkbox-inline" type="checkbox" name="seller_category_entertainment" value="entertainment" <?php echo $selected_seller_category_entertainment ?> />Entertainment
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input type="hidden" name="seller_reg" id="seller_reg" value="seller" />
												<button id="send-mail" class="message-btn">Register</button>
											</div>
										</div>
									</form>
								</div>















								
								<!-- buyer Form Starts Here -->
								<div class="buyer_form" style="display:none;" >
									
									<form id="buyer_form" method = "post" action= "<?php echo $_SERVER["PHP_SELF"];?>">
									
                                    <div class="control-group">
                                        <div class="controls">
											<input class="span5" type="email" name="buyer_email" id="buyer_email" placeholder="* Email ID here" value="<?php echo $buyer_email_value;?>" required />
											<?php $validator->out_field_error('buyer_email');?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
											<input class="span5" type="password" name="buyer_pwd" id="buyer_pwd" placeholder="* Password here" value="<?php echo $buyer_pwd_value;?>" required />
											<?php $validator->out_field_error('buyer_pwd');?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
											<input class="span5" type="password" name="buyer_pwd_repeat" id="buyer_pwd_repeat" placeholder="* Repeat Password here" value="<?php echo $buyer_pwd_repeat_value;?>" required />
											<?php $validator->out_field_error('buyer_pwd_repeat');?>
                                        </div>
                                    </div>
									
									<div class="control-group">
                                        <div class="controls">
											<input class="span5" type="text" name="buyer_first_name" id="buyer_first_name" placeholder="* First Name..." value="<?php echo $buyer_first_name_value;?>" required />
											<?php $validator->out_field_error('buyer_first_name');?>
                                        </div>
                                    </div>
									
									<div class="control-group">
                                        <div class="controls">
											<input class="span5" type="text" name="buyer_last_name" id="buyer_last_name" placeholder="* Last Name..." value="<?php echo $buyer_last_name_value;?>" required />
											<?php $validator->out_field_error('buyer_last_name');?>
                                        </div>
                                    </div>
	
									<div class="control-group">
                                        <div class="controls">
											<textarea class="span5" name="buyer_addr" id="buyer_addr" placeholder="* Address..." required><?php echo htmlspecialchars($buyer_addr_value, ENT_QUOTES, 'UTF-8'); ?></textarea>
											<?php $validator->out_field_error('buyer_addr');?>
                                        </div>
                                    </div>
									
									<div class="control-group">
                                        <div class="controls">
											<input class="span5" type="text" name="buyer_mobile_number" id="buyer_mobile_number" placeholder="* Contact Number..." value="<?php echo $buyer_mobile_number_value;?>" required />
											<?php $validator->out_field_error('buyer_mobile_number');?>
                                        </div>
                                    </div>
									
									<div class="control-group">
                                       <select class = "span5" id = "buyer_rev_msg" name="buyer_rev_msg">
										   <option value= "buyer_rev_msg">--Do you want to receive message--</option>
										   <option value= "yes" <?php echo $selected_buyer_rev_msg_yes ?>>Yes</option>
										   <option value= "no" <?php echo $selected_buyer_rev_msg_no ?>>No</option>
										</select>
                                    </div>
									
									<div class="control-group">
										<div class="controls">Select Category of your choice:</br>
										<?php //getcategory();?>
											<input class="checkbox-inline" type="checkbox" name="buyer_category_food" value="food" <?php echo $selected_buyer_category_food ?> />Food products<br />
											<input class="checkbox-inline" type="checkbox" name="buyer_category_electronics" value="electronics" <?php echo $selected_buyer_category_electronics ?> />Electronics<br />
											<input class="checkbox-inline" type="checkbox" name="buyer_category_rawmaterial" value="rawmaterial" <?php echo $selected_buyer_category_rawmaterial ?> />Raw Material<br />
											<input class="checkbox-inline" type="checkbox" name="buyer_category_entertainment" value="entertainment" <?php echo $selected_buyer_category_entertainment ?> />Entertainment
										
										</div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
											<input type="hidden" name="buyer_reg" id="buyer_reg" value="buyer" />
                                            <button id="send-mail" class="message-btn">Register</button>
                                        </div>
                                    </div>
                                </form>
								</div>				
								<!-- End buyer Form -->
                            </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>© Copyrights Advanced Market <p>
        </div>
        <!-- Footer section end -->

        <!-- Include javascript -->
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
		$("[name='regtype']").change(function()
		{ 
			<!--alert($(this).val());-->
			if($(this).val() == "seller" )
			{
				$('.buyer_form').slideUp();
				$('.seller_form').slideDown();
			}
			else if($(this).val() == "buyer" )
			{
				 $('.seller_form').slideUp();
				 $('.buyer_form').slideDown();
			}
			else if($(this).val() == "regtype1" )
			{
				$('.buyer_form').slideUp();
				$('.seller_form').slideUp();
			}
		});

		$("[name='regtype']").change(function()
		{
			<!--alert($(this).val());-->
			if($(this).val() == "seller" )
			{
				$('.buyer_form').slideUp();
				$('.seller_form').slideDown();
			}
			else if($(this).val() == "buyer" )
			{
				$('.seller_form').slideUp();
				$('.buyer_form').slideDown();
			}
			else if($(this).val() == "regtype1" )
			{
				$('.buyer_form').slideUp();
				$('.seller_form').slideUp();
			}
			}).change();

		</script>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>