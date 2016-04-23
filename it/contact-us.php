<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!filter_var( trim($_POST['email'], FILTER_VALIDATE_EMAIL ))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'nikita@binqware.com'; // Put your own email address here
		$subject='Advanced Marketing E-Mail Team';
		$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>

<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");

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
<!-- Actual HTML STARTS Here-->

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> International Trade || Home</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.html">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <!-- CSS Global -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">        
        <link href="assets/plugins/bootstrap-select-1.9.3/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">         
        <link href="assets/plugins/owl-carousel2/assets/owl.carousel.css" rel="stylesheet" type="text/css"> 
        <link href="assets/plugins/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css" rel="stylesheet" type="text/css">   
        <link href="assets/plugins/royalslider/skins/universal/rs-universal.css" rel="stylesheet">
        <link href="assets/plugins/royalslider/royalslider.css" rel="stylesheet">
        <link href="assets/plugins/subscribe-better-master/subscribe-better.css" rel="stylesheet" type="text/css">

        <!-- Icons Font CSS -->
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

        <!-- Theme CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/header.css" rel="stylesheet" type="text/css">  

        <!--[if lt IE 9]>
       <script src="assets/plugins/iesupport/html5shiv.js"></script>
       <script src="assets/plugins/iesupport/respond.js"></script>
       <![endif]-->

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
						
						<!-- To Display View [seller / buyer] if logged in -->
                        <?php
						echo"<li class='menu-item'>";
							
								if (isset($_SESSION["uid"])) 
									{
										if ($_SESSION["utype"]=="seller")
										echo"<a href='seller_view.php'>My Page</a>";
										else
										echo"<a href='buyer_view.php'>My Page</a>";
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

                    
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-header pull-left">
                                <div class="logo-area">
                                    <a href="index.php" class="thm-logo fsz-35">
                                        <!--<img src="files/main-logo.png" alt="Goshop HTML Theme">-->
                                        <b class="bold-font-3 wht-clr">International</b><span class="thm-clr funky-font"> Trade</span>
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
										
                                            <li  ><a href="index.php">Home</a></li> 
											
                                            <li><a href="about.php">About Us</a></li>
											
                                             <li class="dropdown mega-dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Category</a>                                            
                                                <div class="dropdown-menu mega-dropdown-menu mega-styl2"  style="background: white no-repeat url(assets/img/extra/megamenu-2.jpg) right 25px center; ">
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> Exclusive  </b> <span class="thm-clr funky-font fsz-25"> Deals </span>
                                                            </h2>
                                                            <ul>
															<?php 
															// display the category menu- refer in functions.php
															displaycategory();
															 
															?>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>                                                   
                                                </div>
											</li> 
											
											<li><a href="faq.php">F.A.Q</a></li>
											
                                            <li class="active"><a href="contact-us.php">Contact</a></li>
												
										</ul>										
									</div>    
								</nav>
                            </div>
							
                            <div class="pull-right srch-box">
                                <a id="open-popup-search" class="header-link-search" href="javascript:void(0)" title="Search">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </header>
        <!-- / HEADER -->

        <!-- CONTENT + SIDEBAR -->
        <div class="main-wrapper clearfix">
            <div class="site-pagetitle jumbotron">
                <div class="container  theme-container text-center">
                    <div class="fancy-heading text-center">
                        <h3>Contact Us</h3>
                        <h5 class="funky-font-2">Fell free to contact us</h5>
                    </div> 
                    <!-- Breadcrumbs -->
                   
                </div>
            </div>

            <!-- Contact Us Start -->
			
			<!--Email Sending Script -->


        <!-- Email Sending Script-->
		
            <section class="gst-row"  id="contact-us">                 
                <div class="container theme-container">
                                    
                    <div class="cntct-frm  clearfix">
                        <form id="contactform" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="contactform" class="col-md-offset-2 no-padding col-md-8 col-sm-12" method="post" >
						
						<?php if(isset($hasError)) { //If errors are found ?>
						<p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
						<?php } ?>

						<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
							<div class="alert alert-success">
							<p><strong>Message Successfully Sent!</strong></p>
							<p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
							</div>
						<?php } ?>
						
                            <div class="form-group col-sm-12 form-alert"></div>
                            <div class="contact-form">
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control name input-your-name" placeholder="Your Name" name="contactname" id="contactname"  data-toggle="tooltip" data-placement="bottom"  title="Name is required">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="email" class="form-control email input-email" placeholder="Email Address" name="email" id="email" data-toggle="tooltip" data-placement="bottom"  title="Email is required">
                                </div>
								
                                <div class="form-group col-sm-12">
                                    <textarea class="form-control message input-message" rows="8" cols="10" placeholder="Your Message" name="message" id="message" data-toggle="tooltip" data-placement="top"  title="Message is required"></textarea>
                                </div>
								
                            </div>
                            <div class="form-group col-sm-12 text-center">
                                <input type="submit" value="Send Your Message" name="submit" id="submitButton" class="alt fancy-button" title="Click here to submit your message!" />
                            </div>
                        </form>
                    </div>

                </div>
            </section>
            <!-- / Contact Us Ends -->

            <!-- Map Starts-->
            <section id="map-canvas2"></section>
            <!-- / Map Ends -->


            <div class="clear"></div>
        </div>

        <!-- Subscribe News -->
        <section class="gst-row gst-color-white row-newsletter ovh">
            <div class="gst-wrapper">
                <div class="gst-column col-lg-12 no-padding text-center">
                    <div class="fancy-heading text-center">
                        <h3 class="wht-clr">Subscribe Newsletter</h3>
                        <h5 class="funky-font-2 wht-clr">Sign up for <span class="thm-clr">Special Promotion</span></h5>
                    </div>

                    <p><strong>Lorem ipsum dolor sit amet</strong>, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut<br /> laoreet dolore magna aliquam erat volutpat.</p>

                    <div class="gst-empty-space clearfix"></div>

                    <form>
                        <div class="col-md-2"> <h4> <strong class="fsz-20"> <span class="thm-clr">Subscribe</span> to us </strong> </h4> </div>
                        <div class="gst-empty-space visible-sm clearfix"></div>
                        <div class="col-md-4 col-sm-4">
                            <input type="text" class="dblock" placeholder="Enter your name" />
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <input type="text" class="dblock" placeholder="Enter your email address" />
                        </div>

                        <div class="col-md-2 col-sm-4">
                            <input type="submit" class="dblock fancy-button" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- / Subscribe News -->

        <!-- FOOTER -->
			<?php include "libs/_incl_footer.php";?>  
		<!-- / FOOTER -->
        <!-- Popup: Login 1 -->
        <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">                
                <button type="button" class="close close-btn popup-cls" data-dismiss="modal" aria-label="Close"> <i class="fa-times fa"></i> </button>

                <div class="modal-content login-1 wht-clr">   
                    <div class="login-wrap text-center">                        
                        <h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 wht-clr">GoShop</span> <span class="thm-clr funky-font">fashion</span> </h2>
                        <p class="fsz-20 title-3"> WELCOME TO OUR  WONDERFUL WORLD </p>
                        <p class="fsz-15 bold-font-4"> Did you know that we ship to over <span class="thm-clr"> 24 different countries </span> </p>                       

                        <div class="login-form">
                            <a class="fb-btn btn spcbtm-15" href="#"> <i class="fa fa-facebook btn-icon"></i>Login with Facebook </a>

                            <p class="bold-font-2 fsz-12 signup"> OR SIGN UP </p>

                            <form class="login">
                                <div class="form-group"><input type="text" placeholder="Email" class="form-control"></div>
                                <div class="form-group"><input type="text" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="alt fancy-button" type="submit"> <span class="fa fa-lightbulb-o"></span> Login</button>
                                </div>
                            </form>

                            <p>* Denotes mandatory field.</p>
                            <p>** At least one telephone number is required.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login 1 --> 

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

        <!-- Page JS -->      
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/custom.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    </body>

<!-- Mirrored from event-theme.com/themes/goshophtml/default/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:31:43 GMT -->
</html>