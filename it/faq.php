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
											
                                            <li ><a href="about.php">About Us</a></li>
											
                                             											
											<li class="active"><a href="faq.php">F.A.Q</a></li>
											
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
						<h2> <span class="thm-clr">Frequently Asked Questions</span> </h2>
						<p class="funky-font-2">A platform for individuals or small businesses to come together and buy items/commodities in bulk from registered suppliers to achieve low price advantage.</p>
					</div>
				</div>
					
					
					<main class="col-md-9 col-sm-8 blog-wrap">
                        <article class="post type-post format-standard has-post-thumbnail" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                            <!-- Featured Media
                            <div class="entry-media">
                                <a href="single.html">
                                    <img src="assets/img/blog/blog-1.jpg" alt="" itemprop="image">
                                </a>
                            </div>	 -->				
                            <div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q1. What is Advanced Group marketing and how does it work?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>Advanced Group Marketing is a platform for multiple buyers to come together and purchase items in bulk at comparatively lower prices from sellers. Sellers also get the benefit of selling the items in large quantity to multiple customers through a single deal. </p>
                                        
                                    </div>
                                </div>
                            </div>
							<div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q2. What is a deal?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>A deal is an offer by seller to sell certain quantity of item at a discounted rate. Once seller publishes a deal on Advanced Group Marketing website, it becomes available for buyers to join the deal. </p>
                                        
                                    </div>
                                </div>
                            </div>
							<div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q3. Who can register as a seller?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>If you are looking to sell a product in bulk to single/multiple buyers through a single platform and are ready to offer a good discounted rate, you can register as a Seller.  </p>
                                        
                                    </div>
                                </div>
                            </div>
							<div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q4.Who can register as a buyer?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>If you are an individual or an organization interested in buying a product in bulk or willing to join other buyers to avail a group discount, you can register as a buyer.  </p>
                                        
                                    </div>
                                </div>
                            </div>
							<div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q5. How can I win a deal?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>When the minimum deal quantity put on sale by seller is met, deal is closed and purchase is confirmed. </p>
                                        
                                    </div>
                                </div>
                            </div>
							<div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q6. How can I track the deal?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>My page will show the progress bar indicating the quantity ordered.</p>
                                        
                                    </div>
                                </div>
                            </div>
							<div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q7. How long I have to wait to get receive my order?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>When a deal is closed, an email notification is sent to buyer about shipping details. </p>
                                        
                                    </div>
                                </div>
                            </div>
							<div class="media clearfix">
  
                                <div class="media-body">
                                    <header class="entry-header">
                                        <!-- Post Title -->
                                        <h3 class="entry-title" itemprop="headline">
                                            <a href="index.php" rel="bookmark" itemprop="url">Q1. What is Advanced Group marketing and how does it work?</a>
                                        </h3>
                                    </header>

                                    <!-- Main Content of the faq -->
                                    <div class="entry-description" itemprop="description">
                                        <p>Advanced Group Marketing is a platform for multiple buyers to come together and purchase items in bulk at comparatively lower prices from sellers. Sellers also get the benefit of selling the items in large quantity to multiple customers through a single deal. </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </article>
					</main>
				
		</div>
	</section>
		
		
</body>
</html>