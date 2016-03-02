<?php
	
	require_once("libs/validator.php");
	$validator = new validator();
	
	if($_POST)
	{
		$validator-> add_field('first_name');
		$validator-> add_rule_to_field('first_name', array('min-length',2));
		$validator-> add_rule_to_field('first_name', array('empty'));
		
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
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Advanced Marketing</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li><a href="index.php">Home</a></li>                         

                            <li class="active"><a href="register.php">Sign-up</a></li>
                            <li><a href="#login">Login</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="" class="">
               
                <!-- mask elemet use for masking background image -->
               
                <!-- All slides centred in container element -->
                
            </div>
        </div>
        <!-- End home section -->
        
        
        <!-- Registeration section start -->
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
											<option value="seller">Seller</option>
											<option value="buyer">Buyer</option>
										</select>
										<div class="error left-align" id="err-name">Please enter name.</div>
									</div>
								</div>
									
								<div class="seller_form" style="display:none;" >
									
									<form id="seller_form" method = "post" action= "libs/validator.php">
									
									
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="email" id="seller_email" name="seller_email" placeholder="* Email ID here" />												
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input  class="span5" type="password" name="seller_pwd" id="seller_pwd" placeholder="* Password here" />												
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input  class="span5" type="password" name="seller_pwd_repeat" id="seller_pwd_repeat" placeholder="* Repeat Password here" />                                            
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" id="first_name" " name="first_name" placeholder="* First Name..." /> 
											</div>
											<?php $validator-> out_field_error('first_name');?>
										</div>										
																	
										
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" id="seller_last_name" name="seller_last_name" placeholder="* Last Name..." />
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" id="seller_buss_name" name="seller_buss_name" placeholder="* Business Name..." />                                            
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<textarea class="span5" name="seller_addr" id="seller_addr" placeholder="* Address..."></textarea>                                            
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<input class="span5" type="text" id="seller_mobile_number" name="seller_mobile_number" placeholder="* Mobile Number..." />
											   
											</div>
										</div>
										
										<div class="control-group">
											<p> Select Category of your choice </p>
											<div class="controls">
												<input class="checkbox-inline" type="checkbox" name="category" value="food">Food products
												<input class="checkbox-inline" type="checkbox" name="category" value="electronics">Electronics
												<input class="checkbox-inline" type="checkbox" name="category" value="rawmaterial">Raw Material
												<input class="checkbox-inline" type="checkbox" name="category" value="entertainment ">Entertainment											
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<button id="send-mail" class="message-btn">Register</button>
											</div>
										</div>
									</form>
								</div>
								
								<!-- buyer Form Starts Here -->
								<div class="buyer_form" style="display:none;" >
									
									<form id="buyer_form" action="php/mail.php">
									
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span5" type="email" id="email" name="email" placeholder="* Email ID here" />
                                            <div class="error left-align" id="err-email">Please enter valid email adress.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input  class="span5" type="password" name="buyer_pwd" id="buyer_pwd" placeholder="* Password here" />
                                            <div class="error left-align" id="err-password">Please enter valid password.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input  class="span5" type="password" name="buyer_pwd_repeat" id="buyer_pwd_repeat" placeholder="* Repeat Password here" />
                                            <div class="error left-align" id="err-password">Please enter valid password.</div>
                                        </div>
                                    </div>
									
									<div class="control-group">
                                        <div class="controls">
                                            <input class="span5" type="text" id="name" name="name" placeholder="* First Name..." />
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
									
									<div class="control-group">
                                        <div class="controls">
                                            <input class="span5" type="text" id="buyer_last_name" name="buyer_last_name" placeholder="* Last Name..." />
                                            <div class="error left-align" id="err-name">Please enter last name.</div>
                                        </div>
                                    </div>
	
									<div class="control-group">
                                        <div class="controls">
                                            <textarea class="span5" name="comment" id="comment" placeholder="* Address..."></textarea>
                                            <div class="error left-align" id="err-comment">Please enter your comment.</div>
                                        </div>
                                    </div>
									
									<div class="control-group">
                                        <div class="controls">
                                            <input class="span5" type="text" id="buyer_mobile_number" name="buyer_mobile_number" placeholder="* Mobile Number..." />
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
									<div class="control-group">
                                        <div class="controls">
                                            <input class="span5" type="text" id="buyer_rev_msg" name="buyer_rev_msg" placeholder="* Receive Message.." />
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
									<div class="control-group">
                                        <div class="controls"> Pick interested Category: </br>
                                            <input class="checkbox-inline" type="checkbox" name="category" value="food">Food products
											<input class="checkbox-inline" type="checkbox" name="category" value="electronics">Electronics
											<input class="checkbox-inline" type="checkbox" name="category" value="rawmaterial">Raw Material
											<input class="checkbox-inline" type="checkbox" name="category" value="entertainment ">Entertainment								
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
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
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
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

		</script>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>