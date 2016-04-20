<?php

require_once("./libs/core/init.php");
require_once("./libs/login_lib.php");
require_once("./libs/functions.php");
global $cat;
global $cat_name;


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

        // The deal should be closed or already closed?
        $global_deal_closed = false;

?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from event-theme.com/themes/goshophtml/default/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:30:30 GMT -->
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Product Detail Page</title>

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
    <body class="single single-product woocommerce woocommerce-page">

        <!-- HEADER -->
        <header id="masthead" class="clearfix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
            <div class="site-subheader site-header">
                <div class="container theme-container">
                    <!-- Language & Currency Switcher -->
            

                    <!-- Mini Cart -->
                    <ul class="pull-right list-unstyled list-inline">
                        <li class="nav-dropdown">
                            <a href="#">My Account</a>
                            <ul class="nav-dropdown-inner list-unstyled accnt-list">
                                <li> <a href="my-account.html">My Account</a></li>                                                
                                <li> <a href="account-info.html"> Account Information </a></li>                                                
                                <li> <a href="cng-pw.html">Change Password</a></li>
                                <li> <a href="address-book.html">Address Books</a></li>
                                <li> <a href="buyer_view.php">Order History</a></li>	<!--Niki added buyer view-->
                                <li> <a href="review-rating.html">Reviews and Ratings</a></li>

                            </ul>
                        </li>
                       
                        <li class="menu-item">
                            <a  href="#login-popup" data-toggle="modal">Login</a>
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
					<!--Logo code -->
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-header pull-left">
                                <div class="logo-area">
                                    <a href="index-2.html" class="thm-logo fsz-35">
                                        <!--<img src="files/main-logo.png" alt="Goshop HTML Theme">  Niki Changed nav bar-->
                                        <b class="bold-font-3 wht-clr">International</b><span class="thm-clr funky-font"> Trade</span>
                                    </a>
                                </div>                              
                            </div>
                        </div>
                        <!-- Navigation -->
							 <!-- Niki Changed nav bar-->
                        <div class="col-md-8 col-sm-8 static-div">
                            <div class="navigation pull-left">
                                <nav>                                                               
                                    <div class="" id="primary-navigation">                                        
                                        <ul class="nav navbar-nav primary-navbar">
                                            <li class="dropdown">
												<li><a href="index.php">Home</a></li>
                                                 <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Home</a>-->
                                               
                                                    <!-- Niki need to add code for user switch based on buyer and seller-->    
                                                    
                                                
                                            </li> 
                                            
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
                                           
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Blog</a>
                                                <ul class="dropdown-menu">  
                                                    <li><a href="blog.html"> Blog </a></li>                                            
                                                    <li><a href="blog-leftside.html"> Blog Lef Sidebar</a></li>
                                                    <li><a href="blog-single.html"> Blog Single </a></li>                                                   
                                                </ul>
                                            </li>
                                            <li><a href="contact-us.html">Contact</a></li>
                                            <li class="dropdown mega-dropdown active">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Page</a>                                            
                                                
                                            </li>
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
            

            <div class="theme-container container">
                <main id="main-content" class="main-content">                  
                    <div itemscope itemtype="http://schema.org/Product" class="product has-post-thumbnail product-type-variable">
						<!-- PHP Code -->
							<?php 
								if(isset($_GET['deal_url_id']))
									{
									$var_deal_url_id = $_GET['deal_url_id'];

                                    // Check deal closed
                                    $global_deal_closed = closeDeal($var_deal_url_id);
                                    if ($global_deal_closed) {
                                    ?>
                        <!-- deal already closed -->
                        <div class="row">
                            <div class="gst-countdown right">Sorry, this deal is already closed.</div>
                        </div>
                                    <?php
                                    }
                                    else {
                                    ?>
                        <!-- timestamp -->
                        <div class="row">
                            <div id="countdown" class="gst-countdown right">Timestamp</div>
                        </div>
                                    <?php
                                    }

                                    // Check deal closed
                                    if (checkJoinedDeal($var_deal_url_id, $_SESSION["ukey"])) {
                                        $global_order_placed = true;
                                    }
                                    else {
                                        $global_order_placed = false;
                                    }
									
									$cat = "";
									$var_deal_id = 0;
									$var_deal_title = "";
									$var_deal_description = "";
									$var_deal_qty = 0;
									$var_deal_unit_price = 0;
									$var_deal_unit = "";
									$var_deal_image = "";
									$var_deal_max_qty = 0;
									$var_number_discount_option = 0;
									$var_number_discount_1 = 0;
									$var_amount_discount_1 = 0;
									$var_number_discount_2 = 0;
									$var_amount_discount_2 = 0;
									$var_number_discount_3 = 0;
									$var_amount_discount_3 = 0;
									
									
									// Quering for Particular ID
									$sql = "SELECT * FROM create_deal WHERE deal_id='$var_deal_url_id'";
									$res=mysqli_query($con,$sql);
									while($var_row_deal = mysqli_fetch_assoc($res))
									 {
										$cat = $var_row_deal['deal_category'];
										$var_deal_id = $var_row_deal['deal_id'];
										$var_deal_title = $var_row_deal['title'];
										$var_deal_description = $var_row_deal['description'];
										$var_deal_qty = $var_row_deal['qty'];
										$var_deal_unit_price = $var_row_deal['unit_price'];
										$var_deal_unit = $var_row_deal['unit'];
										$var_deal_image = $var_row_deal['deal_image'];
										$var_deal_max_qty = $var_row_deal['max_quantity'];
										$var_number_discount_option = $var_row_deal['number_discount_option'];
										$var_number_discount_1 = $var_row_deal['number_discount_1'];
										$var_amount_discount_1 = $var_row_deal['amount_discount_1'];
										$var_number_discount_2 = $var_row_deal['number_discount_2'];
										$var_amount_discount_2 = $var_row_deal['amount_discount_2'];
										$var_number_discount_3 = $var_row_deal['number_discount_3'];
										$var_amount_discount_3 = $var_row_deal['amount_discount_3'];
										
												
												
												// Set global variable
												$global_min_quantity = $var_deal_qty;
												$global_deal_id = $var_deal_id;
												$global_deal_end_date = $var_row_deal['end_date'];
												
												// Image Section
												echo"<div class='row'>";
													echo"<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>";
														echo"<div id='gallery-2' class=''>";
															echo"<a class='rsImg' data-rsbigimg='images/".$var_row_deal["deal_image"]."' href='images/".$var_row_deal["deal_image"]."' ></a>";
														echo"</div>";
													echo"</div>";
													
													echo"<div class='spc-15 hidden-lg clear'></div>";
													// Details Section
													echo"<div class='col-lg-8 col-sm-8 col-md-8 col-xs-8'>";
														echo"<div class='summary entry-summary'>";
															echo"<div class='woocommerce-product-rating' itemprop='aggregateRating' itemscope itemtype='http://schema.org/AggregateRating'>";
																echo"<div class='posted_in'>";
																	echo"<h3 class='funky-font-2 fsz-20'>".$cat_name."</h3>";
																echo"</div>";
															echo"</div>";

															echo"<div class='product_title_wrapper'>";
																echo"<div itemprop='name' class='product_title entry-title'>";
																	echo"".$var_row_deal["title"]."";
																	echo"<p class='font-3 fsz-18 no-mrgn price'> <b class='amount blk-clr'>$".$var_row_deal["amount_discount_1"]."</b> <del>$".$var_row_deal["unit_price"]."</del> </p>";       
																echo"</div>";
															echo"</div>";
												
															echo"<div class='rating'>";
																	 echo"<span class='star active'></span>";
																	 echo"<span class='star active'></span>";
																	 echo"<span class='star active'></span>";                                          
																	 echo"<span class='star active'></span>";
																	 echo"<span class='star half'></span>";
															echo"</div>";
												
															echo"<div itemprop='description' class='fsz-15'>";
																echo"<p>".$var_row_deal["description"]."</p>"; 
																echo"<p class='progress-bar progress-bar-info'></p>";
															echo"</div>";
																						
															echo"<div style='width: 35%;' class='progress-bar progress-bar-info'>";
															echo"</div>";
											
														echo"</div>";
													echo"</div>";
													// code for join deal begins 
												
													
													// Hide Join button when this user joined this deal already or this user is seller or the deal is already closed
													if (($global_order_placed) || (strtolower($_SESSION["utype"]) == "seller" || $global_deal_closed)) {
														$global_order_eligible = false;
													}
													else {
														$global_order_eligible = true;
													}

													if ($global_order_eligible) {
														echo"<div class='col-md-10 col-sm-12 col-sm-12 text-right gst-cta-buttons'>";
														 echo"<a href='#join-popup' class='fancy-btn fancy-btn-small' data-toggle='modal'>JOIN</a>";
														echo "</div>";
													}
													else if (strtolower($_SESSION["utype"]) == "seller") {
                                                        echo"<div class='col-md-10 col-sm-12 col-sm-12 text-right'>";
                                                        echo "
															Seller can not join a deal. Please log in as a buyer.
														";
                                                        echo "</div>";
													}
													else if ($global_order_placed) {
                                                        echo"<div class='col-md-10 col-sm-12 col-sm-12 text-right'>";
                                                        echo "
															You already joined this deal.
                                                        ";
                                                        echo "</div>";
													}
                                                    else if ($global_deal_closed) {
                                                        echo"<div class='col-md-10 col-sm-12 col-sm-12 text-right'>";
                                                        echo "
                                                        ";
                                                        echo "</div>";
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
							<!-- PHP Code ENDS -->
							
							<!--<PHP CODE FOR CATEOGRY> -->
								<?php
								//$sql1="SELECT * FROM category where cat_id=$cat";
								//$res1=mysqli_query($con,$sql1);
								//while($row1 = mysqli_fetch_assoc($res1))
									{
						          //    $cat_name = $row1["category"]."</a>";  
										//echo $cat_name;
									}
								?>
						<?php 		
						echo " <div class='progress'>";
												// Check how many discounts
												if ($var_number_discount_option == 1) {
													$var_percent_1 = 100;
													$var_percent_2 = 0;
													$var_percent_3 = 0;
													
													echo "<div class='progress-bar progress-bar-success' role='progressbar' style='width:".$var_percent_1."%'>".$var_number_discount_1." ".$var_deal_unit.", $".$var_amount_discount_1."/".$var_deal_unit."</div>";
												}
												else if ($var_number_discount_option == 2) {
													$var_percent_1 = 50;
													$var_percent_2 = 50;
													$var_percent_3 = 0;
													echo "<div class='progress-bar progress-bar-success' role='progressbar' style='width:".$var_percent_1."%'>".$var_number_discount_1." ".$var_deal_unit.", $".$var_amount_discount_1."/".$var_deal_unit."</div>";
													echo "<div class='progress-bar progress-bar-warning' role='progressbar' style='width:".$var_percent_2."%'>".$var_number_discount_2." ".$var_deal_unit.", $".$var_amount_discount_2."/".$var_deal_unit."</div>";
												}
												else if ($var_number_discount_option == 3) {
													$var_percent_1 = 33;
													$var_percent_2 = 33;
													$var_percent_3 = 34;
													echo "<div class='progress-bar progress-bar-success' role='progressbar' style='width:".$var_percent_1."%'>".$var_number_discount_1." ".$var_deal_unit.", $".$var_amount_discount_1."/".$var_deal_unit."</div>";
													echo "<div class='progress-bar progress-bar-warning' role='progressbar' style='width:".$var_percent_2."%'>".$var_number_discount_2." ".$var_deal_unit.", $".$var_amount_discount_2."/".$var_deal_unit."</div>";
													echo "<div class='progress-bar progress-bar-danger' role='progressbar' style='width:".$var_percent_3."%'>".$var_number_discount_3." ".$var_deal_unit.", $".$var_amount_discount_3."/".$var_deal_unit."</div>";
												}
												
												echo "  </div>";
												?>
                        <div class="clearfix"></div>

                        <div class="woocommerce-tabs wc-tabs-wrapper row">
                            <ul class="tabs wc-tabs">
                                <li class="description_tab">
                                    <a href="#tab-description">Description</a>
                                </li>
                                <li class="additional_information_tab">
                                    <a href="#tab-additional_information">Additional Information</a>
                                </li>
                                <li class="reviews_tab">
                                    <a href="#tab-reviews">Reviews (3)</a>
                                </li>
                            </ul>

                            <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-description">
                                <h2 class="title-3">Description</h2>
                                <hr class="heading-seperator" />
                                <div class="scroll-div">
                                    <div class="nano-content">
                                        <p> It’s a cute reversitile hand bag / shoulder bag that comes with straps inside it if you choose to 
                                            wear on the shoulders and from what photo show I can put my apple ipad on side comfortably in it ~ very cool 
                                            idea , plus theirs 5 storing compartments and 2 smaller ones for a total of 6 and it has nice flowers printed 
                                            designs on white shiny section on bag and straight. </p>
                                        <p>stitched lines on black shiny section , and 2 strips of gold on each end going up and down over the hill on each side identical on handbag.</p>
                                        <p> It’s a cute reversitile hand bag / shoulder bag that comes with straps inside it if you choose to 
                                            wear on the shoulders and from what photo show I can put my apple ipad on side comfortably in it ~ very cool 
                                            idea , plus theirs 5 storing compartments and 2 smaller ones for a total of 6 and it has nice flowers printed 
                                            designs on white shiny section on bag and straight. </p>
                                        <p>stitched lines on black shiny section , and 2 strips of gold on each end going up and down over the hill on each side identical on handbag.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-reviews">
                                <h2 class="title-3">Product Review</h2>
                                <hr class="heading-seperator" />
                                <div class="scroll-div">
                                    <div class="nano-content">
                                        <div id="reviews">
                                            <div id="comments">
                                                <ol class="commentlist">
                                                    <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment even thread-even depth-1">
                                                        <div class="comment_container diblock">
                                                            <img alt="" src="assets/img/extra/review-1.jpg" itemprop="image" class="avatar" height="60" width="60" />
                                                            <div class="comment-text">
                                                                <strong class="name">JOHN LENNON</strong>
                                                                <div class="rating"> 
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>                                           
                                                                    <span class="star active"></span>
                                                                    <span class="star half"></span>
                                                                </div>
                                                                <p class="meta">
                                                                    <time itemprop="datePublished" datetime="2013-06-07T13:03:29+00:00"> 2 June, 2016</time>:
                                                                </p>
                                                                <div itemprop="description" class="description">
                                                                    <p>cute reversitile hand bag  shoulder bag that comes with straps inside it if you choose to wear</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li><!-- #comment-## -->

                                                    <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment even thread-even depth-1">
                                                        <div class="comment_container diblock">
                                                            <img alt="" src="assets/img/extra/review-1.jpg" itemprop="image" class="avatar" height="60" width="60" />
                                                            <div class="comment-text">
                                                                <strong class="name">JOHN LENNON</strong>
                                                                <div class="rating"> 
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>                                           
                                                                    <span class="star active"></span>
                                                                    <span class="star half"></span>
                                                                </div>
                                                                <p class="meta">
                                                                    <time itemprop="datePublished" datetime="2013-06-07T13:03:29+00:00"> 2 June, 2016</time>:
                                                                </p>
                                                                <div itemprop="description" class="description">
                                                                    <p>cute reversitile hand bag  shoulder bag that comes with straps inside it if you choose to wear</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li><!-- #comment-## -->

                                                    <li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment even thread-even depth-1">
                                                        <div class="comment_container diblock">
                                                            <img alt="" src="assets/img/extra/review-1.jpg" itemprop="image" class="avatar" height="60" width="60" />
                                                            <div class="comment-text">
                                                                <strong class="name">JOHN LENNON</strong>
                                                                <div class="rating"> 
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>
                                                                    <span class="star active"></span>                                           
                                                                    <span class="star active"></span>
                                                                    <span class="star half"></span>
                                                                </div>
                                                                <p class="meta">
                                                                    <time itemprop="datePublished" datetime="2013-06-07T13:03:29+00:00"> 2 June, 2016</time>:
                                                                </p>
                                                                <div itemprop="description" class="description">
                                                                    <p>cute reversitile hand bag  shoulder bag that comes with straps inside it if you choose to wear</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li><!-- #comment-## -->
                                                </ol>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="entry-content wc-tab col-lg-4 col-sm-6 col-xs-12" id="tab-additional_information">
                                <h2 class="title-3">Additional Information</h2>
                                <hr class="heading-seperator" />
                                <div class="scroll-div">
                                    <div class="nano-content">
                                        <h2 class="title-3 fsz-14 no-mrgn spcbt-30"> ASIN: <span class="thm-clr"> B00IL3TMFW </span> </h2>
                                        <p>Product Dimensions: 11 x 5.5 x 8.7 inches; 1.8 pounds.</p>
                                        <p>Shipping Weight: 1.8 pounds <br>
                                            (View shipping rates and policies)</p>
                                        <p>Item model number: NB-B00IL3TMFW</p>
                                        <p>Average Customer Review:    29 customer reviews</p>
                                        <p>Would you like to give feedback on images?</p>   
                                        <p>Item model number: NB-B00IL3TMFW</p>
                                        <p>Average Customer Review:    29 customer reviews</p>
                                        <p>Would you like to give feedback on images?</p>   
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>                    
                </main>
            </div>

            <div class=" light-bg gst-row">
                <div class="fancy-heading text-center">
                    <h3> RELATED PRODUCTS </h3>
                    <h5 class="funky-font-2"> Customers who viewed this item also viewed </h5>                
                </div>

                <!-- Portfolio items -->
                <div class="related-product nav-2 text-center">
                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-1.png" alt="" />                                                 
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-2.png" alt="" />                                                  
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-3.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-4.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-5.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> CICLYSMO JACKET </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>

                    <div class="product">
                        <div class="rel-prod-media">
                            <img src="assets/img/products/rel-prod-6.png" alt="" />
                        </div>
                        <div class="product-content">
                            <h3> <a href="#" class="title-3 fsz-16"> LYCRA BITZ MEN CLOTHING </a> </h3>
                            <p class="font-3">Price: <span class="thm-clr"> $299.00 </span> </p>    
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>
		
		
		<!-- PHP CATEOGRY Code ENDS -->
							
							<div class="modal fade login-popup" id="join-popup" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">                
									<button type="button" class="close close-btn popup-cls" data-dismiss="modal" aria-label="Close"> <i class="fa-times fa"></i> </button>

									<div class="modal-content login-1 wht-clr">   
										<div class="login-wrap text-center">                        
										<h2 class="fsz-35 spcbtm-15"> <span class="bold-font-3 wht-clr">International</span> <span class="thm-clr funky-font">Trade</span> </h2>
																
										<p class="fsz-15 bold-font-4"> Join to get the most out of  <span class="thm-clr"> International Trade Website </span> </p>     <div class="login-form">  
											<br>
											<form class= "login-form" name="join_form" id="join_form" method= "post" action="<?php echo $_SERVER["PHP_SELF"];?>" onSubmit="return join_validate();">

											<input type='hidden' name='min_quantity' id='min_quantity' value='<?php echo $global_min_quantity; ?>'>
											<input type='hidden' name='remaining_stocks' id='remaining_stocks' value='<?php echo $global_remaining_stocks; ?>'>
											<input type='hidden' name='deal_id' id='deal_id' value='<?php echo $global_deal_id; ?>'>
											<input type='hidden' name='deal_end_date' id='deal_end_date' value='<?php echo $global_deal_end_date; ?>'>

											<div class="form-group">
											 <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" />
											 <div class="warning left-align" id="display_remaining_stocks"><p>Remaining stocks: <?php echo $global_remaining_stocks ?> / Minimum order quantity: <?php echo $global_min_quantity ?></p></div>
											</div>

																	<div class="form-group">
																		<input type='text' class='form-control' name='address' id='address' placeholder='Address' />
																	</div>

																	<div class="form-group">
																		<input type='text' class='form-control' name='state' id='state' placeholder='State' />
																	</div>

																	<div class="form-group">
																		<input type='text' class='form-control' name='zipcode' id='zipcode' placeholder='Zipcode' type='number' />
																	</div>

																	</br>
																	<button type='submit' class='btn btn-success'>Submit</button>
																	<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
																</form>

															</div>

								</div>
							</div>
						</div>
							<!-- /Popup: Login 1 --> 

									<script type="text/javascript">
										function join_validate() {
											var minQty = document.forms["join_form"]["min_quantity"].value;
											var remainStocks = document.forms["join_form"]["remaining_stocks"].value;
											var orderQty = document.forms["join_form"]["quantity"].value;
											var addr = document.forms["join_form"]["address"].value;
											var state = document.forms["join_form"]["state"].value;
											var zip = document.forms["join_form"]["zipcode"].value;

											minQty = Number(minQty);
											remainStocks = Number(remainStocks);
											orderQty = Number(orderQty);

											if (isNaN(orderQty) || orderQty == 0) {
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

											if(orderQty > remainStocks) {
												alert("Remaining quantity is only " + remainStocks);
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
											 
							<!-- #end for join-popup -->	
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
													  '<span>'+days+'</span><b> Days</b>'+
													  '<span>'+hours+'</span><b> Hours</b>'+
													  '<span>'+min+'</span><b> Minutes</b>'+
													  '<span>'+sec+'</span><b> Seconds</b>';  
												// this is just for milliseconds only
												  /* countdown.innerHTML = 
													  '<span class="ms">'+ms+' ms</span>'; */
												}, ms_step);

								</script>

		

      

  <!-- FOOTER -->
       <?php include "libs/_incl_footer.php";?>  
 <!-- / FOOTER -->

        <!-- Search Popup -->
        <div class="popup-box page-search-box">
            <div>
                <div class="popup-box-inner">
                    <form>
                        <input class="search-query" type="text" placeholder="Search and hit enter" />
                    </form>
                </div>
            </div>
            <a href="javascript:void(0)" class="close-popup-box close-page-search"><i class="fa fa-close"></i></a>
        </div>
        <!-- / Search Popup -->

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
    </body>

<!-- Mirrored from event-theme.com/themes/goshophtml/default/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:30:32 GMT -->
</html>