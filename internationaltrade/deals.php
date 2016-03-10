<?php
// modified on 03/09/2016 date field and removed quantity 1 option?>
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
										
						<form id="deals_form" method= "post" action= "libs/deal_lib.php" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
						
							<div class="control-group">
								<div class="controls">
									<input class="span5" type="text" id="title" name="title" placeholder="* Title here..." />												
									
								</div>
								
							</div>
							
							<div class="control-group">
								<div class="controls">
									<input  class="span5" type="text" name="description" id="description" placeholder="* Description here" />												
								</div>
							</div>
							
							
							<div class="control-group">
								<div class="controls">

									<input  class="span5" type="text" name="qty" id="qty" placeholder="* Minimum Quantity per order" />
										
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
									<input class="span5" type="text" id="unit_price" name="unit_price" placeholder="* Enter regular price..." /> 									

								</div>
							</div>
							<div class="control-group">			
								<div class="controls">
								<label>Unit 
									<select class = "span5" id = "unit" name="unit"> 
										
										<option value= "Tickets">Tickets</option>
										<option value= "Bags">Bags</option>
										<option value= "Bottles">Bottles</option>										
										<option value= "vpack">Value_Pack</option>
										<option value= "kg">Kg</option>
										<option value= "lb">Lb</option>
										<option value= "pallet">Pallet</option>
										<option value= "case">Cases</option>										
										<option value= "other">Others</option>
									</select>
								</label>
							</div>

							
							
							<div class="control-group">	
								<div class = "controls" id =  "unit_other" style = "display:none;">
									<!-- add code for unit option other -->
									<input class="span5" type="text" id="uother" name="uother" placeholder="* Enter the Unit" size = "20"/>									
								</div>
							</div>
							
							<div class="control-group">	
								<label>
									# of Discount Option     
									<select class = "span5" id = "number_discount_option" name="number_discount_option">
										<!--<option value= "0">* # of Discount Option </option>									-->
										<option value= "1">1</option>
										<option value= "2">2</option>
										<option value= "3">3</option>
									</select>
								</label>
							</div>
							
								<div class = "controls" id =  "number_discount_option_1" style = "display:none;">
								
									<input class="span5" type="text" id="number_discount_1" name="number_discount_1" placeholder="* Enter first quantity" size = "20"/>									
									<input class="span5" type="text" id="amount_discount_1" name="amount_discount_1" placeholder="* Enter first price $ ..." size = "20"/>										
								</div> 
	
								<div class = "controls" id =  "number_discount_option_2" style = "display:none;">
									<!-- add code for number_discount_option_2 -->
									<input class="span5" type="text" id="number_discount_2" name="number_discount_2" placeholder="* Enter second quantity" size = "20"/>									
									<input class="span5" type="text" id="amount_discount_2" name="amount_discount_2" placeholder="* Enter second price $ ..." size = "20"/>										
								</div>

								<div class = "controls" id =  "number_discount_option_3" style = "display:none;">
									<!-- add code for number_discount_option_3 -->
									<input class="span5" type="text" id="number_discount_3" name="number_discount_3" placeholder="* Enter third quantity" size = "20"/>									
									<input class="span5" type="text" id="amount_discount_3" name="amount_discount_3" placeholder="* Enter third price $ ..." size = "20"/>										
								</div>
								
																	

							<div class="control-group">			
								<div class="controls">
								<label>Time Restricted
									<select class = "span5" id = "time_restricted" name="time_restricted"> 
									<!--	<option value= "time_restricted">-Time Restricted-</option>-->
										<option value= "No">No</option>
										<option value= "Yes">Yes</option>
									</select>
								</label>

								</div>
							</div>
							<div class="control-group">	
								<div class = "controls" id =  "time_restricted_yes" style = "display:none;">
									<!-- add code for time restrcted option yes-->

									<input class="span5" type="text" id="start_date" name="start_date" placeholder="* Enter start date YYYY/MM/DD" size = "20"/>
									<input class="span5" type="text" id="end_date" name="end_date" placeholder="* Enter end date YYYY/MM/DD" size = "20"/>									

								</div>
							</div>
							
							<div class="control-group">			
								<div class="controls">
								<label>Location Restricted 
									<select class = "span5" id = "location_restricted" name="location_restricted"> 
										<!--<option value= "location_restricted">-Location Restricted-</option>-->
										<option value= "No">No</option>
										<option value= "Yes">Yes</option>
									</select>
								</label>
							</div>

							<div class="control-group">	
								<div class = "controls" id =  "location_restricted_yes" style = "display:none;">
									<!-- add code for location restricted option yes-->
									<input class="span5" type="text" id="location_Description" name="location_Description" placeholder="* Describe location restriction" size = "20"/>									
								</div>
							</div>							
							

							<div class="control-group">	
								<label>Shipping Included 
									<select class = "span5" id = "shipping_included" name="shipping_included"> 
									<!--	<option value= "shipping_included">-Shipping Included-</option>-->
										<option value= "No">No</option>
										<option value= "Yes">Yes</option>
										
									</select>
								</label>
								</div>
							</div>
							
							<div class="control-group">	
								<div class = "controls" id =  "shipping_included_yes" style = "display:none;">
									<!-- add code for shipping included option yes-->
									<input class="span5" type="text" id="shipping_Description" name="shipping_Description" placeholder="* Enter shipping cost" size = "20"/>									
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
        <!-- Footer section start -->
        <div class="footer">
            <p>© Copyrights Advanced Group Marketing <p>
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
			
		} else {
			$('#number_discount_option_1').hide();
		}
		});

		$('select[name=number_discount_option]').change(function () {
		if ($(this).val() == '2') {
			$('#number_discount_option_1').show();
			$('#number_discount_option_2').show();
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
		
		$('select[name=location_restricted]').change(function () {
		if ($(this).val() == 'Yes') {
			$('#location_restricted_yes').show();
		} else {
			$('#location_restricted_yes').hide();
			}
		});

		$('select[name=shipping_included]').change(function () {
		if ($(this).val() == 'Yes') {
			$('#shipping_included_yes').show();
		} else {
			$('#shipping_included_yes').hide();
			}
		});		
		
		
		</script>
		<script type="text/javascript" src="js/app.js"></script>

		
		

    </body>
</html>