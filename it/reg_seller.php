<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");
require_once("./libs/validator.php");

if($_POST) {
    require_once("./libs/login_lib.php");

    $login = new Login($_POST['login_id'],md5($_POST['login_pwd']));

    // login form check
    if(isset($_POST['login_exe']) == "login") {
        if (!$_POST['login_id'])
            $login->error("Check ID!");
        else {
            if (!$_POST['login_pwd'])
                $login->error("Check password!");
            else {
                if (!$login->check_login())
                    $login->error("Check ID or password!");
                else {
                    $message = "Logged in as a ".$login->member_type;
                    $login->warning($message);

                    $_SESSION["ukey"] = $login->user_key;
                    $_SESSION["uid"] = $login->id;
                    $_SESSION["uname"] = $login->name;
                    $_SESSION["utype"] = $login->member_type;

                    // Go to the first page of Seller
                    if ($login->member_type == "seller") {
                        $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./seller_view.php\");</script>";
                        echo $echo_html;
                    }
                    else if ($login->member_type == "buyer") {
                        $echo_html = "<script type=\"text/javascript\">window.location.replace(\"./buyer_view.php\");</script>";
                        echo $echo_html;
                    }
                }
            }
        }
    }
}

$message = "";

if (isset($_SESSION["uid"])) {
    //$login = new Login($_GET['login_id'], $_GET['login_pwd']);
    //$login->check_login();
    $message = "You are currently LOGGED IN as a <b>".strtoupper($_SESSION["utype"])."</b>, the ID is <b>".$_SESSION["uid"]."</b>, the Key is <b>".$_SESSION["ukey"]."</b>, and the NAME is <b>".$_SESSION["uname"]."</b>";
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
<?php


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
$selected_seller_category_other = "";

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
$selected_buyer_category_other = "";

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
			if (isset($_POST["seller_category_other"])) {
				$_SESSION["seller_category_other"] = "1";
			}
			else {
				$_SESSION["seller_category_other"] = "0";
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
			if (isset($_POST["buyer_category_other"])) {
				$_SESSION["buyer_category_other"] = "1";
			}
			else {
				$_SESSION["buyer_category_other"] = "0";
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
			if (isset($_POST["seller_category_other"])) {
				$selected_seller_category_other = "checked=\"checked\"";
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
			if (isset($_POST["buyer_category_other"])) {
				$selected_buyer_category_other = "checked=\"checked\"";
			}
		}
	}
}
?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from event-theme.com/themes/goshophtml/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:30:32 GMT -->
<head>
        <?php include "libs/_incl_header.php";?>    
    </head>

    <body class="home page">

        <!-- HEADER -->
        <header id="masthead" class="clearfix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
            <div class="site-subheader site-header">
                <div class="container theme-container">
                    <!-- Language & Currency Switcher -->
                    <!-- Mini Cart -->
                    <ul class="pull-right list-unstyled list-inline">
                        <!-- To Display User name if logged in -->
                        <?php
						echo"<li class='menu-item'>";
							
								if (isset($_SESSION["uid"])) 
									{
									echo"<a href='profile.php'> Hi, ".$_SESSION['uname']."</a>";
									}
								else
									{
									
									}
							
                        echo"</li>";
						?>
						<!-- To Display Sign up if not logged in -->
						<?php
								if (isset($_SESSION["uid"])) 
									{
									
									}
								else
									{
										echo"<li class='nav-dropdown'>";
											echo"<a href='#'>Signup</a>";
												echo"<ul class='nav-dropdown-inner list-unstyled accnt-list'>";
													echo"<li> <a href='reg_buyer.php'> Buyer</a></li>";                                              
													echo"<li> <a href='reg_seller.php'> Seller</a></li>";                                            
												echo"</ul>";
										echo"</li>";
									}
							?>
						<!-- To Display Login / Logout based on logged in status -->	
                        <li class="menu-item">
							<?php
								if (isset($_SESSION["uid"])) 
									{
									echo"<a  href='logout.php'>Logout</a>";
									}
								else
									{
									echo"<a  href='#login-popup' data-toggle='modal'>Login</a>";
									}
							?>
                        </li>
                    </ul>

                </div>
            </div>
			
            <div class="header-wrap" id="typo-sticky-header">
                <div class="container theme-container reltv-div">   

                    <div class="pull-right header-search visible-xs">
                        <a id="open-popup-menu" class="nav-trigger header-link-search" href="javascript:void(0)" title="Menu">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-header pull-left">
                                <div class="logo-area">
                                    <a href="index.php" class="thm-logo fsz-35">
                                        <!--<img src="files/main-logo.png" alt="Goshop HTML Theme">-->
                                        <b class="bold-font-3 wht-clr">Advanced Group</b><span class="thm-clr funky-font"> Marketing</span>
                                    </a>
                                </div>                              
                            </div>
                        </div>
                        <!-- Navigation -->

                        <div class="col-md-8 col-sm-8 static-div">
                            <div class="navigation pull-left">
                                <nav>                                                               
                                    <div class="" id="primary-navigation">                                        
                                        <ul class="nav navbar-nav primary-navbar">
										
                                            <li  class="active"><a href="index.php">Home</a></li> 
											
                                            <li><a href="about.php">About Us</a></li>
											
                                            										
											<li><a href="faq.php">F.A.Q</a></li>
											
                                            <li><a href="contact-us.php">Contact</a></li>
												
										</ul>										
									</div>    
								</nav>
                            </div>
							
                            
                        </div>
                    </div>
                </div>          
            </div>
        </header>
        <!-- / HEADER -->

        <!-- CONTENT + SIDEBAR -->
        <div class="main-wrapper clearfix">
            
			<section class="gst-compare">

                <div class="gst-column col-lg-12 col-md-6 col-sm-12 col-xs-12">
					<form class="subscribe" id="seller_form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<h2> <i class="fa fa-user fa-2x thm-clr"></i> Register Here With Advanced Group Marketing as <span class="thm-clr">Seller</span></h2>
					<div class="gst-column col-lg-6">
						
							<p></p>
							
							<div class="form-group">
								<input type="email" placeholder="* Enter your email address" name="seller_email" id="seller_email" class="form-control" value="<?php echo $seller_email_value;?>" required />
								<?php $validator->out_field_error('seller_email');?>
							</div>
							
                            <div class="form-group">
								<input type="password" placeholder="* Enter your Password" name="seller_pwd" id="seller_pwd" class="form-control" value="<?php echo $seller_pwd_value;?>" required />
								<?php $validator->out_field_error('seller_pwd');?>
							</div>
							
							<div class="form-group">
								<input  class="form-control" type="password" name="seller_pwd_repeat" id="seller_pwd_repeat" placeholder="* Repeat Password here" value="<?php echo $seller_pwd_repeat_value;?>" required />
								<?php $validator->out_field_error('seller_pwd_repeat');?>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" name="seller_first_name" id="seller_first_name" placeholder="* First Name..." value="<?php echo $seller_first_name_value;?>" required />
								<?php $validator->out_field_error('seller_first_name');?>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" name="seller_last_name" id="seller_last_name" placeholder="* Last Name..." value="<?php echo $seller_last_name_value;?>" required />
								<?php $validator->out_field_error('seller_last_name');?>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" name="seller_buss_name" id="seller_buss_name" placeholder="* Business Name..." value="<?php echo $seller_buss_name_value;?>" required />
								<?php $validator->out_field_error('seller_buss_name');?>
							</div>
							
							
					</div>
					
					<div class="gst-column col-lg-6">
							<p></p>
							<div class="form-group">
								<textarea class="form-control" name="seller_addr" id="seller_addr" placeholder="* Address..." required><?php echo htmlspecialchars($seller_addr_value, ENT_QUOTES, 'UTF-8'); ?></textarea>
								<?php $validator->out_field_error('seller_addr');?>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" name="seller_mobile_number" id="seller_mobile_number" placeholder="* Contact no..."value="<?php echo $seller_mobile_number_value;?>" required />
								<?php $validator->out_field_error('seller_mobile_number');?>
							</div>
							
							<div class="form-group">
								<select class="form-control" name="seller_rev_msg" id="seller_rev_msg">
									<option value= "seller_rev_msg"> -- Do you want to receive message--</option>
									<option value= "yes" <?php echo $selected_seller_rev_msg_yes ?>>Yes</option>
									<option value= "no" <?php echo $selected_seller_rev_msg_no ?>>No</option>
								</select>
							</div>
							
							<div class="">
								Select Category of your choice:</br>
												<input class="checkbox-inline" type="checkbox" name="seller_category_food" value="food" <?php echo $selected_seller_category_food ?> /> Food products<br />
												<input class="checkbox-inline" type="checkbox" name="seller_category_electronics" value="electronics" <?php echo $selected_seller_category_electronics ?> /> Electronics<br />
												<input class="checkbox-inline" type="checkbox" name="seller_category_rawmaterial" value="rawmaterial" <?php echo $selected_seller_category_rawmaterial ?> /> Raw Material<br />
												<input class="checkbox-inline" type="checkbox" name="seller_category_entertainment" value="entertainment" <?php echo $selected_seller_category_entertainment ?> /> Entertainment <br/>
												<input class="checkbox-inline" type="checkbox" name="seller_category_other" value="other" <?php echo $selected_seller_category_other ?> /> Other
								
							</div>
							<br>
                            <div class="form-group">
								<input type="hidden" name="seller_reg" id="seller_reg" value="seller" />
                                <button class="alt fancy-button" id="send-mail"> <span class="fa fa-user"></span> Register </button>
                            </div>
                        </form>
					</div>	  
                </div>
            </section>
			
        </div>                                                                                                                       

        <div class="clear"></div>

  <!-- FOOTER -->
       <?php include "libs/_incl_footer.php";?>  
 <!-- / FOOTER -->

      

        <!-- Popup: Login 1 -->
        <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">                
                <button type="button" class="close close-btn popup-cls" data-dismiss="modal" aria-label="Close"> <i class="fa-times fa"></i> </button>

                <div class="modal-content login-1 wht-clr">   
                    <div class="login-wrap text-center">                        
                        <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 wht-clr">Advanced Group</span> <span class="thm-clr funky-font">Marketing</span> </h2>
                        <p class="fsz-20 title-3"> WELCOME TO OUR  WONDERFUL WORLD OF SHOPPING </p>
                        <p class="fsz-15 bold-font-4"> Login to get the most out of  <span class="thm-clr"> Advanced Group Marketing Website </span> </p>                       

                        <div class="login-form">  
							<br>
                             <form class="login" name="loginform" id="loginform" method = "post" action= "<?php echo $_SERVER["PHP_SELF"];?>">
                                <div class="form-group"><input type="text" id="user_id" name="login_id" placeholder="Email" class="form-control"></div>
                                <div class="form-group"><input type="password" id="user_pass" name="login_pwd" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="alt fancy-button" id="login-submit" type="submit"> <span class="fa fa-lightbulb-o"></span> Login</button>
									<input type="hidden" name="login_exe" value="login" />
                                </div>
                            </form>

                            <p><i class="fa fa-user"></i> New User ??? <a class="thm-clr" >Click Signup to Register .</a></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login 1 -->

        <!-- Subscribe Popup 1
        <section class="subscribe-me">
            <a href="#close" class="sb-close-btn close popup-cls"><i class="fa-times fa"></i></a>      
            <div class="modal-content subscribe-2 blk-clr">   
                <div class="login-wrap text-center">                        
                    <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 blk-clr">GoShop</span> <span class="thm-clr funky-font">bikes</span> </h2>
                    <h2 class="sec-title fsz-50">NEWSLETTER</h2>
                    <h3 class="fsz-15 bold-font-4"> Did you know that we ship to over <span class="thm-clr"> 24 different countries </span> </h3>

                    <div class="login-form spctop-30"> 
                        <form class="subscribe">
                            <div class="form-group"><input type="text" placeholder="Enter your name" class="form-control"></div>
                            <div class="form-group"><input type="text" placeholder="Enter your email address" class="form-control"></div>
                            <div class="form-group">
                                <button class="alt fancy-button" type="submit"> <span class="fa fa-envelope"></span> Subscribe </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Subscribe Popup 1 -->

       

        <!-- Top -->
        <div class="to-top" id="to-top"> <i class="fa fa-long-arrow-up"></i> </div>

        <!-- JS Global -->
        <script src="assets/plugins/jquery/jquery-2.1.3.js"></script>    
        <script src="assets/plugins/royalslider/jquery.royalslider.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap-select-1.9.3/dist/js/bootstrap-select.min.js"></script>             
        <script src="assets/plugins/owl-carousel2/owl.carousel.min.js"></script> 
        <script src="assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>     
        <script src="assets/plugins/isotope-master/dist/isotope.pkgd.min.js"></script>        
        <script src="assets/plugins/subscribe-better-master/jquery.subscribe-better.min.js"></script>       

        <!-- Page JS -->
        <script src="assets/js/countdown.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/custom.js"></script>         
        <script src="assets/plugins/Swiper-3.2.7/dist/js/swiper.jquery.min.js"></script>

    </body>

<!-- Mirrored from event-theme.com/themes/goshophtml/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:31:11 GMT -->
</html>