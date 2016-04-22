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

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from event-theme.com/themes/goshophtml/default/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:31:43 GMT -->
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Goshop HTML Theme || Contact Us</title>

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
    
    <body class="blog">

        <!-- HEADER -->
        <header id="masthead" class="clearfix" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
            <div class="site-subheader site-header">
                <div class="container theme-container">
                    <!-- Language & Currency Switcher -->
                    <ul class="pull-left list-unstyled list-inline">
                        <li class="nav-dropdown language-switcher">
                            <div>EN</div>
                            <ul class="nav-dropdown-inner list-unstyled list-lang">
                                <li><span class="current">EN</span></li>
                                <li><a title="Russian" href="#">RU</a></li>
                                <li><a title="France" href="#">FR</a></li>
                                <li><a title="Brazil" href="#">IT</a></li>                                
                            </ul>
                        </li>
                        <li class="nav-dropdown language-switcher">
                            <div><span class="fa fa-dollar"></span>USD</div>
                            <ul class="nav-dropdown-inner list-unstyled list-currency">
                                <li><span class="current"><span class="fa fa-dollar"></span>USD</span></li>
                                <li><a title="Euro" href="#"><span class="fa fa-eur"></span>Euro</a></li>
                                <li><a title="GBP" href="#"><span class="fa fa-gbp"></span>GBP</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Mini Cart -->
                    <ul class="pull-right list-unstyled list-inline">
                        <li class="nav-dropdown">
                            <a href="#">My Account</a>
                            <ul class="nav-dropdown-inner list-unstyled accnt-list">
                                <li> <a href="my-account.html">My Account</a></li>                                                
                                <li> <a href="account-info.html"> Account Information </a></li>                                                
                                <li> <a href="cng-pw.html">Change Password</a></li>
                                <li> <a href="address-book.html">Address Books</a></li>
                                <li> <a href="order-history.html">Order History</a></li>
                                <li> <a href="review-rating.html">Reviews and Ratings</a></li>
                                <li> <a href="return.html">Returns Requests</a></li>
                                <li> <a href="newsletter.html">Newsletter</a></li>
                                <li> <a href="myaccount-leftsidebar.html">Left Sidebar</a></li>
                            </ul>
                        </li>
                        <li id="cartContent" class="cartContent">
                            <a id="miniCartDropdown" href="cart.html">
                                My Cart 
                                <span class="cart-item-num">3</span>
                            </a>

                            <div id="miniCartView" class="cartView">
                                <ul id="minicartHeader" class="product_list_widget list-unstyled">
                                    <li>
                                        <div class="media clearfix">
                                            <div class="media-lefta">
                                                <a href="single-product.html">
                                                    <img  src="assets/img/products/cart-popup-1.jpg" alt="hoodie_5_front" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="single-product.html">Flusas Feminin</a>
                                                <span class="price"><span class="amount"><span class="fa fa-dollar"></span>20.00</span></span>
                                                <span class="quantity">Qty:  1Pcs</span>
                                            </div>
                                        </div>

                                        <div class="product-remove">
                                            <a href="#" class="btn-remove" title="Remove this item"><i class="fa fa-close"></i></a>				
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media clearfix">
                                            <div class="media-lefta">
                                                <a href="single-product.html">
                                                    <img  src="assets/img/products/cart-popup-2.jpg" alt="T_2_front" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="single-product.html">Autum Winter</a>
                                                <span class="price"><span class="amount"><span class="fa fa-dollar"></span>20.00</span></span>
                                                <span class="quantity">Qty:  1Pcs</span>
                                            </div>
                                        </div>

                                        <div class="product-remove">
                                            <a href="#" class="btn-remove" title="Remove this item"><i class="fa fa-close"></i></a>				
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media clearfix">
                                            <div class="media-lefta">
                                                <a href="single-product.html">
                                                    <img  src="assets/img/products/cart-popup-3.jpg" alt="cd_6_angle" />
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <a href="single-product.html">Women's Summer</a>
                                                <span class="price"><span class="amount"><span class="fa fa-dollar"></span>20.00</span></span>
                                                <span class="quantity">Qty:  1Pcs</span>
                                            </div>
                                        </div>

                                        <div class="product-remove">
                                            <a href="#" class="btn-remove" title="Remove this item"><i class="fa fa-close"></i></a>				
                                        </div>
                                    </li> 
                                </ul>

                                <div class="cartActions">
                                    <span class="pull-left">Subtotal</span>
                                    <span class="pull-right"><span class="amount"><span class="fa fa-dollar"></span>75.00</span></span>
                                    <div class="clearfix"></div>

                                    <div class="minicart-buttons">
                                        <div class="col-lg-6">
                                            <a href="cart.html">Your Cart</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="checkout.html" class="minicart-checkout">Checkout</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item">
                            <a href="checkout.html">Checkout</a>
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

                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="top-header pull-left">
                                <div class="logo-area">
                                    <a href="index-2.html" class="thm-logo fsz-35">
                                        <!--<img src="files/main-logo.png" alt="Goshop HTML Theme">-->
                                        <b class="bold-font-3 wht-clr"> GoShop </b> <span class="thm-clr funky-font"> bikes </span>
                                    </a>
                                </div>                              
                            </div>
                        </div>
                        <!-- Navigation -->

                        <div class="col-md-9 col-sm-9 static-div">
                            <div class="navigation pull-left">
                                <nav>                                                               
                                    <div class="" id="primary-navigation">                                        
                                        <ul class="nav navbar-nav primary-navbar">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Home</a>
                                                <ul class="dropdown-menu">  
                                                    <li><a href="index-2.html">Home</a></li>
                                                    <li><a href="index-3.html">Home 2</a></li>
                                                    <li><a href="index-4.html">Home 3</a></li>    
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Sub Menu</a>
                                                        <ul class="dropdown-menu">  
                                                            <li><a href="#">Sub Menu 1</a></li>
                                                            <li><a href="#">Sub Menu 2</a></li>    
                                                            <li class="dropdown">
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Sub Menu 3</a>
                                                                <ul class="dropdown-menu">  
                                                                    <li><a href="#">Sub Menu 4</a></li>
                                                                    <li><a href="#">Sub Menu 5</a></li> 
                                                                    <li><a href="#">Sub Menu 6</a></li> 
                                                                </ul>
                                                            </li> 
                                                        </ul>
                                                    </li> 
                                                </ul>
                                            </li> 
                                            <li><a href="#">Bikes</a></li>
                                            <li class="dropdown mega-dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Clothing</a>                                            
                                                <div class="dropdown-menu mega-dropdown-menu mega-styl2"  style="background: white no-repeat url(assets/img/extra/megamenu-2.jpg) right 25px center; ">
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> WOMEN  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>                                                   
                                                </div>
                                            </li> 
                                            <li class="dropdown mega-dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Components</a>                                            

                                                <div class="dropdown-menu mega-dropdown-menu pr"  style="background: white no-repeat url(assets/img/extra/megamenu-1.jpg) right top; ">
                                                    <div class="col-md-3 col-sm-3 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> WOMEN  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3 col-sm-3 menu-block">                                                
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> MEN </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> KID’S  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3 col-sm-3 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> ELECTRONIC  </b> <span class="thm-clr funky-font fsz-25"> fashion </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="#"> Electronic </a></li>
                                                                <li><a href="#"> Perfume & Cologne </a></li>
                                                                <li><a href="#"> Health & Beauty </a></li>
                                                                <li><a href="#"> Kid’s Fashion </a></li>
                                                                <li><a href="#"> Trend Watches </a></li>
                                                                <li><a href="#"> Women’s Apparel </a></li>    
                                                                <li><a href="#"> Men’s Apparel </a></li>
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
                                                <div class="dropdown-menu mega-dropdown-menu mega-styl2"  style="background: white no-repeat url(assets/img/extra/megamenu-3.jpg) right top; ">
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> Product  </b> <span class="thm-clr funky-font fsz-25"> categories </span>
                                                            </h2>
                                                            <ul>
                                                                <li><a href="category.html"> category </a></li>
                                                                <li><a href="category-left-sidebar.html"> category left sidebar </a></li>
                                                                <li><a href="category-fullwidth.html"> category fullwidth </a></li>
                                                                <li><a href="category2.html"> category Style 2</a></li>
                                                                <li><a href="category2-left-sidebar.html"> category style 2 left sidebar </a></li>
                                                                <li><a href="single-product.html"> single product </a></li>  
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 menu-block">
                                                        <div class="sub-list">                                                           
                                                            <h2 class="blk-clr title">                                                                
                                                                <b class="extbold-font-4 fsz-16"> Theme  </b> <span class="thm-clr funky-font fsz-25"> pages </span>
                                                            </h2>
                                                            <ul>                                                                  
                                                                <li><a href="cart.html"> Shopping Cart </a></li>
                                                                <li><a href="checkout.html"> checkout </a></li>                                                            
                                                                <li><a href="about-us.html"> About Us </a></li>
                                                                <li><a href="404-error.html"> Error </a></li>
                                                                <li><a href="coming-soon.html"> Coming Soon </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
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
            <div class="site-pagetitle jumbotron">
                <div class="container  theme-container text-center">
                    <h3>Goshop Contact</h3>

                    <!-- Breadcrumbs -->
                    <div class="breadcrumbs">
                        <div class="breadcrumbs text-center">
                            <i class="fa fa-home"></i>
                            <span><a href="index-2.html">Home</a></span>
                            <i class="fa fa-arrow-circle-right"></i>
                            <span class="current">Contact</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Us Start -->
			
			<!--Email Sending Script -->


        <!-- Email Sending Script-->
		
            <section class="gst-row"  id="contact-us">                 
                <div class="container theme-container">
                    <div class="fancy-heading text-center">
                        <h3>Contact Us</h3>
                        <h5 class="funky-font-2">Curabitur nec scelerisque nulla, non pharetra sapien.</h5>
                    </div>                  
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
                                    <textarea class="form-control message input-message" rows="8" cols="10" placeholder="Your Massage" name="message" id="message" data-toggle="tooltip" data-placement="top"  title="Message is required"></textarea>
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
        <footer class="site-footer clearfix" itemscope itemtype="https://schema.org/WPFooter">
            <div class="site-main-footer container theme-container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 clearfix">
                        <section class="widget footer-widget widget_text clearfix">
                            <div class="textwidget">
                                <p class="fsz-35"> <span class="bold-font-3 wht-clr">GoShop</span> <span class="thm-clr funky-font">bikes</span> </p>
                                <p>ECommerce HTML Template</p>
                                <div class="author-info-social">
                                    <a class="goshop-share rcc-google" href="http://google.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a class="goshop-share rcc-twitter" href="http://twitter.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a class="goshop-share rcc-facebook" href="http://facebook.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a class="goshop-share rcc-linkedin" href="http://linkedin.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <a class="goshop-share rcc-pinterest" href="http://pinterest.com/" rel="nofollow" target="_blank">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-md-3 col-sm-6 clearfix">
                        <section class="widget footer-widget widget_nav_menu clearfix">
                            <h6 class="widget-title">My Account</h6>
                            <ul>
                                <li class="menu-item"><a href="#">Personal Information</a></li>
                                <li class="menu-item"><a href="#">Address</a></li>
                                <li class="menu-item"><a href="#">Discount</a></li>
                                <li class="menu-item"><a href="#">Order History</a></li>
                            </ul>
                        </section>
                    </div>

                    <div class="col-md-3 col-sm-6 clearfix">
                        <section id="nav_menu-3" class="widget footer-widget widget_nav_menu clearfix">
                            <h6 class="widget-title">Our Services</h6>
                            <ul>
                                <li class="menu-item"><a href="#">Shipping Return</a></li>
                                <li class="menu-item"><a href="#">International Shipping</a></li>
                                <li class="menu-item"><a href="#">Secure Shopping</a></li>
                                <li class="menu-item"><a href="#">Affiliates</a></li>
                                <li class="menu-item"><a href="#">F.A.Q</a></li>
                            </ul>
                        </section>
                    </div>

                    <div class="col-md-3 col-sm-6 clearfix">
                        <section id="text-6" class="widget footer-widget widget_text clearfix">
                            <h6 class="widget-title">Newsletter</h6>
                            <div class="textwidget">
                                Lorem ipsum dolor sit amet conseret adipiscing elit sed diam nonunem.
                                <form class="mc4wp-form">
                                    <p>
                                        <label>Email address: </label>
                                        <input type="email" name="EMAIL" placeholder="Your email address" required />
                                    </p>

                                    <p>
                                        <button class="submit"> <i class="fa fa-envelope-o"></i> </button>                                      
                                    </p>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="post-footer">
                    <div class="payment-systems text-center">
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-1.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-2.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-3.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-4.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-5.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-6.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-7.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-8.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-1.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-2.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-5.png" alt=""></a> </div>
                        <div class="item"> <a href="#"><img src="assets/img/extra/payment-3.png" alt=""></a> </div>
                    </div>
                </div>
            </div>

            <div class="subfooter text-center">
                <div class="container theme-container">
                    <p>Copyright &copy; <a href="#" class="thm-clr">jThemes Studio</a>.  All Right Reserved 2015</p>
                </div>
            </div>
        </footer>

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
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    </body>

<!-- Mirrored from event-theme.com/themes/goshophtml/default/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2016 09:31:43 GMT -->
</html>