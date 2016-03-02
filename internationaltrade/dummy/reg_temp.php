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
			echo "error";
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
                            <li><a href="#portfolio">Services</a></li>
                            <li><a href="#deals">Deals</a></li>
                            <li><a href="#about">About</a></li>
                            <li class="active"><a href="register.php">Sign-up</a></li>
                            <li><a href="#login">Login</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
		
		<!-- Registeration section start -->
		<div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h2>Register With Us</h2>
                        <!-- <p>Some Info For Registerstion Goes Here</p>-->
                    </div>
                </div>
                
                    
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
									
									<form action= "" method= "post">
										<ul>
											<li> 
											Email*: <br>
											<input type = "email" name = "email"> 
											</li>
											<li> 
											Password*: <br>
											<input type = "password" name = "password"> 
											</li>
											<li> 
											Retype Password*: <br>
											<input type = "password" name = "retype_password"> 
											</li>
											<li> 
											First Name*: <br>
											<input type = "text" name = "first_name"> 
											</li>
											<?php $validator-> out_field_error('first_name');?>
											<li> 
											Last Name: <br>
											<input type = "text" name = "last_name"> 
											</li>
											<li>
											Business Name*: <br>
											<input type = "text" name = "business_name"> 
											</li>		
											<li> 
											Address*: <br>
											<input type = "text" name = "address"> 
											</li>
											<li> 
											Phone number*: <br>
											<input type = "text" name = "phone_number"> 
											</li>
											
											<aside>
											Category: <br>
											<input type="checkbox" name="category" value="food">Food products<br>
											<input type="checkbox" name="category" value="electronics">Electronics <br>
											<input type="checkbox" name="category" value="rawmaterial">Raw Material<br>
											<input type="checkbox" name="category" value="entertainment ">Entertainment <br>
											
											</aside>
											<br>
											<input type = "submit" value = "Register"> 
										
										</ul>		
									</form>
								</div>
								
								
							</div>
					</div>
			</div>
		</div>
			<!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>Copyrights Advanced Market <p>
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
		$("[name='regtype']").change(function(){ 

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