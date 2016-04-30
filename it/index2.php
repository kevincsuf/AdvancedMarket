<!-- Initernational Marketing Index Page -->
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

                    <div class="pull-right header-search visible-xs">
                        <a id="open-popup-menu" class="nav-trigger header-link-search" href="search.php" title="Menu">
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
											
                                            <li><a href="contact-us.php">Contact</a></li>
												
										</ul>										
									</div>    
								</nav>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			
			// collect
			if(isset($_GET['cat_url_id']))
				{
					
					
					global $con;
					$var_cat_url_id = $_GET['cat_url_id'];
					


					$var_get_query= "SELECT * FROM create_deal WHERE deal_category='$var_cat_url_id'";
					$var_query = mysqli_query($con,$var_get_query);
					//-count results

					//$rowcount=mysqli_num_rows($var_query);
				
							echo '
									<section class="gst-row row-arrivals woocommerce ovh" id= "newarrival">
										<div class="container theme-container">
											<div class="gst-column col-lg-12 no-padding text-center">
												<div class="fancy-heading text-center">
													<h3><span class="thm-clr">Category</span> Search</h3>
													<h5 class="funky-font-2">Leading Products</h5>
												</div>';
				
							 while($row=mysqli_fetch_array($var_query))
							{
									$deal_url_id=0;
									$var_deal_id = $row['deal_id']; // deal_id => 1 
									$var_deal_title = $row['title'];
									$var_deal_description = $row['description'];
									$var_deal_qty = $row['qty'];
									$var_deal_unit_price = $row['unit_price'];
									$var_deal_unit = $row['unit'];
									$var_deal_image = $row['deal_image'];
								

												echo"<div class='col-md-3 col-sm-6 col-xs-12 isotope-item tab-2 tab-3 tab-5'>";
													echo"<div class='portfolio-wrapper'>";
													echo"<div class='portfolio-thumb'>";
														echo"<img src='images/".$row["deal_image"]."' alt=''>";
															echo"<div class='portfolio-content'>";
																echo"<div class='pop-up-icon'>";
																	echo"<a class='center-link' href='single_product.php?deal_url_id=$var_deal_id' data-toggle='modal'><i class='fa fa-search'></i></a>";
																	
																		
																echo "</div>";
															echo "</div>";
													echo "</div>";
												// code to single single_product page based on user login
													if (isset($_SESSION["uid"])) 
														{
														echo"<div class='product-content'>";
															echo"<h3> <a class='title-3 fsz-18' href='single_product.php?deal_url_id=$var_deal_id'>".$row["title"]."</a> </h3>";
															echo"<p class='font-2'>Starting from<span class='thm-clr'> $ ".$row["unit_price"]."</span> </p>";  
														echo "</div>";
														}
													else
														{
														echo"<a href='#login-popup' data-toggle='modal'>".$row["title"]."</a>";
														echo "<p class='font-2'>Start from <span class='thm-clr'>$".$row["amount_discount_1"]."</span> </p>";
														}	
																																	
												echo "</div>";
											
									
								echo "</div>";
							
						
						
						
							}
				}		
  
  
			?>
		
		
		
		
</body>
</html>

