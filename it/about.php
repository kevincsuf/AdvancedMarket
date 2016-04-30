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
										
                                            <li><a href="index.php">Home</a></li> 
											
                                            <li class="active"><a href="about.php">About Us</a></li>
											
                                             											
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
<!-- About end here -->
	
	<section class="gst-row row-arrivals woocommerce ovh" id= "newarrival">
		<div class="container theme-container">
				<div class="gst-column col-lg-12 no-padding text-center">
					<div class="fancy-heading text-center">
						<h2> <span class="thm-clr">Purpose of this Application</span> </h2>
						<p class="funky-font-2">A platform for individuals or small businesses to come together and buy items/commodities in bulk from registered suppliers to achieve low price advantage.</p>
					</div>
				</div>
		</div>
						<div class="theme-container container">

					<!-- About Starts -->
					<div class="gst-spc3 row">
						<div class="about-box">
							<div class="col-sm-4  spcbt-30">
								<h2 class="title-3 no-margin"> the deals. </h2>
							</div>
							<div class="col-sm-8 about-info space-bottom-50">
								<p> <b>We are supporting for small scale business people!</b> </p>
								<p> Sellers offer the goods that they produce or sell in large quantities, set a date for their deal to end,

									and indicate a price for the goods. Buyers can buy a portion of the seller’s goods, and when enough

									buyers agree to the deal, in other words, when all the goods in the seller’s deal has been sold, the

									deal closes. 
									</p>
								<p> The seller is obligated to supply the goods to the buyers at the agreed price.

								The advantage of our website, over warehouse stores or traditional distributors, is that sellers gain

								the advantage of selling in larger quantities, and buyers gain the large-quantity discounts normally

								enjoyed by large-volume buyers. 
								</p>
							</div>    
						</div>
						<div class="about-box">
							<div class="col-sm-4  spcbt-30">
								<h2 class="title-3 no-margin"> contact us. </h2>
							</div>
							<div class="col-sm-8 about-info spcbt-30">
								<ul class="about-contact">
									<li> <i class="fa fa-map-marker fsz-20"></i> <span class="desc"> 1234 California State University Fullerton, California </span> </li>
									<li> <i class="fa fa-envelope-o fsz-20"></i> <span class="desc"> hello@advancedgroupmarketing.com </span> </li>
									<li> <i class="fa fa-phone fsz-20"></i> <span class="desc"> (0091) 8547 632521 </span> </li>
								</ul>
								<p> <strong class="gray-color">HOUR WORK:</strong> <b>  MONDAY - FRIDAY  /  08AM - 05PM</b> </p>
							</div>    
						</div>
						
					</div>
					<!-- / About Ends -->

				</div>

	</section>
		
		<!-- Main container start here -->
		<!-- Javascript framework and plugins start here -->

		
<!-- Javascript framework and plugins end here -->
</body>
</html>