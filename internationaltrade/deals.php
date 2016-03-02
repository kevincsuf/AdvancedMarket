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
                            <li><a href="logout.php">Logout</a></li>
							<li class="active"><a href="deals.php">My Profile</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
		
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
        <!-- Footer section start -->
        <div class="footer">
            <p>© Copyrights Advanced Market <p>
        </div>
        <!-- Footer section end -->
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
		$('select[name=time_restricted]').change(function () {
		if ($(this).val() == 'Yes') {
			$('#time_restricted_yes').show();
		} else {
			$('#time_restricted_yes').hide();
		}
		});

		</script>
		<script type="text/javascript" src="js/app.js"></script>

		
		

    </body>
</html>